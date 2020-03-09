<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;

/**
 * This factory will creat4e LoanApplication objects
 */
interface LoanApplicationFactoryInterface
{
    /**
     * This method will return a new loanApplication objet based on the input.
     *
     * @param float $amount
     * @param integer $term
     * @return LoanApplicationInterface
     */
    public static function create(float $amount, int $term): LoanApplicationInterface;
}
