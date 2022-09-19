<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['prize', 'player_id', 'poker_event_id'];

    // protected $guarded = [
    //     'id'
    // ];

    public function poker_event()
    {
        return $this->belongsTo(PokerEvent::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class)->with('country');
    }
}
