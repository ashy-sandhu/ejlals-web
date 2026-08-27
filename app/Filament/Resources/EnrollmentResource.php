<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;
use App\Models\Enrollment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Enrollment Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'title')
                    ->required()
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('time_slot_id')
                    ->relationship('timeSlot', 'day') 
                    ->label('Selected Time Slot')
                    ->native(false),
                Forms\Components\Select::make('assigned_scholar_id')
                    ->relationship('assignedScholar', 'name')
                    ->label('Assigned Teacher')
                    ->searchable()
                    ->native(false),
                Forms\Components\Select::make('status')
                    ->options([
                        'under_review' => 'Under Review',
                        'trial' => 'Trial Active',
                        'trial_expired' => 'Trial Expired',
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'rejected' => 'Rejected',
                    ])
                    ->default('under_review')
                    ->required()
                    ->native(false),
                
                Forms\Components\DateTimePicker::make('trial_started_at'),
                Forms\Components\DateTimePicker::make('trial_ends_at'),

                Forms\Components\Textarea::make('message')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('course.title')
                    ->label('Course')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assignedScholar.name')
                    ->label('Teacher')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'under_review',
                        'primary' => 'trial',
                        'danger' => ['trial_expired', 'rejected'],
                        'success' => ['active', 'completed'],
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'under_review' => 'Under Review',
                        'trial' => 'Trial Active',
                        'trial_expired' => 'Trial Expired',
                        'active' => 'Active',
                        'completed' => 'Completed',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('Activate')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Enrollment $record) => in_array($record->status, ['trial', 'trial_expired']))
                    ->action(fn (Enrollment $record) => $record->update(['status' => 'active'])),

                Tables\Actions\Action::make('Complete')
                    ->icon('heroicon-o-academic-cap')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Enrollment $record) => $record->status === 'active')
                    ->action(fn (Enrollment $record) => $record->update(['status' => 'completed'])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
            'edit' => Pages\EditEnrollment::route('/{record}/edit'),
        ];
    }
}
