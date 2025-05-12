<?php

namespace App\Notifications;

use App\Models\BankTransferRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BankTransferRequestApproved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $bankTransferRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct(BankTransferRequest $bankTransferRequest)
    {
        $this->bankTransferRequest = $bankTransferRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // You can add other channels like 'database' if you have in-app notifications
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Your Bank Transfer Request Has Been Approved')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Your bank transfer request (ID: ' . $this->bankTransferRequest->id . ') for ' . number_format($this->bankTransferRequest->amount_hra, 8) . ' HRA has been approved.')
                    ->line('The equivalent amount of ' . number_format($this->bankTransferRequest->amount_fiat, 2) . ' EUR has been transferred to your bank account.') // Adjust currency
                    ->line('Payment Proof/Transaction ID: ' . ($this->bankTransferRequest->payment_proof ?? 'N/A'))
                    ->line('Admin Notes: ' . ($this->bankTransferRequest->admin_notes ?? 'N/A'))
                    ->line('Thank you for using our service!');
                    // You might want to add a link back to their profile or transaction history page
                    // ->action('View Request Details', url('/user/bank-transfer-requests/' . $this->bankTransferRequest->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'request_id' => $this->bankTransferRequest->id,
            'amount_hra' => $this->bankTransferRequest->amount_hra,
            'amount_fiat' => $this->bankTransferRequest->amount_fiat,
            'status' => $this->bankTransferRequest->status,
            'payment_proof' => $this->bankTransferRequest->payment_proof,
            'admin_notes' => $this->bankTransferRequest->admin_notes,
        ];
    }
}
