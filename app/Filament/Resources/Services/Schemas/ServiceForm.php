<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter service name'),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., web-development')
                    ->helperText('URL-friendly version of the name'),

                Select::make('category')
                    ->required()
                    ->options([
                        'development' => 'Development',
                        'design' => 'Design',
                        'marketing' => 'Marketing',
                        'consulting' => 'Consulting',
                        'maintenance' => 'Maintenance',
                        'optimization' => 'Optimization',
                    ])
                    ->default('development'),

                Textarea::make('description')
                    ->required()
                    ->maxLength(500)
                    ->rows(3)
                    ->placeholder('Brief description for listing pages')
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'h2',
                        'h3',
                        'bulletList',
                        'orderedList',
                        'link',
                        'blockquote',
                    ])
                    ->placeholder('Detailed service content'),

                TextInput::make('icon')
                    ->placeholder('e.g., CodeBracketIcon, PaintBrushIcon')
                    ->helperText('Heroicon name for the service'),

                FileUpload::make('image')
                    ->image()
                    ->directory('services')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->label('Service Image'),

                Repeater::make('features')
                    ->schema([
                        TextInput::make('feature')
                            ->required()
                            ->placeholder('e.g., Responsive Design'),
                    ])
                    ->addActionLabel('Add Feature')
                    ->columnSpanFull(),

                Repeater::make('tech_stack')
                    ->schema([
                        TextInput::make('technology')
                            ->required()
                            ->placeholder('e.g., Laravel, Vue.js, AWS'),
                    ])
                    ->addActionLabel('Add Technology')
                    ->columnSpanFull(),

                Repeater::make('pricing_tiers')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('e.g., Basic, Pro, Enterprise'),
                        TextInput::make('price')
                            ->required()
                            ->placeholder('e.g., $999, Contact Us'),
                        Textarea::make('description')
                            ->required()
                            ->rows(2)
                            ->placeholder('What is included in this tier'),
                        Repeater::make('features')
                            ->schema([
                                TextInput::make('feature')
                                    ->required()
                                    ->placeholder('Feature included in this tier'),
                            ])
                            ->addActionLabel('Add Feature'),
                    ])
                    ->columns(2)
                    ->addActionLabel('Add Pricing Tier')
                    ->collapsible()
                    ->columnSpanFull(),

                Toggle::make('is_featured')
                    ->label('Featured Service')
                    ->helperText('Show prominently on homepage')
                    ->default(false),

                Toggle::make('is_active')
                    ->label('Active/Published')
                    ->default(true)
                    ->helperText('Hide from public view when disabled'),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->label('Display Order')
                    ->helperText('Lower numbers appear first'),
            ]);
    }
}
