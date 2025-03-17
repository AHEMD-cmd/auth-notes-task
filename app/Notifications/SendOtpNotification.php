<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class SendOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your OTP for Verification')
            ->line('Your one-time password (OTP) is: **' . $this->otp . '**')
            ->line('Use this code to verify your email.');
    }
}