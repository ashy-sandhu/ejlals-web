<?php

namespace App\Models;

use App\Traits\HasSeoSchema;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasSeoSchema;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'is_featured',
        'image',
        'image_alt',
        'download_type',
        'download_file',
        'download_link',
        'seo_meta',
        'seo_title',
        'seo_description'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'seo_meta' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Generate professional Book structured data.
     */
    public function generateSchema(): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Book",
            "name" => $this->title,
            "description" => strip_tags($this->description),
            "image" => $this->image ? asset('storage/' . $this->image) : null,
            "publisher" => self::getOrganizationSchema()
        ];
    }
}
