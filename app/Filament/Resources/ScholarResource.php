<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarResource\Pages;
use App\Filament\Resources\ScholarResource\RelationManagers;
use App\Models\Scholar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ScholarResource extends Resource
{
    protected static ?string $model = Scholar::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('General Information')->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Scholar::class, 'slug', ignoreRecord: true),
                        Forms\Components\TextInput::make('title')
                            ->label('Professional Title')
                            ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ]),
                        Forms\Components\TextInput::make('qualification')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255),
                    ])->columns(2),

                    Forms\Components\Section::make('About & Experience')->schema([
                        Forms\Components\RichEditor::make('about_me')
                            ->label('About me')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('experience_details')
                            ->label('Experience Details')
                            ->columnSpanFull(),
                    ]),
                ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Photo & Status')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Profile Photo')
                            ->image()
                            ->disk('public')
                            ->directory('scholars')
                            ->visibility('public'),
                        Forms\Components\Toggle::make('is_verified')
                            ->label('Verified Scholar')
                            ->default(false),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured on Homepage')
                            ->default(false),
                    ]),

                    Forms\Components\Section::make('Teaching Details')->schema([
                        Forms\Components\TextInput::make('teaching_experience')
                            ->label('Teaching experience')
                            ->placeholder('e.g. 5 Years')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('availability')
                            ->placeholder('e.g. 10:00 AM to 05:00 PM')
                            ->maxLength(255),
                        Forms\Components\TagsInput::make('subjects_taught')
                            ->label('Subjects taught'),
                        Forms\Components\TagsInput::make('classes_can_teach')
                            ->label('Classes can teach'),
                    ]),
                ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->disk('public'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListScholars::route('/'),
            'create' => Pages\CreateScholar::route('/create'),
            'edit' => Pages\EditScholar::route('/{record}/edit'),
        ];
    }
}
