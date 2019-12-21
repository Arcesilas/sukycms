<?php

namespace App\Notifications\Admin;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification
{
    use Queueable;

    protected string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function via(User $user): array
    {
        return ['mail'];
    }

    public function toMail(User $user): MailMessage
    {
        return (new MailMessage)->view('admin.emails.user_registered', [
            'user' => $user,
            'password' => $this->password,
        ]);
    }

    public function toArray(User $user): array
    {
        return [
            //
        ];
    }
}
