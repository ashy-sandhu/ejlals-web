<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'image',
        'gender',
        'qualification',
        'location',
        'availability',
        'teaching_experience',
        'subjects_taught',
        'classes_can_teach',
        'experience_details',
        'about_me',
        'rating',
        'is_verified',
        'is_featured',
    ];

    protected $casts = [
        'subjects_taught' => 'array',
        'classes_can_teach' => 'array',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'rating' => 'decimal:1',
    ];
    use \App\Traits\HasSmartLinks;
    use \App\Traits\HasSeoSchema;

    /**
     * SEO Smart Filtered About Me
     */
    public function getRenderedAboutAttribute()
    {
        return $this->processLinks($this->about_me);
    }

    /**
     * SEO Smart Filtered Experience
     */
    public function getRenderedExperienceAttribute()
    {
        return $this->processLinks($this->experience_details);
    }

    /**
     * Professional Person Schema
     */
    public function generateSchema(): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Person",
            "name" => $this->name,
            "jobTitle" => "Scholar / " . ($this->title ?? 'Educator'),
            "description" => strip_tags(substr($this->about_me, 0, 160)),
            "image" => $this->image ? asset('storage/' . $this->image) : asset('storage/ejlals-horizontal-v1.svg'),
            "affiliation" => self::getOrganizationSchema()
        ];
    }
}
