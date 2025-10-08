<?php

namespace App\Filament\Widgets;

use App\Models\PortfolioProject;
use Filament\Widgets\ChartWidget;

class ProjectsByIndustryWidget extends ChartWidget
{
    protected static ?int $sort = 4;

    public function getHeading(): string
    {
        return 'Projects by Industry';
    }

    protected function getData(): array
    {
        $projects = PortfolioProject::selectRaw('industry, COUNT(*) as count')
            ->groupBy('industry')
            ->pluck('count', 'industry')
            ->toArray();

        if (empty($projects)) {
            return [
                'datasets' => [
                    [
                        'label' => 'Projects by Industry',
                        'data' => [1],
                        'backgroundColor' => ['rgb(156, 163, 175)'],
                    ],
                ],
                'labels' => ['No Data'],
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Projects by Industry',
                    'data' => array_values($projects),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)', // Blue
                        'rgb(16, 185, 129)', // Green
                        'rgb(245, 158, 11)', // Yellow
                        'rgb(239, 68, 68)',  // Red
                        'rgb(139, 92, 246)', // Purple
                        'rgb(6, 182, 212)',  // Cyan
                        'rgb(236, 72, 153)', // Pink
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_map(function($industry) {
                return ucwords(str_replace('-', ' ', $industry));
            }, array_keys($projects)),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
