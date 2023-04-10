<?php

namespace App\Mail;

use App\Models\EmailTheme;
use App\Models\EmailThemesActive;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user, public string $token)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Parola Sıfırlama Maili',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $theme = EmailThemesActive::query()
            ->with("themeActive")
            ->whereHas("themeActive")
            ->where("process_id", 2)
            ->firstOrFail();

        $theme = $theme->themeActive;

        if ($theme->getRawOriginal("theme_type") == 2)
        {
            $theme = json_decode($theme->body);

            return new Content(
                view: 'email.reset-password',
                with: ['theme' => $theme, 'token' => $this->token]
            );
        }
        else if ($theme->getRawOriginal("theme_type") == 1)
        {
            $theme = str_replace(
                [
                    "{username}",
                    "{useremail}",
                    "http://{link}",
                    "https://{link}"
                ],
                [
                    $this->user->name,
                    $this->user->email,
                    route("verify-token", ['token' => $this->token]),
                    route("verify-token", ['token' => $this->token])
                ],
                json_decode($theme->body));
            return new Content(
                view: 'email.reset-password',
                with: ['theme' => $theme]
            );
        }


        return new Content(
            view: 'email.reset-password',
            with: ['user' => $this->user, 'token' => $this->token, 'title' => "Parola Sıfırlama"]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
