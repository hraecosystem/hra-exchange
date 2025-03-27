<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Deposit;
use App\Jobs\ProcessStripeDeposit;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->server('HTTP_STRIPE_SIGNATURE');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\Exception $e) {
            Log::error('Stripe Webhook Signature Verification Failed: ' . $e->getMessage());
            return response('Invalid signature', 400);
        }

        // Process event
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            $deposit = Deposit::where('pg_id', $session->id)->first();

            if ($deposit && $deposit->status === Deposit::STATUS_PENDING) {
                Log::info('Stripe Webhook: Dispatching ProcessStripeDeposit for order: ' . $deposit->order_no);
                ProcessStripeDeposit::dispatch($deposit);
            }
        }

        return response('Webhook handled', 200);
    }
}
