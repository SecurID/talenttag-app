<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'host',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class)->using(EventPlayer::class);
    }
}
