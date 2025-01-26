<?php

namespace App\Models;

use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

// #[ScopedBy([isActiveScope::class])]
class Feed extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

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

    // public function description(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => Str::title($value)
    //     );
    // }
}
