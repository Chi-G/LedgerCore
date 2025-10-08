<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActionsWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full';

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('filament.widgets.quick-actions-widget');
    }
}
