<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class UsersOverviewWidget extends Widget
{
    protected static string $view = 'filament.widgets.users-overview-widget';

    public function getUserCount(): int
    {
        return User::count();
    }
}
