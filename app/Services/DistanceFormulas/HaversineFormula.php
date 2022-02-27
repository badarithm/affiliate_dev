<?php

namespace App\Services\DistanceFormulas;

use App\Models\Dtos\Vector;

class HaversineFormula implements SurfaceDistanceFormulaInterface
{
    public function apply(Vector $start, Vector $end): float|int
    {
        return self::RADIUS * 2 * asin(sqrt(
            pow(sin(($start->phi() - $end->phi()) / 2), 2) +
            (1 -
                pow(sin(($start->phi() - $end->phi()) / 2), 2) -
                pow(sin(($start->phi() + $end->phi()) / 2), 2)) *
            pow((sin(($start->lambda() - $end->lambda()) / 2)), 2)));
    }
}
