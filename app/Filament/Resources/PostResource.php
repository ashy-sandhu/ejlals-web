<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

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
                                            ->label('Headline')
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
                                        Forms\Components\RichEditor::make('content')
                                            ->required()
                                            ->columnSpanFull()
                                            ->fileAttachmentsDirectory('posts/attachments'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Card Description (Homepage)')
                                            ->helperText('This text appears on the homepage cards. Supports line breaks.')
                                            ->rows(3)
                                            ->maxLength(300)
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Forms\Components\Section::make('Search Engine Optimization (SEO)')
                                    ->description('Manage how this article appears on Google and Social Media.')
                                    ->schema([
                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title')
                                                    ->label('Meta Title')
                                                    ->helperText('Ideal: 50-60 chars.')
                                                    ->maxLength(100),
                                                Forms\Components\Textarea::make('seo_description')
                                                    ->label('Meta Description')
                                                    ->helperText('Ideal: 150-160 chars.')
                                                    ->rows(3)
                                                    ->maxLength(200),
                                            ]),

                                        Forms\Components\Tabs::make('Social Visibility')
                                            ->tabs([
                                                Forms\Components\Tabs\Tab::make('Facebook (Open Graph)')
                                                    ->icon('heroicon-o-share')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('seo_meta.og_title')->label('OG Title'),
                                                        Forms\Components\Textarea::make('seo_meta.og_description')->label('OG Description')->rows(2),
                                                        Forms\Components\FileUpload::make('seo_meta.og_image')
                                                            ->label('OG Image')
                                                            ->image()
                                                            ->directory('seo/og'),
                                                    ]),
                                                Forms\Components\Tabs\Tab::make('Twitter (X)')
                                                    ->icon('heroicon-o-hashtag')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('seo_meta.twitter_title')->label('Twitter Title'),
                                                        Forms\Components\Textarea::make('seo_meta.twitter_description')->label('Twitter Description')->rows(2),
                                                        Forms\Components\FileUpload::make('seo_meta.twitter_image')
                                                            ->label('Twitter Image')
                                                            ->image()
                                                            ->directory('seo/twitter'),
                                                    ]),
                                            ])->columnSpanFull(),
                                    ])->collapsible()->collapsed(),
                            ])->columnSpan(8),

                        // Right: Sidebar (4 Columns)
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Publishing')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name', fn($query) => $query->where('type', 'post'))
                                            ->required()
                                            ->native(false),
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured on Homepage')
                                            ->required(),
                                    ]),

                                Forms\Components\Section::make('Featured Image')
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->label(false)
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->directory('posts/featured'),
                                        Forms\Components\TextInput::make('image_alt')
                                            ->label('Image Alt Text')
                                            ->placeholder('Describe this image for SEO')
                                            ->maxLength(255),
                                    ]),

                                Forms\Components\Section::make('Gallery')
                                    ->schema([
                                        Forms\Components\FileUpload::make('gallery')
                                            ->label(false)
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->multiple()
                                            ->reorderable()
                                            ->directory('posts/gallery'),
                                    ]),
                            ])->columnSpan(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Headline')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date Created')
                    ->dateTime('M j, Y')
                    ->sortable(),
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
                    ->before(function (Post $record) {
                        $count = 1;
                        $originalSlug = $record->slug;
                        $originalTitle = $record->title;

                        // Clean up existing copy suffixes to avoid "-copy-copy"
                        $cleanSlug = preg_replace('/-copy(-\d+)?$/', '', $originalSlug);
                        $cleanTitle = preg_replace('/ \(Copy( \d+)?\)$/', '', $originalTitle);

                        $newSlug = $cleanSlug . '-copy';
                        $newTitle = $cleanTitle . ' (Copy)';

                        while (Post::where('slug', $newSlug)->exists()) {
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
