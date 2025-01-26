<?php

namespace App\Models;

use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([isActiveScope::class])]
class Feed extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'is_active'];

    // protected static function booted()
    // {
    //     static::addGlobalScope(new isActiveScope());
    // }

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
