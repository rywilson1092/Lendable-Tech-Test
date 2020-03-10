<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

/**
 * Factory used for creating FeeBounds
 */
interface FeeBoundFactoryInterface
{
    
    /**
     * Creates item that implements FeeBoundInterface
     *
     * @param float $loanAmount
     * @param integer $loanTerm
     * @param float $fee
     * @return FeeBoundInterface
     */
    public static function create(float $loanAmount, int $loanTerm, float $fee): FeeBoundInterface;
}
