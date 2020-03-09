<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

/**
 * This helper is used for calculating the rounded fee value.
 */
trait LoanFeeRounder
{
    /**
     * This will calculate the rounded fee value based on fee + loanAmount to
     * nearest number depending on user input.
     *
     * @param float $fee
     * @param float $loanAmount
     * @param float $roundUpToNearest
     * @return float
     */
    public function roundFeeByLoanAmount(float $fee, float $loanAmount, float $roundUpToNearest): float
    {
        $roundedFeeAndLoanAmount = ceil(( $fee + $loanAmount ) / $roundUpToNearest);

        $roundedFeeAndLoanAmount *= $roundUpToNearest;

        return $roundedFeeAndLoanAmount - $loanAmount;
    }
}
