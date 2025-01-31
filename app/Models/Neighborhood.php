<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Neighborhood extends Model
{
    /** @use HasFactory<\Database\Factories\NeighborhoodFactory> */
    use HasFactory;

    /**
     * Get the distric that owns the neighborhood.
     *
     * @return BelongsTo<\App\Models\District, $this>
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
