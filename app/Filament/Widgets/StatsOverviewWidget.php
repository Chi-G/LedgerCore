<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', PortfolioProject::count())
                ->description('Active portfolio projects')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Active Services', Service::where('is_active', true)->count())
                ->description('Services currently offered')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('info')
                ->chart([3, 7, 5, 9, 6, 12, 8]),

            Stat::make('Client Testimonials', Testimonial::where('is_active', true)->count())
                ->description('Published testimonials')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning')
                ->chart([2, 5, 3, 8, 4, 11, 6]),

            Stat::make('Team Members', TeamMember::where('is_active', true)->count())
                ->description('Active team members')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart([1, 1, 2, 2, 3, 4, 4]),

            Stat::make('Contact Inquiries', Contact::whereDate('created_at', '>=', now()->subDays(30))->count())
                ->description('Last 30 days')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('gray')
                ->chart([12, 8, 15, 20, 18, 25, 22]),

            Stat::make('Featured Projects', PortfolioProject::where('is_featured', true)->count())
                ->description('Highlighted projects')
                ->descriptionIcon('heroicon-m-star')
                ->color('amber')
                ->chart([1, 2, 1, 3, 2, 4, 3]),
        ];
    }
}
