<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessStripeDeposit;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET'); // set this in your .env

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\Exception $e) {
            Log::error('⚠️ Stripe webhook signature mismatch', ['error' => $e->getMessage()]);

            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $deposit = Deposit::where('pg_id', $session->id)->first();

            if ($deposit && $deposit->pg_type === Deposit::PG_TYPE_STRIPE) {
                ProcessStripeDeposit::dispatch($deposit);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
