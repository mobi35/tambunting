<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageTheme extends Model implements HasMedia
{
    use InteractsWithMedia;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function registerMediaConversions(?Media $media = null): void
    {
        // $this->addMediaConversion('featured-image')
        //     ->width(1920)
        //     ->height(1080);
    }

    public function getImageAttribute($value)
    {
        return $this->getFirstMediaUrl('image-theme');
    }

    public function setImageAttribute($value)
    {
        if ($value == null || preg_match("/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).base64,.*/", $value) == 0) {
            return false;
        }
        $this->addMediaFromBase64($value)
            ->toMediaCollection('image-theme');
    }

    public function live_report() {
        return $this->belongsTo(EventReport::class);
    }
}



