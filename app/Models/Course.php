<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string|null $summary
 * @property int $category_id
 * @property bool $is_featured
 * @property string|null $instructor_name
 * @property string|null $image
 * @property array<array-key, mixed>|null $gallery
 * @property array<array-key, mixed>|null $seo_meta
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TimeSlot> $timeSlots
 * @property-read int|null $time_slots_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereInstructorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereSeoMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Course withoutTrashed()
 * @mixin \Eloquent
 */
class Course extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'summary',
        'category_id',
        'is_featured',
        'instructor_name',
        'image',
        'gallery',
        'seo_meta'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'gallery' => 'array',
        'seo_meta' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
