<?php

namespace App\Filament\Resources\Gastos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GastoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('monto')
                    ->required()
                    ->numeric(),
                TextInput::make('descripcion')
                    ->required(),
                DatePicker::make('fecha')
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
                TextInput::make('analisis-sentimiento')
                    ->required(),
                TextInput::make('prediccion_ia')
                    ->default(null),
            ]);
    }
}
