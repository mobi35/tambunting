<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventChipsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this);
        return [
            'player' => $this->player->load(['country']),
            'rank' => $this->rank,
            'payout' => $this->payout,
            'current_chips' => $this->current_chips,
            'previous' => $this->previousReport,
            'changes' => $changes = $this->current_chips >= $this->previousReport ?
            $this->current_chips - $this->previousReport :
            $this->previousReport - $this->current_chips,
            'symbol' => $changes >= $this->previousReport ? 'up' : 'down',
        ];
    }
}
