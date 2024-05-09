<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    /**
     * Get the neighborhood for the district.
     */
    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class);
    }
}
