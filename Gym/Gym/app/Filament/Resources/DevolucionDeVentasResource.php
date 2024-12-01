<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevolucionDeVentasResource\Pages;
use App\Filament\Resources\DevolucionDeVentasResource\RelationManagers;
use App\Models\Devolucion_Venta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class DevolucionDeVentasResource extends Resource
{
    protected static ?string $model = Devolucion_Venta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Venta_Id')
                ->relationship('venta', 'Usuario_Id')
                ->label('Venta'),

                Select::make('Usuario_Id')
                ->relationship('usuario','Nombre_usuario')
                ->label('Usuario'),

                Select::make('Producto_Id')
                ->relationship('producto', 'Proveedor_Id')
                ->label('Producto'),


                Select::make('Cliente_Id')
                ->relationship('cliente', 'Cedula')
                ->label('Cliente'),

                DatePicker::make('Fecha Devolucion de Venta')
                ->required()
                ->label('Fecha Devolucion'),

                TextInput::make('Cantidad Devuelta')
                ->required()
                ->numeric()
                ->label('Cantidad Devuelta'),


                TextInput::make('Motivo')
                ->required()
                ->label('Motivo de Devolucion'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDevolucionDeVentas::route('/'),
            'create' => Pages\CreateDevolucionDeVentas::route('/create'),
            'edit' => Pages\EditDevolucionDeVentas::route('/{record}/edit'),
        ];
    }
}
