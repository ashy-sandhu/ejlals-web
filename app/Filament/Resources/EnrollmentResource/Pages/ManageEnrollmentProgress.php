<?php

namespace App\Filament\Resources\EnrollmentResource\Pages;

use App\Filament\Resources\EnrollmentResource;
use App\Models\EnrollmentAttendance;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;

class ManageEnrollmentProgress extends Page
{
    use InteractsWithRecord;

    protected static string $resource = EnrollmentResource::class;

    protected static string $view = 'filament.resources.enrollment-resource.pages.manage-enrollment-progress';

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function markAsAttendedAction(): Action
    {
        return Action::make('markAsAttended')
            ->label('Mark as Attended')
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->form([
                Textarea::make('notes')
                    ->label('Notes/Remarks')
                    ->placeholder('Any remarks for the student...'),
                FileUpload::make('attachment_path')
                    ->label('Attachment')
                    ->directory('attendance-attachments'),
            ])
            ->action(function (array $arguments, array $data): void {
                $lessonId = $arguments['lesson'];

                EnrollmentAttendance::updateOrCreate(
                    [
                        'enrollment_id' => $this->record->id,
                        'course_lesson_id' => $lessonId,
                    ],
                    [
                        'notes' => $data['notes'] ?? null,
                        'attachment_path' => $data['attachment_path'] ?? null,
                        'attended_at' => now(),
                    ]
                );

                Notification::make()
                    ->title('Attendance Marked successfully!')
                    ->success()
                    ->send();
            });
    }

    public function getCourseModules()
    {
        return $this->record->course->modules()->with('lessons')->get();
    }

    public function getAttendances()
    {
        return $this->record->attendances()->get()->keyBy('course_lesson_id');
    }
}
