<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

trait LoanFeeRounder
{
    public function RoundFeeByLoanAmount( float $fee , float $loanAmount , float $roundUpToNearest) : float{

        $roundedFeeAndLoanAmount = ceil( ( $fee + $loanAmount ) / $roundUpToNearest );        

        $roundedFeeAndLoanAmount *= $roundUpToNearest;

        return $roundedFeeAndLoanAmount - $loanAmount;
    }
}