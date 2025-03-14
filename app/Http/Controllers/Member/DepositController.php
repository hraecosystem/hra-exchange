<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\IcoDetail;
use App\Traits\CoinTrait;
use Auth;
use DB;
use DNS2D;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Mollie\Api\MollieApiClient;
use Stripe\StripeClient;
use Throwable;

class DepositController extends Controller
{
    use CoinTrait;

    /**
     * @throws Exception
     */
    public function index(Request $request): Renderable|RedirectResponse|JsonResponse
    {
        $deposits = $this->member
            ->deposits()
            ->with('icoPurchase')
            ->latest('id')
            ->paginate(15);

        return view('member.deposit.index', [
            'deposits' => $deposits,
            'title' => 'Buy '.env('APP_CURRENCY').' Details',
        ]);
    }

    public function create(): Renderable
    {
        $activeIco = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->firstOrFail();

        return view('member.deposit.create', compact('activeIco'));
    }

    /**
     * @throws ValidationException
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $activeIco = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->firstOrFail();

        if ($activeIco) {
            $minDeposit = $activeIco->min_buy;
        } else {
            $minDeposit = settings('min_deposit');
        }

        $this->validate($request, [
            'amount' => 'required|numeric|min:'.$minDeposit,
        ], [
            'amount.required' => 'The amount is required',
            'amount.min' => 'The amount must be at least '.$minDeposit,
            'amount.numeric' => 'The amount must be number',
        ]);

        try {
            return DB::transaction(function () use ($activeIco, $request) {
                $amount = round($request->input('amount'), 2);

                $deposit = Deposit::create([
                    'member_id' => $this->member->id,
                    'ico_detail_id' => $activeIco->id,
                    'order_no' => Deposit::generateRandomOrderNo(),
                    'coin_price' => $this->calculateCoinsPrice(),
                    'euro_amount' => $amount,
                    'amount' => $this->calculateEuroCoins($amount),
                ]);

                $pgType = settings('pg_type');

                if ($pgType === Deposit::PG_TYPE_MOLLIE) {
                    $mollie = (new MollieApiClient)
                        ->setApiKey(env('MOLLIE_API_KEY'));

                    $mollieOrder = $mollie->payments->create([
                        'amount' => [
                            'currency' => 'EUR',
                            'value' => number_format($amount, 2, thousands_separator: ''),
                        ],
                        'description' => (string) $deposit->order_no,
                        'redirectUrl' => route('member.deposit.process', ['orderNo' => $deposit->order_no]),
                        'webhookUrl' => route('mollie.webhook', ['orderNo' => $deposit->order_no]),
                    ]);

                    $pgId = $mollieOrder->id;
                    $pgCheckoutUrl = $mollieOrder->getCheckoutUrl();
                } elseif ($pgType === Deposit::PG_TYPE_STRIPE) {
                    $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

                    $checkoutSession = $stripe->checkout->sessions->create([
                        'line_items' => [[
                            'price_data' => [
                                'currency' => 'eur',
                                'product_data' => [
                                    'name' => 'HRA Travel Package',
                                ],
                                'unit_amount' => $amount * 100,
                            ],
                            'quantity' => 1,
                        ]],
                        'mode' => 'payment',
                        'expires_at' => now()->addMinutes(30)->timestamp,
                        'success_url' => route('member.deposit.process', ['orderNo' => $deposit->order_no]),
                        'cancel_url' => route('member.deposit.process', ['orderNo' => $deposit->order_no]),
                    ]);

                    $pgId = $checkoutSession->id;
                    $pgCheckoutUrl = $checkoutSession->url;
                } else {
                    throw new Exception("Unknown Payment Gateway Type: $pgType");
                }

                $deposit->update([
                    'pg_id' => $pgId,
                    'pg_type' => $pgType,
                ]);

                return redirect($pgCheckoutUrl);
            });
        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }
    }

    public function detail(Request $request): Renderable|RedirectResponse
    {
        $depositWalletAddress = $this->member->userWallet->public_key;

        return view('member.deposit.create', [
            'member' => Auth::user()->member,
            'amount' => $request->input('amount'),
            'qrImage' => DNS2D::getBarcodeHTML(
                $depositWalletAddress, 'QRCODE'
            ),
            'depositWalletAddress' => $depositWalletAddress,
        ]);
    }
}
