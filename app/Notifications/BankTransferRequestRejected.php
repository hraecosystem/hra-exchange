<?php

namespace App\Notifications;

use App\Models\BankTransferRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BankTransferRequestRejected extends Notification implements ShouldQueue
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
            ->subject('Your Bank Transfer Request Has Been Rejected')
            ->greeting('Hello '.$notifiable->name.',')
            ->line('Your bank transfer request (ID: '.$this->bankTransferRequest->id.') for '.number_format($this->bankTransferRequest->amount_hra, 8).' HRA has been rejected.')
            ->line('Reason for rejection:')
            ->line($this->bankTransferRequest->admin_notes ?? 'No reason provided.')
            ->line('If you have any questions, please contact support.');
        // You might want to add a link back to their profile or support page
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
            'status' => $this->bankTransferRequest->status,
            'admin_notes' => $this->bankTransferRequest->admin_notes,
        ];
    }
}
