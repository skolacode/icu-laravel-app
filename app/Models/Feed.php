<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'is_active'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps()->withPivot('isActive');
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }
}
