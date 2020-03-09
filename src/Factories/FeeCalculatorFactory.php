<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Factories\FeeCalculatorFactoryInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderInterface;
use Lendable\Interview\Interpolation\FeeCalculatorInterface;
use Lendable\Interview\Interpolation\FeeCalculator;

class FeeCalculatorFactory implements FeeCalculatorFactoryInterface
{
    /**
     * @return FeeCalculatorInterface
     */
    public static function create(FeeBoundReaderInterface $feeBoundReader): FeeCalculatorInterface
    {
        return new FeeCalculator($feeBoundReader->getFeeBoundCollection());
    }
}
