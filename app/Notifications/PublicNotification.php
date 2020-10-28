<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PublicNotification extends Notification
{
    use Queueable;

    private $notify_msg;

    public function __construct($notify_msg)
    {
        $this->notify_msg = $notify_msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text' => $this->notify_msg,
            'order_id' => 0,
            'type' => 'public'
        ];
    }
}
