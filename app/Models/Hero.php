<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Hero extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background_image')
            ->useFallbackUrl('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1950&q=80');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // Create a webp version with compression
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->performOnCollections('background_image');

        // Create a compressed version for thumbnails
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->quality(70)
            ->format('webp')
            ->performOnCollections('background_image');

        // Create a larger preview version
        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->quality(80)
            ->format('webp')
            ->performOnCollections('background_image');
    }
}
