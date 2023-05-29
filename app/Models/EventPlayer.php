<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventPlayer extends Pivot
{
    public $incrementing = true;

    protected $fillable = [
        'event_id',
        'player_id',
        'number',
        'finalRating',
    ];

}
