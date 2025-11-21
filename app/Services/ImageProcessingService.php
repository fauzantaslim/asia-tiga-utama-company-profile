<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageProcessingService
{
    protected ImageManager $imageManager;

    public function __construct()
    {
        $this->imageManager = new ImageManager(new Driver());
    }

    /**
     * Process and compress an image, converting it to WebP format
     *
     * @param UploadedFile $image
     * @param string $disk
     * @param string $path
     * @param int $quality
     * @return string
     */
    public function processAndConvertToWebp(UploadedFile $image, string $disk = 'public', string $path = 'images', int $quality = 80): string
    {
        // Create image instance
        $imageInstance = $this->imageManager->read($image->getPathname());

        // Resize if needed (adjust dimensions as needed)
        $imageInstance->scaleDown(1200, 1200);

        // Generate filename with webp extension
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

        // Save as WebP
        $webpImage = $imageInstance->toWebp($quality);

        // Store the processed image
        $fullPath = $path . '/' . $filename;
        Storage::disk($disk)->put($fullPath, $webpImage);

        return $fullPath;
    }

    /**
     * Compress an image while maintaining its original format
     *
     * @param UploadedFile $image
     * @param string $disk
     * @param string $path
     * @param int $quality
     * @return string
     */
    public function compressImage(UploadedFile $image, string $disk = 'public', string $path = 'images', int $quality = 80): string
    {
        // Create image instance
        $imageInstance = $this->imageManager->read($image->getPathname());

        // Resize if needed (adjust dimensions as needed)
        $imageInstance->scaleDown(1200, 1200);

        // Generate filename
        $filename = $image->getClientOriginalName();

        // Get image format
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Compress based on format
        switch ($extension) {
            case 'png':
                $processedImage = $imageInstance->toPng();
                break;
            case 'jpg':
            case 'jpeg':
                $processedImage = $imageInstance->toJpeg($quality);
                break;
            case 'webp':
                $processedImage = $imageInstance->toWebp($quality);
                break;
            default:
                $processedImage = $imageInstance->toJpeg($quality);
                break;
        }

        // Store the processed image
        $fullPath = $path . '/' . $filename;
        Storage::disk($disk)->put($fullPath, $processedImage);

        return $fullPath;
    }
}
