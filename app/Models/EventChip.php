<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventChip extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chips',
        'name',
        'current_chips',
        'chips_before',
        'rank',
        'payout',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function liveReports()
    {
        return $this->belongsToMany(EventReport::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function getPreviousReportAttribute($value)
    {
        return EventChip::where('player_id', $this->player_id)->
          where('poker_event_id', $this->poker_event_id)
          ->where('id', '<', $this->id)
          ->orderBy('id', 'desc')->first()->current_chips ?? 0;
    }
}
