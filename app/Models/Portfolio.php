<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Portfolio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity;

    protected $fillable = [
        'title',
        'description',
        'is_published'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // Create a webp version with compression
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(80)
            ->performOnCollections('image')
            ->nonQueued();

        // Create a compressed version for thumbnails
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->quality(70)
            ->format('webp')
            ->performOnCollections('image')
            ->nonQueued();

        // Create a larger preview version
        $this->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->quality(80)
            ->format('webp')
            ->performOnCollections('image')
            ->nonQueued();
    }
}
