<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = ['id'];

    use CrudTrait;
    use HasFactory;

    public function live_reports()
    {
        return $this->hasMany(LiveReport::class);
    }
}
