<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

use function Laravel\Prompts\select;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('newsCategory', 'title')
                    ->required(),
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (callable $set, ?string $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->required(),
                TextInput::make('slug')
                    ->readOnly(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->required()
                    ->columnSpanfull(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanfull(),
                // Add the is_featured field
                Toggle::make('is_featured'),
            ]);
    }
}
