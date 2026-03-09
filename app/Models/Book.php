<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $category_id
 * @property bool $is_featured
 * @property array<array-key, mixed>|null $seo_meta
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $download_type
 * @property string|null $download_file
 * @property string|null $download_link
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereDownloadFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereDownloadLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereDownloadType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereSeoMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'is_featured',
        'image',
        'download_type',
        'download_file',
        'download_link',
        'seo_meta'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'seo_meta' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
