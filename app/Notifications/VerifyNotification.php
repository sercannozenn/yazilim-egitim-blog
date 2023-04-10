<?php

namespace App\Notifications;

use App\Models\EmailTheme;
use App\Models\EmailThemesActive;
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
        $theme = EmailThemesActive::query()
            ->with("themeActive")
            ->whereHas("themeActive")
            ->where("process_id", 1)
            ->firstOrFail();

        $theme = $theme->themeActive;


        if ($theme->getRawOriginal("theme_type") == 1)
        {
            $theme = str_replace(
                [
                    "{username}",
                    "{useremail}",
                    "http://{link}",
                    "https://{link}"
                ],
                [
                    $notifiable->name,
                    $notifiable->email,
                    route("verify-token", ['token' => $this->token]),
                    route("verify-token", ['token' => $this->token])
                ],
                json_decode($theme->body));

            return (new MailMessage)
                ->view("email.custom", ['theme' => $theme]);
        }

        return (new MailMessage)
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
