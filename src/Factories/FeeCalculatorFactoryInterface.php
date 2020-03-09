<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeCalculatorInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderInterface;

/**
 * This factory is used for creating FeeCalculator objects
 */
interface FeeCalculatorFactoryInterface
{
    /**
     * This will create a FeeCalculator object using the FeeBoundReader
     *
     * @param FeeBoundReaderInterface $feeBoundReader
     * @return FeeCalculatorInterface
     */
    public static function create(FeeBoundReaderInterface $feeBoundReader): FeeCalculatorInterface;
}
