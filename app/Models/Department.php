<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    /**
     * Get the towns for the department.
     */
    public function towns(): HasMany
    {
        return $this->hasMany(Town::class);
    }

    /**
     * Get all of the districts for the department.
     */
    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Town::class);
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
