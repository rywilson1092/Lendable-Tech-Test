<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeCalculatorInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderInterface;

interface FeeCalculatorFactoryInterface
{
    /**
     * @return FeeCalculatorInterface
     */
    public static function create(FeeBoundReaderInterface $feeBoundReader): FeeCalculatorInterface;
}
