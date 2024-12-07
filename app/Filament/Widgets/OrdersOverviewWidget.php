<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\Widget;

class OrdersOverviewWidget extends Widget
{
    protected static string $view = 'filament.widgets.orders-overview-widget';

    public function getOrderCounts(): array
    {
        return [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'in_progress' => Order::where('status', 'in_progress')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
        ];
    }
}
