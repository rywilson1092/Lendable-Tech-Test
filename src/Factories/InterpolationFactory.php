<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\InterpolationInterface;
use Lendable\Interview\Interpolation\Interpolation;

class InterpolationFactory implements InterpolationFactoryInterface
{
    /**
     * @return InterpolationInterface
     */
    public static function create(
        LoanApplicationInterface $loanApplication , 
        FeeBoundInterface $lowerBound , 
        FeeBoundInterface $upperBound
    ): InterpolationInterface{
        return new Interpolation($loanApplication , $lowerBound, $upperBound);
    }
}
