<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

/**
 * This trait is used for validating loan applications before creation.
 */
trait LoanApplicationValidator
{

    /**
     * This mrthod is used to determine if loan amount is within min and max amount.
     * @param float $loanAmount
     * @param float $minimumAmount
     * @param float $maximumAmount
     * @return boolean
     */
    public function isLoanAmountValid(float $loanAmount, float $minimumAmount, float $maximumAmount)
    {
        return $loanAmount >=  $minimumAmount && $loanAmount <= $maximumAmount;
    }
    
    /**
     * This function is used to determine if loanTerm is within available terms.
     *
     * @param integer $loanTerm
     * @param array $availableTerms
     * @return boolean
     */
    public function isLoanTermValid(int $loanTerm, array $availableTerms)
    {
        return in_array($loanTerm, $availableTerms);
    }
}
