<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PokerTournament extends Model implements HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('featured-image')
            ->width(800)
            ->height(800);
    }

    public function getImageAttribute($value)
    {
        return $this->getFirstMediaUrl('poker_tournaments', 'featured-image');
    }

    public function setImageAttribute($value)
    {
        if ($value == null || preg_match("/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).base64,.*/", $value) == 0) {
            return;
        }

        $this->addMediaFromBase64($value)
            ->toMediaCollection('poker_tournaments');
    }

    protected $guarded = [
        'id',
    ];

    public function poker_tour()
    {
        return $this->belongsTo(PokerTour::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function timezones()
    {
        return [

        ];
    }

    public function getParentAttribute($value)
    {
        return $this->poker_tour()->first()->title.' > '.$this->title;
    }

    public function poker_events()
    {
        return $this->hasMany(PokerEvent::class);
    }
}
