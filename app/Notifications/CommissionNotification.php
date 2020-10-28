<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommissionNotification extends Notification
{
    use Queueable;

    private $order_id;
    private $notify_msg;
    private $company_url;

    public function __construct($order_id, $notify_msg, $company_url)
    {
        $this->order_id = $order_id;
        $this->notify_msg = $notify_msg;
        $this->company_url = $company_url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text' => $this->notify_msg,
            'order_id' => $this->order_id,
            'type' => 'order',
            'company_url' => $this->company_url
        ];
    }
}
