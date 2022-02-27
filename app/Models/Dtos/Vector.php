<?php

namespace App\Models\Dtos;

interface Vector
{
    /**
     * Just plain geo positional latitude, acts as longitude getter
     * @return float
     */
    public function getLatitude(): float;

    /**
     * Just a plain geo positional longitude, acts as longitude getter
     * @return float
     */
    public function getLongitude(): float;

    /**
     * Returns longitude with radians applied. Named after parameters used in formulas, since it will be
     * used to plug into formulas primarily
     * @return float
     */
    public function lambda(): float;

    /**
     * Returns longitude converted to radians. Named after parameters used in formulas, since, that's
     * the intended application.
     * @return float
     */
    public function phi(): float;
}
