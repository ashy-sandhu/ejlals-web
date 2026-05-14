<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $otp;

    /**
     * Create a new notification instance.
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Verify Your Account - Ejlals Academy')
            ->greeting('Assalamu Alaikum, ' . $notifiable->first_name . '!')
            ->line('Welcome to Ejlals Academy. To complete your registration, please use the 6-digit verification code below:')
            ->line(' ')
            ->line('**' . $this->otp . '**')
            ->line(' ')
            ->line('This code will expire in 15 minutes.')
            ->line('If you did not create an account, no further action is required.')
            ->salutation('Warm regards,  
Ejlals Academy Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'otp' => $this->otp,
        ];
    }
}
