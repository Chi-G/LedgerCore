<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter project title'),
                
                Textarea::make('description')
                    ->required()
                    ->maxLength(1000)
                    ->rows(4)
                    ->placeholder('Brief description of the project')
                    ->columnSpanFull(),

                Select::make('industry')
                    ->required()
                    ->options([
                        'real-estate' => 'Real Estate',
                        'healthcare' => 'Healthcare',
                        'fashion' => 'Fashion',
                        'technology' => 'Technology',
                        'automotive' => 'Automotive',
                        'finance' => 'Finance',
                        'education' => 'Education',
                        'ecommerce' => 'E-commerce',
                        'food' => 'Food & Beverage',
                        'logistics' => 'Logistics',
                    ])
                    ->placeholder('Select industry'),

                Select::make('complexity')
                    ->required()
                    ->options([
                        'simple' => 'Simple',
                        'medium' => 'Medium',
                        'complex' => 'Complex',
                        'enterprise' => 'Enterprise',
                    ])
                    ->placeholder('Select complexity'),
                
                Select::make('color')
                    ->required()
                    ->options([
                        'accent' => 'Accent (Default)',
                        'orange-500' => 'Orange',
                        'green-400' => 'Green',
                        'yellow-400' => 'Yellow',
                        'purple-400' => 'Purple',
                        'cyan-400' => 'Cyan',
                        'red-500' => 'Red',
                        'blue-500' => 'Blue',
                    ])
                    ->default('accent'),

                FileUpload::make('image')
                    ->image()
                    ->directory('portfolio')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120) // 5MB
                    ->label('Primary Image'),
                
                FileUpload::make('fallback_image')
                    ->image()
                    ->directory('portfolio')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->maxSize(5120)
                    ->label('Fallback Image'),

                Repeater::make('metrics')
                    ->schema([
                        TextInput::make('value')
                            ->required()
                            ->placeholder('e.g., 150%'),
                        TextInput::make('label')
                            ->required()
                            ->placeholder('e.g., Revenue Growth'),
                    ])
                    ->columns(2)
                    ->addActionLabel('Add Metric')
                    ->collapsible()
                    ->columnSpanFull(),

                Repeater::make('tech_stack')
                    ->schema([
                        TextInput::make('technology')
                            ->required()
                            ->placeholder('e.g., Laravel, Vue.js, AWS'),
                    ])
                    ->addActionLabel('Add Technology')
                    ->columnSpanFull(),

                RichEditor::make('case_study_content')
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
                    ->placeholder('Enter detailed case study content'),

                Toggle::make('is_featured')
                    ->label('Featured Project')
                    ->helperText('Show on homepage and featured sections')
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
