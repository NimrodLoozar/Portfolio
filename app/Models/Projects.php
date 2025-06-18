<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'heading1',
        'heading2',
        'heading3',
        'heading4',
        'url',
        'year',
        'banner',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getBannerUrlAttribute()
    {
        return $this->banner ? asset('storage/' . $this->banner) : null;
    }

    public function getImagesUrlAttribute()
    {
        return $this->images ? array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->images) : null;
    }

    public function deleteImage($imagePath)
    {
        if ($imagePath && \Storage::disk('public')->exists($imagePath)) {
            \Storage::disk('public')->delete($imagePath);
        }
    }
}
