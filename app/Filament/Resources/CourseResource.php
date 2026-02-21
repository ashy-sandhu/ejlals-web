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
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('slug')
                                            ->label('Permalink')
                                            ->required()
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

                                Forms\Components\Section::make('Instruction & Details')
                                    ->schema([
                                        Forms\Components\TextInput::make('instructor_name')
                                            ->label('Instructor/Scholar Name')
                                            ->placeholder('e.g. Sheikh Abu Bakr')
                                            ->maxLength(255),
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
                                            ->directory('courses/covers'),
                                    ]),

                                Forms\Components\Section::make('Gallery/Assets')
                                    ->schema([
                                        Forms\Components\FileUpload::make('gallery')
                                            ->label(false)
                                            ->image()
                                            ->multiple()
                                            ->reorderable()
                                            ->directory('courses/gallery'),
                                    ]),

                                Forms\Components\Section::make('SEO Analysis')
                                    ->schema([
                                        Forms\Components\KeyValue::make('seo_meta')
                                            ->label('Meta Tags'),
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
                Tables\Columns\TextColumn::make('instructor_name')
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
