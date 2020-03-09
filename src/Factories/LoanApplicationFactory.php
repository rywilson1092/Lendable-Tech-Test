<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\LoanApplication;

class LoanApplicationFactory implements LoanApplicationFactoryInterface
{
    /**
     * @return LoanApplicationInterface
     */
    public static function create(float $amount, int $term): LoanApplicationInterface
    {
        return new LoanApplication($amount, $term);
    }
}
