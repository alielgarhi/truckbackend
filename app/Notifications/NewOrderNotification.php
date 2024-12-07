<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    // Define notification delivery channels
    public function via($notifiable)
    {
        return ['database']; // Persist the notification in the database
    }

    // Define the data stored in the database
    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'user_name' => $this->order->user->name,
            'pickup_time' => $this->order->pickup_time,
            'delivery_time' => $this->order->delivery_time,
            'location' => $this->order->location,
        ];
    }
}
