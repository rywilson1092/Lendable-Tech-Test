<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;

interface FeeCalculatorInterface
{
    const NO_FEE_EXCEPTION = 'Error no fee found.';
    const ROUND_TO_NEAREST = 5;
    /**
     * @return float The calculated total fee.
     */
    public function Calculate(LoanApplicationInterface $loanApplication): float;
}
