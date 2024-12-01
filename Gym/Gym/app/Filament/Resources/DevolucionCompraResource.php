<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevolucionCompraResource\Pages;
use App\Filament\Resources\DevolucionCompraResource\RelationManagers;
use App\Models\Devolucion_Compra;
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


class DevolucionCompraResource extends Resource
{
    protected static ?string $model = Devolucion_Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Compra_id') // Asegúrate de que el nombre sea en snake_case
                ->relationship('compra', 'Usuario_Id') // Ajusta según el campo relevante en el modelo Compra
                ->required(),

            Select::make('Usuario_id') // Asegúrate de que el nombre sea en snake_case
                ->relationship('usuario','Nombre_usuario') // Asegúrate de que el campo 'name' corresponda al modelo Usuario
                ->required(),

            Select::make('proveedor_id') // Asegúrate de que el nombre sea en snake_case
                ->relationship('proveedor', 'Nombre_Empresa') // Asegúrate de que el campo 'name' corresponda al modelo Proveedor
                ->required(),

            Select::make('producto_id') // Asegúrate de que el nombre sea en snake_case
                ->relationship('producto', 'Proveedor_Id') // Asegúrate de que el campo 'nombre' corresponda al modelo Producto
                ->required(),

            DatePicker::make('fecha_devolucion_compra') // Asegúrate de que el nombre sea en snake_case
                ->required(),

            TextInput::make('cantidad') // Asegúrate de que el nombre sea en snake_case
                ->required()
                ->numeric(),

            TextInput::make('motivo') // Asegúrate de que el nombre sea en snake_case
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('compra.id')->label('Compra'),
                Tables\Columns\TextColumn::make('usuario'),
                Tables\Columns\TextColumn::make('proveedor.name')->label('Proveedor'),
                Tables\Columns\TextColumn::make('producto.nombre')->label('Producto'),
                Tables\Columns\TextColumn::make('fecha_devolucion_compra')->label('Fecha de Devolución'),
                Tables\Columns\TextColumn::make('cantidad'),
                Tables\Columns\TextColumn::make('motivo'),
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
            'index' => Pages\ListDevolucionCompras::route('/'),
            'create' => Pages\CreateDevolucionCompra::route('/create'),
            'edit' => Pages\EditDevolucionCompra::route('/{record}/edit'),
        ];
    }
}
