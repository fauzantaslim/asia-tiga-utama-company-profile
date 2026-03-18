<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CompanyInfo extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

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

        $this->addMediaCollection('company_profile')
            ->singleFile()
            ->acceptsMimeTypes(['application/pdf']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // Create a webp version with compression
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->performOnCollections('logo_website')
            ->nonQueued();

        // Create a compressed version for thumbnails
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->quality(70)
            ->format('webp')
            ->performOnCollections('logo_website')
            ->nonQueued();

        // Create a larger preview version
        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->quality(80)
            ->format('webp')
            ->performOnCollections('logo_website')
            ->nonQueued();
    }
}
