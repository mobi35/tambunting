<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('banner')
            ->width(540)
            ->height(740);

        $this->addMediaConversion('thumbnail')
            ->width(100)
            ->height(100)
            ->performOnCollections('event_gallery');
    }

    public function getImageAttribute($value)
    {
        return $this->getFirstMediaUrl('event_banner', 'banner');
    }

    public function setImageAttribute($value)
    {
        if ($value == null || preg_match("/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).base64,.*/", $value) == 0) {
            return false;
        }
        $this->addMediaFromBase64($value)
            ->toMediaCollection('event_banner');
    }

    public function getParentAttribute($value)
    {
        return $this->poker_tournament()->first()->title.' > '.$this->title;
    }

    public function live_report_players()
    {
        return $this->hasMany(EventChip::class);
    }

    public function latest_live_report_players()
    {
        return $this->hasMany(EventChip::class)->orderByDesc('current_chips');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function live_reports()
    {
        return $this->hasMany(EventReport::class);
    }

    public function payouts()
    {
        return $this->hasMany(Payout::class);
    }


    public function openLiveReporting($crud = false)
    {
        return '<a class="btn btn-sm btn-link"  href="report?event='.urlencode($this->attributes['id']).'" data-toggle="tooltip" title="Live reporting"><i class="fa fa-search"></i> Reports  </a>';
    }

    public function openPayout($crud = false)
    {
        return '<a class="btn btn-sm btn-link"  href="payout?event='.urlencode($this->attributes['id']).'" data-toggle="tooltip" title="Live reporting"><i class="fa fa-search"></i> Payouts  </a>';
    }
}
