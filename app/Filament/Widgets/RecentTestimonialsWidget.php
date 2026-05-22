<?php

namespace App\Filament\Widgets;

use App\Models\Testimonial;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentTestimonialsWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Testimonials';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Testimonial::query()
                    ->where('is_active', true)
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                ImageColumn::make('client_image')
                    ->label('Client')
                    ->circular()
                    ->size(40)
                    ->defaultImageUrl('/logo.png'),

                TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('company_name')
                    ->label('Company')
                    ->searchable()
                    ->color('gray'),

                TextColumn::make('project_type')
                    ->label('Project Type')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn (?string $state): string => $state ? ucwords(str_replace('-', ' ', $state)) : 'N/A'
                    ),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->formatStateUsing(fn (?float $state): string => $state ? str_repeat('⭐', (int) $state) : 'N/A'
                    )
                    ->color('warning'),

                TextColumn::make('testimonial')
                    ->label('Testimonial')
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        return strlen($state) > 50 ? $state : null;
                    }),

                TextColumn::make('created_at')
                    ->label('Added')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated(false);
    }
}
