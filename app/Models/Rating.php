<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'event_id',
        'player_id',
        'rating',
        'comment',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
