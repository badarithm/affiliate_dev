<?php

namespace App\Models\Dtos;


use Illuminate\Support\Facades\Log;

class AffiliateEntryDto extends AffiliateGeoPositionDto implements DistanceInterface
{
    /**
     * Affiliate id. Acts as identifier only.
     * @var int
     */
    private int $affiliate_id;

    /**
     * Affiliate name. Acts as identifier only.
     * @var string
     */
    private string $name;

    /**
     * Distance to some other position
     * @var float
     */
    private float $distance;

    /**
     * This can be instantiated using one line from the file
     * @param int $affiliate_id
     * @param string $nane
     * @param float $lng
     * @param float $lat
     */
    public function __construct(int $affiliate_id, string $nane, float $lng, float $lat)
    {
        parent::__construct($lng, $lat);
        $this->affiliate_id = $affiliate_id;
        $this->name = $nane;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAffiliateId(): int
    {
        return $this->affiliate_id;
    }

    /**
     * Distance is set from external service. It's not known at the time of creation, but is set
     * before it's used for filter / sort
     * @param float $distance
     * @return void
     */
    public function setDistancePoint(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * If no distance is set, then this will fail, since there is type mismatch
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }
}
