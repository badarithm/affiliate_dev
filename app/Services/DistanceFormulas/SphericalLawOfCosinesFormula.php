<?php

namespace App\Services\DistanceFormulas;

use App\Models\Dtos\Vector;

class SphericalLawOfCosinesFormula implements SurfaceDistanceFormulaInterface
{

    public function apply(Vector $start, Vector $end): float|int
    {
        return self::RADIUS * acos(
            sin($start->phi()) * sin($end->phi())
            +
            cos($start->phi()) * cos($end->phi()) * cos($start->lambda() - $end->lambda())
            );
    }
}
