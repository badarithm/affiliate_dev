<?php

namespace App\Models\Dtos;

/**
 * Since these terms are used interchangeably in teh literature, this helps to remove
 * need to check annotation
 */
trait FunctionPlugTrait
{
    private $radianConversion = M_PI / 180;

    private float $latitude;

    private float $longitude;

    final public function phi(): float
    {
        return $this->radianConversion * $this->getLatitude();
    }

    final public function lambda(): float
    {
        return $this->radianConversion * $this->getLongitude();
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
