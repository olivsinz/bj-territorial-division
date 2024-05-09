<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Town extends Model
{
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
}
