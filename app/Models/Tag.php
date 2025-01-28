<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function feeds()
    {
        return $this->belongsToMany(Feed::class)->withTimestamps()->withPivot('isActive');
    }

    public function allCapName(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::upper($this->name),
        );
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::upper($value),
        );
    }
}
