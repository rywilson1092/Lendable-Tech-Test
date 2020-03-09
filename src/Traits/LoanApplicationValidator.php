<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

trait LoanApplicationValidator
{
    public function IsLoanAmountValid( float $loanAmount, float $minimumAmount , float $maximumAmount ){
        return $loanAmount >=  $minimumAmount && $loanAmount <= $maximumAmount;
    }

    public function IsLoanTermValid( int $loanTerm, array $availableTerms ){
        return in_array($loanTerm , $availableTerms);
    }
}