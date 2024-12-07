<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
// use Illuminate\Notifications\Messages\SmsMessage;

class OrderStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    // Define email notification
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Order Status Updated')
            ->line('Your order #' . $this->order->id . ' has been updated to: ' . $this->order->status)
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for using our service!');
    }

    // Define SMS notification
    public function toSms($notifiable)
    {
        // Implement your custom SMS notification logic here
        // For example, using a third-party SMS service
        return 'Order #' . $this->order->id . ' status updated to: ' . $this->order->status;
    }

    public function via($notifiable)
    {
        return ['mail', 'sms']; // Specify notification channels
    }
}
