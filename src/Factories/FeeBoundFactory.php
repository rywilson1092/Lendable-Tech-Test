<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\FeeBound;

class FeeBoundFactory implements FeeBoundFactoryInterface
{
    /**
     * @return FeeBoundInterface
     */
    public static function create(float $loanAmount, int $loanTerm, float $fee): FeeBoundInterface
    {
        return new FeeBound($loanAmount, $loanTerm, $fee);
    }
}
