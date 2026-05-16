<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

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
                                            ->label('Course Title')
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
                                        Forms\Components\RichEditor::make('description')
                                            ->required()
                                            ->columnSpanFull()
                                            ->fileAttachmentsDirectory('courses/attachments'),
                                        Forms\Components\Textarea::make('summary')
                                            ->label('Card Summary (Grid/Homepage)')
                                            ->helperText('Brief intro shown on course cards. Supports line breaks. Leave blank to auto-generate.')
                                            ->rows(3)
                                            ->maxLength(300)
                                            ->columnSpanFull(),
                                    ])->columns(2),

                                Forms\Components\Section::make('Curriculum Builder')
                                    ->description('Break down your course into modules and lessons.')
                                    ->schema([
                                        Forms\Components\Repeater::make('modules')
                                            ->relationship('modules')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->label('Module Title')
                                                    ->placeholder('e.g. Week 1: Foundations')
                                                    ->required()
                                                    ->columnSpanFull(),
                                                Forms\Components\Repeater::make('lessons')
                                                    ->relationship('lessons')
                                                    ->schema([
                                                        Forms\Components\Grid::make(2)
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title')
                                                                    ->label('Lesson Title')
                                                                    ->placeholder('e.g. Lesson 1: Introduction')
                                                                    ->required(),
                                                                Forms\Components\TextInput::make('duration')
                                                                    ->label('Estimated Time')
                                                                    ->placeholder('e.g. 15 mins'),
                                                            ]),
                                                    ])
                                                    ->orderColumn('sort_order')
                                                    ->defaultItems(0)
                                                    ->reorderableWithButtons()
                                                    ->collapsible()
                                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null),
                                            ])
                                            ->orderColumn('sort_order')
                                            ->defaultItems(0)
                                            ->reorderableWithButtons()
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                            ->columnSpanFull(),
                                    ]),
                            ])->columnSpan(8),

                        // Right: Sidebar (4 Columns)
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Section::make('Publishing')
                                    ->schema([
                                        Forms\Components\Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name', fn($query) => $query->where('type', 'course'))
                                            ->required()
                                            ->native(false),
                                        Forms\Components\Toggle::make('is_featured')
                                            ->label('Featured on Homepage')
                                            ->required(),
                                    ]),

                                Forms\Components\Section::make('Course Cover')
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->label(false)
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->directory('courses/covers'),
                                        Forms\Components\TextInput::make('image_alt')
                                            ->label('Cover Alt Text')
                                            ->placeholder('e.g. Students learning Quran online')
                                            ->maxLength(255),
                                    ]),

                                Forms\Components\Section::make('Gallery/Assets')
                                    ->schema([
                                        Forms\Components\FileUpload::make('gallery')
                                            ->label(false)
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                                            ->multiple()
                                            ->reorderable()
                                            ->directory('courses/gallery'),
                                    ]),

                                Forms\Components\Section::make('Instruction & Details')
                                    ->schema([
                                        Forms\Components\Select::make('scholar_id')
                                            ->label('Instructor / Scholar')
                                            ->relationship('scholar', 'name')
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->native(false),
                                        Forms\Components\TextInput::make('duration')
                                            ->label('Course Duration')
                                            ->numeric()
                                            ->step(1)
                                            ->minValue(1)
                                            ->suffix('Weeks')
                                            ->placeholder('e.g. 12')
                                            ->helperText('Number of weeks the course lasts.'),
                                        Forms\Components\TextInput::make('level')
                                            ->label('Course Level')
                                            ->placeholder('e.g. Beginner to Advanced')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('language')
                                            ->label('Course Language')
                                            ->placeholder('e.g. English & Urdu')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('enrolled_display')
                                            ->label('Enrolled Display Text')
                                            ->placeholder('e.g. 1.2K+')
                                            ->helperText('Custom text to show for enrolled students count. Leave blank to show actual count.')
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
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('scholar.name')
                    ->label('Instructor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->before(function (Course $record) {
                        $count = 1;
                        $originalSlug = $record->slug;
                        $originalTitle = $record->title;

                        // Clean up existing copy suffixes to avoid "-copy-copy"
                        $cleanSlug = preg_replace('/-copy(-\d+)?$/', '', $originalSlug);
                        $cleanTitle = preg_replace('/ \(Copy( \d+)?\)$/', '', $originalTitle);

                        $newSlug = $cleanSlug . '-copy';
                        $newTitle = $cleanTitle . ' (Copy)';

                        while (Course::where('slug', $newSlug)->exists()) {
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
