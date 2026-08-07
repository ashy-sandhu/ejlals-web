<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        // Left: Main Content (8 Columns)
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Book Title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                        Forms\Components\TextInput::make('slug')
                                            ->label('Permalink')
                                            ->required()
                                            ->unique(ignoreRecord: true)
                                            ->rules(['alpha_dash'])
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('description')
                                            ->required()
                                            ->rows(5)
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Forms\Components\Section::make('Download Options')
                                    ->description('Configure how students retrieve this book')
                                    ->schema([
                                        Forms\Components\Select::make('download_type')
                                            ->options([
                                                'file' => 'Upload PDF/File',
                                                'link' => 'External Link (URL)',
                                            ])
                                            ->default('link')
                                            ->required()
                                            ->native(false)
                                            ->live(),

                                        Forms\Components\FileUpload::make('download_file')
                                            ->label('Select File')
                                            ->disk('public')
                                            ->directory('books/files')
                                            ->maxSize(102400)
                                            ->preserveFilenames()
                                            ->visible(fn (Forms\Get $get) => $get('download_type') === 'file')
                                            ->required(fn (Forms\Get $get) => $get('download_type') === 'file'),

                                        Forms\Components\TextInput::make('download_link')
                                            ->label('Target URL')
                                            ->placeholder('https://example.com/book-access')
                                            ->url()
                                            ->visible(fn (Forms\Get $get) => $get('download_type') === 'link')
                                            ->required(fn (Forms\Get $get) => $get('download_type') === 'link'),
                                    ])->columns(1),
                            ])->columnSpan(8),

                        // Right: Sidebar (4 Columns)
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Publishing')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name', fn($query) => $query->where('type', 'book'))
                                            ->required()
                                            ->native(false),
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured on Homepage')
                                            ->required(),
                                    ]),

                                Forms\Components\Section::make('Book Cover')
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->label(false)
                                            ->disk('public')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->directory('books/covers'),
                                        Forms\Components\TextInput::make('image_alt')
                                            ->label('Cover Alt Text')
                                            ->placeholder('e.g. Cover of the book')
                                            ->maxLength(255),
                                    ]),

                                Forms\Components\Section::make('Search Engine Optimization (SEO)')
                                    ->schema([
                                        Forms\Components\TextInput::make('seo_title')
                                            ->label('Meta Title')
                                            ->maxLength(100),
                                        Forms\Components\Textarea::make('seo_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(200),
                                        Forms\Components\Tabs::make('Social Cards')
                                            ->tabs([
                                                Forms\Components\Tabs\Tab::make('Facebook')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('seo_meta.og_title')->label('OG Title'),
                                                        Forms\Components\Textarea::make('seo_meta.og_description')->label('OG Description')->rows(2),
                                                    ]),
                                                Forms\Components\Tabs\Tab::make('Twitter')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('seo_meta.twitter_title')->label('Twitter Title'),
                                                        Forms\Components\Textarea::make('seo_meta.twitter_description')->label('Twitter Description')->rows(2),
                                                    ]),
                                            ])->columnSpanFull(),
                                    ])->collapsible()->collapsed(),
                            ])->columnSpan(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->limit(25)
                    ->color('gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date Created')
                    ->dateTime('M j, Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Cover'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make()
                    ->label('Duplicate')
                    ->icon('heroicon-o-document-duplicate')
                    ->before(function (Book $record) {
                        $count = 1;
                        $originalSlug = $record->slug;
                        $originalTitle = $record->title;

                        // Clean up existing copy suffixes to avoid "-copy-copy"
                        $cleanSlug = preg_replace('/-copy(-\d+)?$/', '', $originalSlug);
                        $cleanTitle = preg_replace('/ \(Copy( \d+)?\)$/', '', $originalTitle);

                        $newSlug = $cleanSlug . '-copy';
                        $newTitle = $cleanTitle . ' (Copy)';

                        while (Book::where('slug', $newSlug)->exists()) {
                            $count++;
                            $newSlug = $cleanSlug . "-copy-{$count}";
                            $newTitle = $cleanTitle . " (Copy {$count})";
                        }

                        $record->slug = $newSlug;
                        $record->title = $newTitle;
                    }),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
