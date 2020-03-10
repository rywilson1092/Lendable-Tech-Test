<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;

/**
 * Used for calculating the fee based on LoanApplication data and fee bounds
 */
interface FeeCalculatorInterface
{
    /**
     * @return float The calculated total fee.
     */
    public function calculate(LoanApplicationInterface $loanApplication): float;
}
