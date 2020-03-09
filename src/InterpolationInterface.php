<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

/**
 * This class will be used for interpolating values
 */
interface InterpolationInterface
{
    /**
     * @return float Will return the interpolated fee value.
     */
    public function getInterpolatedFee(): float;
}
