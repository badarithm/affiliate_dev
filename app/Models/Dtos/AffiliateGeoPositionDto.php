<?php

namespace App\Models\Dtos;

class AffiliateGeoPositionDto implements Vector
{
    use FunctionPlugTrait;

    /**
     * Just setting basic parameters. Because php does not have tuples, will use reflection to infer / instantiate those
     * @param float $lng
     * @param float $lat
     */
    public function __construct(float $lng, float $lat)
    {
        $this->longitude = $lng;
        $this->latitude = $lat;
    }
}
