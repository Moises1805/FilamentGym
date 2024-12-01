<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComprasResource\Pages;
use App\Models\Compra;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class ComprasResource extends Resource
{
    protected static ?string $model = Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    // Método que define el formulario
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Relación con el modelo Usuario
                Select::make('Usuario_Id')
                    ->relationship('usuario', 'Nombre_usuario')  // 'Nombre_usuario' es el campo que se va a mostrar
                    ->required()
                    ->label('Usuario'),  // Etiqueta opcional

                // Relación con el modelo Proveedor
                Select::make('Proveedor_Id')
                    ->relationship('proveedor', 'Nombre_Empresa')  // 'Nombre_Empresa' es el campo que se va a mostrar
                    ->required()
                    ->label('Proveedor'),  // Etiqueta opcional

                // Campo de fecha de la compra
                DatePicker::make('Fecha_Compra')
                    ->required()
                    ->label('Fecha de Compra'),

                // Campo para el costo total de la compra
                TextInput::make('Costo_TOtal')
                    ->required()
                    ->numeric()
                    ->minValue(0)  // Asegura que no se pueda ingresar valores negativos
                    ->label('Costo Total'),              
            ]);
    }

    // Método que define las columnas en la tabla
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Columna que muestra el nombre del usuario relacionado
                Tables\Columns\TextColumn::make('usuario.Nombre_usuario')->label('Usuario'),
                
                // Columna que muestra el nombre del proveedor relacionado
                Tables\Columns\TextColumn::make('proveedor.Nombre_Empresa')->label('Proveedor'),
                
                // Columna que muestra la fecha de compra
                Tables\Columns\TextColumn::make('Fecha_Compra')->label('Fecha de Compra'),
                
                // Columna que muestra el costo total de la compra
                Tables\Columns\TextColumn::make('Costo_TOtal')->label('Costo Total'),
            ])
            ->filters([
                // Aquí puedes agregar filtros si es necesario
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

    // Método para obtener relaciones si es necesario
    public static function getRelations(): array
    {
        return [
            // Aquí puedes agregar relaciones si es necesario
        ];
    }

    // Método que define las páginas
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompras::route('/create'),
            'edit' => Pages\EditCompras::route('/{record}/edit'),
        ];
    }
}
