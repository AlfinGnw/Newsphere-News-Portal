<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('news_id')
                    ->relationship('news', 'title')
                    ->required(),
                    
            ]);
    }
}
