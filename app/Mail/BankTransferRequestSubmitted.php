<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BankTransferRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $requestedAmountHra;

    public $calculatedFiatAmount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $requestedAmountHra, $calculatedFiatAmount)
    {
        $this->user = $user;
        $this->requestedAmountHra = $requestedAmountHra;
        $this->calculatedFiatAmount = $calculatedFiatAmount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bank Transfer Request Submitted')
            ->view('emails.bank_transfer_request_submitted')
            ->with([
                'user' => $this->user,
                'requestedAmountHra' => $this->requestedAmountHra,
                'calculatedFiatAmount' => $this->calculatedFiatAmount,
            ]);
    }
}
