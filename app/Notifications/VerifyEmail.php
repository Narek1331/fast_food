<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Requests\Auth\SignupRequest;

class VerifyEmail extends VerifyEmailNotification
{

    public function __construct(string $token){
        $this->token = $token;
    }
    // Override sendEmailVerificationNotification method
    public function sendEmailVerificationNotification($notifiable)
    {
        // Load user's preferred language
        $locale = $notifiable->preferredLanguage(); // Implement this method according to your user model

        // Load language strings based on locale
        $this->loadLanguageStrings($notifiable, $locale);

        // Send the email notification
        $notifiable->notify($this);
    }

    // Load language strings based on locale
    protected function loadLanguageStrings($notifiable, $locale)
    {
        $this->subject = __('mail.Verify Email Address', [], $locale);
        $this->line = __('mail.Please click the button below to verify your email address', [], $locale);
        $this->actionText = __('mail.Verify Email Address', [], $locale);
        $this->actionUrl = $this->verificationUrl($notifiable);
    }

    // Override redirectTo method to change redirect URL
    protected function redirectTo($notifiable)
    {
        return '/';
    }

    // Override verificationUrl method to use a custom URL
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'email.verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->id,
                'locale' => app()->getLocale(),
                'token' => $this->token,
                'hash' => $this->token,

            ]
        );


    }

    public function toMail($notifiable)
    {

            return (new MailMessage)->view(
                'email.verify', [
                    'phone_number' => $notifiable->phone_number,
                    'action' => $this->verificationUrl($notifiable)
                    ]
            );
    }
}
