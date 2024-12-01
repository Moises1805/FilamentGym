<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductosResource\Pages;
use App\Filament\Resources\ProductosResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Relations\Relation\hasMany;

class ProductosResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift-top';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Proveedor_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('proveedor', 'Nombre_Empresa') // Asumiendo que 'nombre' es el campo significativo en Proveedor
                    ->required(),

                Select::make('Categoria_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('categoria', 'Nombre_Categoria') // Asumiendo que 'nombre' es el campo significativo en Categoria_Producto
                    ->required(),

                Select::make('UnidadMedida_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('unidadMedida', 'Nombre') // Asumiendo que 'nombre' es el campo significativo en Unidad_Medida
                    ->required(),

                Select::make('Marcas_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('marca', 'nombre') // Asumiendo que 'nombre' es el campo significativo en Marca
                    ->required(),

                Select::make('Presentaciones_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('presentacion', 'Nombre_Presentacion') // Asumiendo que 'nombre' es el campo significativo en Presentacion
                    ->required(),

                Select::make('Lotes_Id') // Asegúrate de que el nombre sea en snake_case
                    ->relationship('lote', 'Numero_Lote') // Asumiendo que 'nombre' es el campo significativo en Lote
                    ->required(),

                TextInput::make('nombreProducto') // Asegúrate de que el nombre esté correcto (en la base de datos y modelo)
                    ->required()
                    ->maxLength(255),

                Textarea::make('descripcion')
                    ->placeholder('Descripción del producto')
                    ->rows(3)
                    ->maxLength(500),

                Toggle::make('estadoProducto') // Asegúrate de que el nombre esté correcto (en la base de datos y modelo)
                    ->label('Estado del Producto')
                    ->required(),

                TextInput::make('cantidad')
                    ->required()
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('proveedor.nombre')->label('Proveedor'), // en Proveedor hay un campo 'nombre'
                Tables\Columns\TextColumn::make('categoria.Nombre_Categoria')->label('Categoría'), // en Categoria_Producto hay un campo 'nombre'
                Tables\Columns\TextColumn::make('unidadMedida.nombre')->label('Unidad de Medida'), // Asegúrate que en Unidad_Medida hay un campo 'nombre'
                Tables\Columns\TextColumn::make('marca.nombre')->label('Marca'), // hay un campo 'nombre'
                Tables\Columns\TextColumn::make('presentacion.nombre')->label('Presentación'), //  en Presentacion hay un campo 'nombre'
                Tables\Columns\TextColumn::make('lote.nombre')->label('Lote'), // en Lote hay un campo 'nombre'
                Tables\Columns\TextColumn::make('nombreProducto')->label('Nombre del Producto'),
                Tables\Columns\TextColumn::make('estadoProducto')->label('Estado'),
                Tables\Columns\TextColumn::make('cantidad')->label('Cantidad'),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProductos::route('/create'),
            'edit' => Pages\EditProductos::route('/{record}/edit'),
        ];
    }
}
