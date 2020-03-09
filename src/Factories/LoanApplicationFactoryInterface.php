<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;

interface LoanApplicationFactoryInterface
{
    /**
     * @return LoanApplicationInterface
     */
    public static function create(float $amount, int $term): LoanApplicationInterface;
}
