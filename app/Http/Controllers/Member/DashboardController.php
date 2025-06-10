<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\IcoDetail;
use App\Models\Member;
use App\Models\SwapCoin;
use App\Traits\CoinTrait;
use Brick\Math\Exception\MathException;
use Brick\Math\Exception\RoundingNecessaryException;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    use CoinTrait;

    /**
     * @throws MathException
     * @throws RoundingNecessaryException
     */
    public function index(): Renderable
    {
        $profileImageUrl = $this->member->getFirstMediaUrl(Member::MC_PROFILE_IMAGE);
        $last5EUROWalletTransactions = $this->member->walletTransactions()->orderBy('id', 'desc')->limit(5)->get();
        $last5CoinWalletTransactions = $this->member->coinWalletTransactions()->orderBy('id', 'desc')->limit(5)->get();


        $totalBalance = toHumanReadable($this->member->coin_wallet_balance);
        $totalBalanceDollar = toHumanReadable($this->calculateCoinsDollar($totalBalance));
        // echo '<pre>';
        // print_r($totalBalanceDollar);
        // echo '</pre>';
        // exit;
        $icoLists = IcoDetail::get()->map(function ($icoDetails) {

            return
                [
                    'ico_name' => $icoDetails->name,
                    'start_date' => $icoDetails->start_date,
                    'end_date' => $icoDetails->end_date,
                    'rate' => $icoDetails->rate,
                    'ico_bonus' => 0,
                    'supply' => toHumanReadable($icoDetails->supply),
                    'status' => $icoDetails->status == IcoDetail::STATUS_ACTIVE ? 'Currently Live' : ($icoDetails->status == IcoDetail::STATUS_PENDING ? 'Live In ' . Carbon::parse($icoDetails->start_date)->diffInDays(now()) . ' Days' : 'Ended'),
                    'statusNumber' => $icoDetails->status == IcoDetail::STATUS_ACTIVE ? 1 : 2,
                    'progressBar' => round($icoDetails->total_purchase * 100 / $icoDetails->supply, 2),
                    'actualStatus' => $icoDetails->status,
                    'totalPurchase' => toHumanReadable($icoDetails->total_purchase),
                ];
        });

        $activeICO = IcoDetail::where('status', IcoDetail::STATUS_ACTIVE)->first();

        return view('member.dashboard.index', [
            'member' => $this->member,
            'totalEarning' => $this->member->walletTransactions()->credit()->sum('amount'),
            'last5EUROWalletTransactions' => $last5EUROWalletTransactions,
            'last5CoinWalletTransactions' => $last5CoinWalletTransactions,
            'profileImageUrl' => $profileImageUrl,
            'coinPrice' => toHumanReadable($this->calculateCoinsPrice()),
            //            'totalDeposit' => $totalDeposit,
            'totalBalanceDollar' => $totalBalanceDollar,
            'totalBalance' => $totalBalance,
            //            'totalIcoBonus' => $totalIcoBonus,
            'totalSwapDollar' => toHumanReadable(SwapCoin::whereMemberId($this->member->id)->sum('euro_amount')),
            'icoLists' => $icoLists,
            'liveICO' => $activeICO,
        ]);
    }
}
