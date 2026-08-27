<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /**
     * All valid enrollment statuses:
     * under_review → trial → active → completed
     *                      ↘ rejected
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'time_slot_id',
        'assigned_scholar_id',
        'status',
        'message',
        'trial_started_at',
        'trial_ends_at',
    ];

    protected $casts = [
        'trial_started_at' => 'datetime',
        'trial_ends_at'    => 'datetime',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function timeSlot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TimeSlot::class);
    }

    /**
     * The scholar/teacher assigned to THIS student by admin.
     * Overrides the course's default scholar for this specific enrollment.
     */
    public function assignedScholar(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Scholar::class, 'assigned_scholar_id');
    }

    /**
     * The admin lead record for this enrollment.
     */
    public function lead(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Lead::class);
    }

    // ─── Trial Helpers ────────────────────────────────────────────────────────

    /**
     * Returns the number of days remaining in the trial period.
     * Returns 0 if trial has expired. Returns null if no trial started.
     */
    public function daysLeftInTrial(): ?int
    {
        if (!$this->trial_ends_at) {
            return null;
        }

        $days = (int) now()->diffInDays($this->trial_ends_at, false);
        return max(0, $days);
    }

    /**
     * Returns a human-readable trial countdown label for the frontend.
     * e.g. "3 days remaining", "1 day remaining", "Expires today"
     */
    public function trialCountdownLabel(): string
    {
        $days = $this->daysLeftInTrial();

        if ($days === null) {
            return '';
        }

        if ($days === 0) {
            return 'Expires today';
        }

        return $days === 1 ? '1 day remaining' : "{$days} days remaining";
    }

    /**
     * Whether the trial period has passed (date-wise).
     * Note: status is still changed manually by admin — this is just a date check.
     */
    public function hasTrialExpired(): bool
    {
        return $this->trial_ends_at && now()->isAfter($this->trial_ends_at);
    }

    // ─── Status Helpers ───────────────────────────────────────────────────────

    public function isUnderReview(): bool  { return $this->status === 'under_review'; }
    public function isOnTrial(): bool      { return $this->status === 'trial'; }
    public function isActive(): bool       { return $this->status === 'active'; }
    public function isCompleted(): bool    { return $this->status === 'completed'; }
    public function isRejected(): bool     { return $this->status === 'rejected'; }
}
