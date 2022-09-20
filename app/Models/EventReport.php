<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EventReport extends Model implements HasMedia
{
    use InteractsWithMedia;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('img-logo')
            ->width(300)
            ->height(300);

        $this->addMediaConversion('main-image')
            ->width(1920)
            ->height(1080);
    }

    protected $guarded = ['id'];

    protected $casts = [
        'players' => 'json',
    ];

    public function getImageAttribute($value)
    {
        return $this->getFirstMediaUrl('logo', 'img-logo');
    }

    public function setImageAttribute($value)
    {
        if ($value == null || preg_match("/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).base64,.*/", $value) == 0) {
            return false;
        }
        $this->addMediaFromBase64($value)
            ->toMediaCollection('logo');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function liveReportPlayers()
    {
        return $this->belongsToMany(EventChip::class);
    }

    public function live_report_players()
    {
        return $this->belongsToMany(EventChip::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function article_author()
    {
        return $this->belongsTo(ArticleAuthor::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function shareToSocialMedia()
    {
        return '<a class="btn btn-sm btn-link"  href="https://facebook.com" data-toggle="tooltip" title="Share to facebook"><i class="la la-facebook"></i>    </a>';
    }

    public function setPlayersAttribute($value)
    {
        if ($value === null) {
            $value = '';

            return;
        }

        if (isset($this->attributes['id'])) {
            if (count($value) > 0) {
                $this->liveReportPlayers()->detach();

                foreach ($value as $player) {
                    if ($player['player_id'] === null) {
                        continue;
                    }
                    $liveReportPlayer = new EventChip();

                    $liveReportPlayer->event_id = $this->event_id;
                    $player_id = Player::find($player['player_id']);
                    $liveReportPlayer->name = $player_id->name;
                    $liveReportPlayer->player_id = $player['player_id'];
                    $liveReportPlayer->current_chips = $player['current_chips'];
                    $liveReportPlayer->payout = $player['payout'];
                    $liveReportPlayer->rank = $player['rank'];
                    $liveReportPlayer->chips_before = 0;
                    $isSave = $liveReportPlayer->save();
                    $this->liveReportPlayers()->attach($liveReportPlayer);
                }
                $this->liveReportPlayers()->get();

                $this->attributes['players'] = '[]';
            }
        } else {
            $this->attributes['players'] = json_encode($value);
        }
    }

    public function getPlayersAttribute($value)
    {
        // dd($value);
        if ($this->liveReportPlayers()->count()) {
            $val = EventChip::with(['liveReports'])->whereHas('liveReports', function ($query) {
                $query->where('live_report_id', $this->id);
            })->get(['player_id', 'current_chips', 'payout', 'rank']);

            return json_encode($val->toArray());
        } else {
            return '';
        }
    }

    protected static function booted()
    {
        static::created(function ($liveReport) {
            $reportedPlayer = json_decode($liveReport->players, true);
            if (is_countable($reportedPlayer)) {
                foreach ($reportedPlayer as $player) {
                    if ($player['player_id'] === null) {
                        continue;
                    }
                    $liveReportPlayer = new EventChip();

                    $liveReportPlayer->event_id = $liveReport->event_id;
                    $player_id = Player::find($player['player_id']);
                    $liveReportPlayer->name = $player_id->name;
                    $liveReportPlayer->player_id = $player['player_id'];
                    $liveReportPlayer->current_chips = $player['current_chips'];
                    $liveReportPlayer->chips_before = 0;
                    $liveReportPlayer->payout = $player['payout'];
                    $liveReportPlayer->rank = $player['rank'];
                    $liveReportPlayer->save();
                    $liveReport->liveReportPlayers()->attach($liveReportPlayer);
                }

                // dd($liveReport->liveReportPlayers()->get());
            }
        });
    }
}
