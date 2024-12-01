<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedoresResource\RelationManagers;
use App\Filament\Resources\ProveedoresResource\Pages;
use App\Models\Proveedores;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class ProveedoresResource extends Resource
{
    protected static ?string $model = Proveedores::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nombre_Empresa') // Asegúrate de que el nombre esté correcto
                ->required()
                ->maxLength(255),

            TextInput::make('Nombre_Trabajador')
                ->required()
                ->maxLength(255),

            TextInput::make('Apellido_Trabajador')
                ->required()
                ->maxLength(255),

            TextInput::make('Telefono')
                ->required()
                ->tel() // Validación de teléfono
                ->maxLength(15),

            TextInput::make('Correo')
                ->required()
                ->email() // Validación de correo electrónico
                ->maxLength(255),

            TextInput::make('Direccion')
                ->placeholder('Dirección del proveedor')              
                ->maxLength(500),

            Toggle::make('Estado_Proveedor') // Asegúrate de que el nombre esté correcto
                ->label('Estado del Proveedor')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nombre_Empresa'),
                Tables\Columns\TextColumn::make('Nombre_Trabajador'),
                Tables\Columns\TextColumn::make('Apellido_Trabajador'),
                Tables\Columns\TextColumn::make('Telefono'),
                Tables\Columns\TextColumn::make('Correo'),
                Tables\Columns\TextColumn::make('Direccion'),
                Tables\Columns\TextColumn::make('Estado_Proveedor')->label('Estado'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProveedores::route('/'),
            'create' => Pages\CreateProveedores::route('/create'),
            'edit' => Pages\EditProveedores::route('/{record}/edit'),
        ];
    }
}
