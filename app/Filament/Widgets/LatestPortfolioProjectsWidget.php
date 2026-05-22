<?php

namespace App\Filament\Widgets;

use App\Models\PortfolioProject;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestPortfolioProjectsWidget extends TableWidget
{
    protected static ?string $heading = 'Latest Portfolio Projects';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                PortfolioProject::query()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->size(40)
                    ->defaultImageUrl('/logo.png'),

                TextColumn::make('title')
                    ->label('Project Title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('industry')
                    ->label('Industry')
                    ->badge()
                    ->color('info'),

                TextColumn::make('complexity')
                    ->label('Complexity')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'simple' => 'success',
                        'medium' => 'warning',
                        'complex' => 'danger',
                        'enterprise' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('is_featured')
                    ->label('Featured')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                    ->color(fn (bool $state): string => $state ? 'success' : 'gray'),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated(false);
    }
}
