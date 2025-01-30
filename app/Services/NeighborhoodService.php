<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Neighborhood;

/**
 * Class NeighborhoodService
 */
class NeighborhoodService
{
    public const CACHE_KEY_ROOT = 'neighborhoods.page-size-';

    public function cacheKey(int $pageSize, int $page): string
    {
        return self::CACHE_KEY_ROOT . $pageSize . '.page-' . $page;
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator<\App\Models\Neighborhood>
     */
    public function get(int $pageSize = 20, int $page = 1)
    {
        return Neighborhood::paginate(
            $pageSize,
            ['*'], // @phpstan-ignore argument.type
            'page',
            $page
        );
    }
}
