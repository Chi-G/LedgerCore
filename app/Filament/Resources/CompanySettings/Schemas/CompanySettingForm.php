<?php

namespace App\Filament\Resources\CompanySettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompanySettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., company_name, contact_email')
                    ->helperText('Unique identifier for this setting'),

                TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Company Name, Contact Email')
                    ->helperText('Human-readable label for this setting'),

                Select::make('type')
                    ->required()
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Long Text',
                        'number' => 'Number',
                        'email' => 'Email',
                        'url' => 'URL',
                        'boolean' => 'True/False',
                        'json' => 'JSON Data',
                        'image' => 'Image Upload',
                    ])
                    ->default('text')
                    ->live()
                    ->helperText('Data type for this setting'),

                Select::make('group')
                    ->required()
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact Information',
                        'social' => 'Social Media',
                        'metrics' => 'Business Metrics',
                        'seo' => 'SEO Settings',
                        'appearance' => 'Website Appearance',
                    ])
                    ->default('general')
                    ->helperText('Category for organizing settings'),

                // Conditional fields based on type
                TextInput::make('value')
                    ->label('Value')
                    ->visible(fn ($get) => in_array($get('type'), ['text', 'email', 'url', 'number']))
                    ->placeholder('Enter the setting value')
                    ->type(fn ($get) => match ($get('type')) {
                        'email' => 'email',
                        'url' => 'url',
                        'number' => 'number',
                        default => 'text'
                    }),

                Textarea::make('value')
                    ->label('Value')
                    ->visible(fn ($get) => in_array($get('type'), ['textarea', 'json']))
                    ->rows(fn ($get) => $get('type') === 'json' ? 6 : 4)
                    ->placeholder(fn ($get) => $get('type') === 'json'
                        ? '{"key": "value", "array": [1, 2, 3]}'
                        : 'Enter the setting value')
                    ->columnSpanFull(),

                Toggle::make('value')
                    ->label('Value')
                    ->visible(fn ($get) => $get('type') === 'boolean')
                    ->helperText('Toggle this setting on or off'),

                FileUpload::make('value')
                    ->label('Image')
                    ->visible(fn ($get) => $get('type') === 'image')
                    ->image()
                    ->directory('settings')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->maxSize(5120),

                Textarea::make('description')
                    ->maxLength(1000)
                    ->rows(3)
                    ->placeholder('Describe what this setting controls')
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->label('Display Order')
                    ->helperText('Lower numbers appear first in lists'),
            ]);
    }
}
