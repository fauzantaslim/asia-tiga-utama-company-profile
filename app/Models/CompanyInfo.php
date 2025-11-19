<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CompanyInfo extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'google_map_embed_link',
        'instagram',
        'facebook',
        'youtube',
        'website_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo_website')
            ->singleFile();
    }
}
