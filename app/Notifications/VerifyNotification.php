<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $token)
    {

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
//                    ->view("email.verify", ['token' => $this->token, 'user' => $notifiable]);
                    ->line("Merhaba $notifiable->name, hoşgeldin.")
                    ->line("Lütfen aşağıdaki linke tıklayarak mailinizi doğrulayınız.")
                    ->action('Mailimi doğrula', route("verify-token", ['token' => $this->token]))
                    ->line('Aramıza katıldığınız için teşekkür ederiz.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
