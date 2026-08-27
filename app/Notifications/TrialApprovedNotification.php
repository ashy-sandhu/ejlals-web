<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrialApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $enrollment;
    private $scholarName;
    private $courseName;

    /**
     * Create a new notification instance.
     */
    public function __construct($enrollment)
    {
        $this->enrollment = $enrollment;
        
        // Eager load if not already to prevent N+1 in queue
        $this->enrollment->loadMissing(['course', 'assignedScholar', 'timeSlot']);
        
        $this->courseName = $this->enrollment->course->title ?? 'Your Course';
        $this->scholarName = $this->enrollment->assignedScholar->name ?? 'Assigned Scholar';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $startDate = $this->enrollment->trial_started_at ? $this->enrollment->trial_started_at->format('d M Y') : now()->format('d M Y');
        $endDate = $this->enrollment->trial_ends_at ? $this->enrollment->trial_ends_at->format('d M Y') : now()->addDays(3)->format('d M Y');
        
        $schedule = 'To be arranged';
        if ($this->enrollment->timeSlot) {
            $schedule = $this->enrollment->timeSlot->day . ' at ' . \Carbon\Carbon::parse($this->enrollment->timeSlot->time)->format('h:i A');
        }

        return (new MailMessage)
            ->subject('Your Trial Has Started — ' . $this->courseName . ' | Ejlals Academy')
            ->greeting('Assalamu Alaikum, ' . $notifiable->first_name . '!')
            ->line('Great news — your trial period for the following course has been approved and is now active.')
            ->line('**COURSE DETAILS**')
            ->line('**Course:** ' . $this->courseName)
            ->line('**Teacher:** ' . $this->scholarName)
            ->line('**Schedule:** ' . $schedule)
            ->line(' ')
            ->line('**TRIAL PERIOD**')
            ->line('**Started:** ' . $startDate)
            ->line('**Ends:** ' . $endDate)
            ->line('**Duration:** 3 Days')
            ->line(' ')
            ->line('Your trial gives you full access to attend classes for 3 days. Make the most of it!')
            ->line('If you have any questions, reply to this email or contact us through our website.')
            ->action('Go to My Courses', route('my-courses'))
            ->salutation('Warm regards,  
Ejlals Academy Team');
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        \Log::error('Trial Approved Notification failed for user ' . $this->enrollment->user_id . ': ' . $exception->getMessage());
    }
}
