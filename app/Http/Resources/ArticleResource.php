<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'categories' => $this->article_categories,
            'body' => $this->body,
            'slug' => $this->slug,
            'date' => Carbon::parse($this->published_date)->toFormattedDateString(),
            'image' => $this->getFirstMediaUrl('article', 'image'),
            'author' => $this->article_author->first_name.' '.$this->article_author->last_name,
        ];
    }
}
