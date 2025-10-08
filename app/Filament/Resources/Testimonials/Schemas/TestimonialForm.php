<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter client name'),

                TextInput::make('client_title')
                    ->maxLength(255)
                    ->placeholder('e.g., CEO, Marketing Director'),

                TextInput::make('company_name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter company name'),

                Textarea::make('testimonial')
                    ->required()
                    ->maxLength(2000)
                    ->rows(5)
                    ->placeholder('Enter client testimonial')
                    ->columnSpanFull(),

                FileUpload::make('client_image')
                    ->image()
                    ->directory('testimonials/clients')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(2048)
                    ->label('Client Photo'),

                FileUpload::make('company_logo')
                    ->image()
                    ->directory('testimonials/companies')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                    ->maxSize(2048)
                    ->label('Company Logo'),

                Select::make('project_type')
                    ->options([
                        'web-development' => 'Web Development',
                        'mobile-app' => 'Mobile App Development',
                        'ecommerce' => 'E-commerce Solution',
                        'branding' => 'Branding & Design',
                        'digital-marketing' => 'Digital Marketing',
                        'consulting' => 'Business Consulting',
                        'custom-software' => 'Custom Software',
                        'maintenance' => 'Website Maintenance',
                    ])
                    ->placeholder('Select project type'),

                Repeater::make('metrics')
                    ->schema([
                        TextInput::make('label')
                            ->required()
                            ->placeholder('e.g., Revenue Increase'),
                        TextInput::make('value')
                            ->required()
                            ->placeholder('e.g., 150%'),
                    ])
                    ->columns(2)
                    ->addActionLabel('Add Metric')
                    ->collapsible()
                    ->columnSpanFull(),

                Select::make('rating')
                    ->required()
                    ->options([
                        '5.0' => '5 Stars (★★★★★)',
                        '4.5' => '4.5 Stars (★★★★☆)',
                        '4.0' => '4 Stars (★★★★☆)',
                        '3.5' => '3.5 Stars (★★★☆☆)',
                        '3.0' => '3 Stars (★★★☆☆)',
                    ])
                    ->default('5.0'),

                DatePicker::make('project_date')
                    ->label('Project Completion Date')
                    ->displayFormat('M Y')
                    ->maxDate(now()),

                Toggle::make('is_featured')
                    ->label('Featured Testimonial')
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
