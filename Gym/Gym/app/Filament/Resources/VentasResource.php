<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentasResource\Pages;
use App\Models\Venta;
use Filament\Forms;
//use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
//use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class VentasResource extends Resource
{
    protected static ?string $model = Venta::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Forms\Form $form): Form 
    {
        return $form
            ->schema([
                Select::make('Usuario_Id') // Asegúrate de que el nombre coincida con la base de datos
                    ->required(),
    
                Select::make('Cliente_Id') // Asegúrate de que el nombre coincida con la base de datos
                    ->required(),
    
                DatePicker::make('Fecha_Ventaenta') // Asegúrate de que el nombre coincida con la base de datos
                    ->required()
                    ->label('Fecha de Venta'),
    
                TextInput::make('SubTotal') // Asegúrate de que el nombre coincida con la base de datos
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->label('Sub Total')
                    ->step(0.01),
    
                TextInput::make('IVA') // Asegúrate de que el nombre coincida con la base de datos
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->label('IVA (%)')
                    ->step(0.01),
    
                TextInput::make('Descuento') // Asegúrate de que el nombre coincida con la base de datos
                    ->nullable()
                    ->numeric()
                    ->minValue(0)
                    ->label('Descuento')
                    ->step(0.01),
    
                TextInput::make('Costo_Total') // Asegúrate de que el nombre coincida con la base de datos
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->label('Costo Total'),
                   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Usuario_Id'),
                Tables\Columns\TextColumn::make('Cliente_Id'),
                Tables\Columns\TextColumn::make('Fecha_Venta')->date(), // Asegúrate de que el nombre coincida
                Tables\Columns\TextColumn::make('SubTotal')->money(), // Asegúrate de que el nombre coincida
                Tables\Columns\TextColumn::make('IVA'), // Asegúrate de que el nombre coincida
                Tables\Columns\TextColumn::make('Descuento'), // Asegúrate de que el nombre coincida
                Tables\Columns\TextColumn::make('Costo_Total')->money(), // Asegúrate de que el nombre coincida
            ])
            ->filters([
                // Aquí puedes agregar filtros si es necesario
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Aquí puedes agregar relaciones si es necesario
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVentas::route('/'),
            'create' => Pages\CreateVentas::route('/create'),
            'edit' => Pages\EditVentas::route('/{record}/edit'),
        ];
    }
}
