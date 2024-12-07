<?php

namespace App\Observers;

use App\Models\Order;
use Filament\Notifications\Notification;
use App\Models\Admin;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // $recipient = auth()->user();
        // Notification::make()
        // ->title('New Order')
        // ->message('A new order has been placed.')
        //     ->sendToDatabase($recipient);
        try
        {
            // all admins
            $admins = Admin::all();
            if ($admins->isEmpty())
            {
                \Log::warning('No admins found to notify about new orders.');
            }
            else
            {
                foreach ($admins as $admin)
                {
                    Notification::make()
                        ->title('New Order placed by ' . $order->user->name)
                        ->body('Order #' . $order->id . ' has been placed with the following details: Location: ' . $order->location . ', Size: ' . $order->size . ', Weight: ' . $order->weight . ', Pickup Time: ' . $order->pickup_time . ', Delivery Time: ' . $order->delivery_time)
                        ->sendToDatabase($admin);
                }
            }
        }
        catch (\Exception $e)
        {
            \Log::error('Failed to send notification: ' . $e->getMessage());
            \Log::error('Notification trace: ' . $e->getTraceAsString());
            \Log::error('Notification line: ' . $e->getLine());
            \Log::error('Notification file: ' . $e->getFile());
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
