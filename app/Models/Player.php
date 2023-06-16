<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'email',
        'phone',
        'street',
        'housenumber',
        'city',
        'zip',
        'club',
        'position',
        'accepted_disclaimer',
    ];

    protected $casts = [
        'birthdate'  => 'date:d.m.Y',
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->using(EventPlayer::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
