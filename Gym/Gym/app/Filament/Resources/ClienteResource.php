<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Models\Cliente;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('Cedula')->required(),
                 TextInput::make('Nombre_Cliente')
                    ->required()
                    ->label('Nombre del Cliente'),
                 TextInput::make('Apellido_Cliente')
                    ->required()
                    ->label('Apellido del Cliente'),
                 TextInput::make('Telefono')
                    ->required()
                    ->label('Teléfono'),
                 TextInput::make('Domicilio')->label('Domicilio'),
                  DatePicker::make('Fecha_Registro')
                    ->required()
                    ->label('Fecha de Registro'),

                  DatePicker::make('Fecha_Baja')->nullable()->label('Fecha de Baja'),
                  Select::make('Estado_Cliente')
                   ->options([
                       1 => 'Activo',    // Cambiar 'activo' a 1
                       0 => 'Inactivo',  // Cambiar 'inactivo' a 0
                   ])
                   ->required()
                   ->label('Estado del Cliente'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Cedula')
                    ->label('Cédula'),
                TextColumn::make('Nombre_Cliente')
                    ->label('Nombre'),
                TextColumn::make('Apellido_Cliente')
                    ->label('Apellido'),
                TextColumn::make('Telefono')
                    ->label('Teléfono'),
                TextColumn::make('Estado_Cliente')
                    ->label('Estado')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                RestoreAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                ForceDeleteBulkAction::make(),
                DeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]);
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user';
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
