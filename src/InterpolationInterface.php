<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

interface InterpolationInterface
{
    /**
     * @return float The calculated total fee.
     */
    public function getInterpolatedFee(): float;
}
