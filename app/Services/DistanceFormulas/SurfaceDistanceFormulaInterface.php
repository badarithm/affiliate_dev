<?php

namespace App\Services\DistanceFormulas;

use App\Models\Dtos\Vector;

interface SurfaceDistanceFormulaInterface
{
    /**
     * Division by 1000, because this should be in kilometers
     */
    const RADIUS = 6.3781 * 1_000_000 / 1_000;

    public function apply(Vector $start, Vector $end): float|int;
}
