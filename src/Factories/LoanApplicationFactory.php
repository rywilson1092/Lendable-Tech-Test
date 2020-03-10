<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\LoanApplication;

/**
 * This factory will creat4e LoanApplication objects
 */
class LoanApplicationFactory implements LoanApplicationFactoryInterface
{
    /**
     * This method will return a new loanApplication objet based on the input.
     *
     * @param float $amount
     * @param integer $term
     * @return LoanApplicationInterface
     */
    public static function create(float $amount, int $term): LoanApplicationInterface
    {
        return new LoanApplication($amount, $term);
    }
}
