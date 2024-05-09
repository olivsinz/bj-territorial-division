<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Neighborhood extends Model
{
    use HasFactory;

    /**
     * Get the distric that owns the neighborhood.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
