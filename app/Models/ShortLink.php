<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'short_code',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(LinkVisit::class);
    }
}
