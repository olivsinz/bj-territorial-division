<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection $neighborhoods
 */
class District extends Model
{
    use HasFactory;

    /**
     * Get the neighborhood for the district.
     */
    public function neighborhoods(): HasMany
    {
        return $this->hasMany(Neighborhood::class);
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
