<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LOFApiEventIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */




    public function toArray($request)
    {
        $imgResource = [];
        foreach ($this->getMedia('event_gallery') as $media) {
            $imgResource[] = [
                'thumbnail' => $media->getUrl('thumbnail'),
                'main' => $media->getUrl(),
            ];
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'gallery' => $imgResource,
            'payout' => $this->payouts
        ] ;
    }
}
