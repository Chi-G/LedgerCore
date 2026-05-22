<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('department'),
                Textarea::make('bio')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('linkedin'),
                TextInput::make('twitter'),
                TextInput::make('skills'),
                TextInput::make('location'),
                Toggle::make('is_leadership')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                DatePicker::make('joined_date'),
            ]);
    }
}
