<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Town extends Model
{
    /** @use HasFactory<\Database\Factories\TownFactory> */
    use HasFactory;

    /**
     * Get the department that owns the town.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get all of the neighborhoods for the town.
     */
    public function neighborhoods(): HasManyThrough
    {
        return $this->hasManyThrough(Neighborhood::class, District::class);
    }

    /**
     * Get the districts for the town.
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  null|string  $field
     * @return null|\Illuminate\Database\Eloquent\Model
     */
    public function resolveRouteBinding($value, $field = null)
    {
        /** @var string $value */
        return $this->where('name', str($value)->upper())->firstOrFail();
    }
}
