<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\InterpolationInterface;

/**
 * Factory used to create Interpolation objects
 */
interface InterpolationFactoryInterface
{
    /**
     * This method will return an interpolation object
     *
     * @param LoanApplicationInterface $loanApplication
     * @param FeeBoundInterface $lowerBound
     * @param FeeBoundInterface $upperBound
     * @return InterpolationInterface
     */
    public static function create(
        LoanApplicationInterface $loanApplication,
        FeeBoundInterface $lowerBound,
        FeeBoundInterface $upperBound
    ): InterpolationInterface;
}
