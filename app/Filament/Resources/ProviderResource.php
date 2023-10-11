<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProviderResource\Pages;
use App\Models\Provider;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static ?string $slug = 'providers';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Title')
                ->required(),

            Section::make()->schema([
                CheckboxList::make('services')
                    ->label('Services')
                   ->relationship('services', 'title')
                    ->required(),
            ]),

            Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn(?Provider $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn(?Provider $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')
                ->searchable()
                ->sortable(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProviders::route('/'),
            'create' => Pages\CreateProvider::route('/create'),
            'edit' => Pages\EditProvider::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
