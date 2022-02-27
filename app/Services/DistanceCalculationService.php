<?php

namespace App\Services;

use App\Models\Dtos\AffiliateEntryDto;
use App\Models\Dtos\TwoDimensionalVector;
use App\Models\Dtos\Vector;
use App\Services\DistanceFormulas\SurfaceDistanceFormulaInterface;
use Illuminate\Support\Collection;

class DistanceCalculationService
{
    protected SurfaceDistanceFormulaInterface $distanceFormula;

    protected Vector $centre;

    public function __construct(SurfaceDistanceFormulaInterface $distanceFormula)
    {
        $this->distanceFormula = $distanceFormula;
        $this->centre = $this->getCentre();
    }

    private function getCentre(): Vector
    {
        return new AffiliateEntryDto(0, 'Office in Dublin',53.3340285, -6.2535495);
    }

    public function calculateDistanceToCentre(Vector $position): float
    {
        return $this->distanceFormula->apply($position, $this->centre);
    }
}
