<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Enrollment Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Student Information')
                    ->schema([
                        Forms\Components\TextInput::make('student_name')->disabled(),
                        Forms\Components\TextInput::make('student_email')->disabled(),
                        Forms\Components\TextInput::make('student_phone')->disabled(),
                        Forms\Components\TextInput::make('student_country')->disabled(),
                        Forms\Components\TextInput::make('student_city')->disabled(),
                        Forms\Components\TextInput::make('student_timezone')->disabled(),
                    ])->columns(2),

                Forms\Components\Section::make('Application Details')
                    ->schema([
                        Forms\Components\TextInput::make('course_name')->disabled(),
                        Forms\Components\TextInput::make('time_slot_details')->disabled(),
                        Forms\Components\Textarea::make('student_message')->disabled()->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Admin Management')
                    ->schema([
                        Forms\Components\Select::make('lead_status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'converted' => 'Converted',
                                'closed' => 'Closed',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('admin_notes')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_name')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('course_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time_slot_details')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('lead_status')
                    ->colors([
                        'primary' => 'new',
                        'warning' => 'contacted',
                        'success' => 'converted',
                        'danger' => 'closed',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('lead_status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'converted' => 'Converted',
                        'closed' => 'Closed',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                
                Tables\Actions\Action::make('Approve Trial')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Lead $record) => $record->lead_status !== 'converted' && $record->enrollment && $record->enrollment->status === 'under_review')
                    ->form([
                        Forms\Components\Select::make('assigned_scholar_id')
                            ->label('Assign Teacher')
                            ->options(\App\Models\Scholar::pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function (array $data, Lead $record): void {
                        try {
                            $enrollment = $record->enrollment;
                            if ($enrollment) {
                                $enrollment->update([
                                    'assigned_scholar_id' => $data['assigned_scholar_id'],
                                    'status' => 'trial',
                                    'trial_started_at' => now(),
                                    'trial_ends_at' => now()->addDays(3),
                                ]);
                                
                                $record->update(['lead_status' => 'converted']);
                                
                                // Send Email
                                $enrollment->user->notify(new \App\Notifications\TrialApprovedNotification($enrollment));
                                
                                \Filament\Notifications\Notification::make()
                                    ->title('Trial Approved & Email Sent')
                                    ->success()
                                    ->send();
                            }
                        } catch (\Exception $e) {
                            \Illuminate\Support\Facades\Log::error('Trial Approval failed for lead ' . $record->id . ': ' . $e->getMessage());
                            \Filament\Notifications\Notification::make()
                                ->title('Action failed. Check logs.')
                                ->danger()
                                ->send();
                        }
                    }),

                Tables\Actions\Action::make('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn (Lead $record) => $record->lead_status !== 'closed' && $record->enrollment && $record->enrollment->status === 'under_review')
                    ->action(function (Lead $record): void {
                        try {
                            if ($record->enrollment) {
                                $record->enrollment->update(['status' => 'rejected']);
                                $record->update(['lead_status' => 'closed']);
                                
                                \Filament\Notifications\Notification::make()
                                    ->title('Lead Rejected')
                                    ->success()
                                    ->send();
                            }
                        } catch (\Exception $e) {
                            \Illuminate\Support\Facades\Log::error('Rejection failed for lead ' . $record->id . ': ' . $e->getMessage());
                        }
                    }),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
