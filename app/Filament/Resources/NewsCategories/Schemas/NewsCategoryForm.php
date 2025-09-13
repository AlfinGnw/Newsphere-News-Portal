<?php

namespace App\Filament\Resources\NewsCategories\Schemas;
use Filament\Forms\Set;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportRedirects\Redirector;


class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (callable $set, ?string $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->afterStateUpdated(function (callable $set, ?string $state) {
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->readOnly(),
            ]);
    }
}
