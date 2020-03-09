<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Factories\FeeCalculatorFactoryInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderInterface;
use Lendable\Interview\Interpolation\FeeCalculatorInterface;
use Lendable\Interview\Interpolation\FeeCalculator;

/**
 * This factory is used for creating FeeCalculator objects
 */
class FeeCalculatorFactory implements FeeCalculatorFactoryInterface
{
    /**
     * This will create a FeeCalculator object using the FeeBoundReader
     *
     * @param FeeBoundReaderInterface $feeBoundReader
     * @return FeeCalculatorInterface
     */
    public static function create(FeeBoundReaderInterface $feeBoundReader): FeeCalculatorInterface
    {
        return new FeeCalculator($feeBoundReader->getFeeBoundCollection());
    }
}
