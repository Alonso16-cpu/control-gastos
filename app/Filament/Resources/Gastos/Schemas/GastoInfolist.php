<?php

namespace App\Filament\Resources\Gastos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GastoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('monto')
                    ->numeric(),
                TextEntry::make('descripcion'),
                TextEntry::make('fecha')
                    ->date(),
                TextEntry::make('categoria.nombre')
                    ->label('Categoria'),
                TextEntry::make('analisis-sentimiento'),
                TextEntry::make('prediccion_ia')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
