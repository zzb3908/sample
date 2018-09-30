<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    public $token;
    public $email;

    public function __construct($token,$email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('重置密码')
            ->line('这是一封密码重置邮件，如果是您本人操作，请点击以下按钮继续：')
            ->action('重置密码', url(route('password.reset', [$this->token,'email'=>$this->email], false)))
            ->line('如果您并没有执行此操作，您可以选择忽略此邮件。');
    }
}