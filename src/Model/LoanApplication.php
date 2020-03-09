<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

use Lendable\Interview\Interpolation\Traits\LoanApplicationValidator;
use Exception;

/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
final class LoanApplication implements LoanApplicationInterface
{
    use LoanApplicationValidator;

    private const MINIMUM_AMOUNT = 1000;
    private const MAXIMUM_AMOUNT = 20000;

    private const POSSIBLE_TERMS = array(12,24);

    /**
     * @var int
     */
    private int $term;

    /**
     * @var float
     */
    private float $amount;


    /**
     * Creates LoanApplication and validates usign the above constants.
     *
     * @param float $amount
     * @param integer $term
     */
    public function __construct(float $amount, int $term)
    {
        $this->amount = round($amount, 2);
        $this->term = $term;
        $this->validate();
    }

    /**
     * Validates tbe amount and term. If invalid throws exception.
     *
     * @return void
     * @throws Exception
     */
    private function validate(): void
    {
        if (!$this->IsLoanAmountValid($this->amount, self::MINIMUM_AMOUNT, self::MAXIMUM_AMOUNT)) {
            throw new Exception('Loan Amount must be between ' . self::MINIMUM_AMOUNT . ' and ' .
                self::MAXIMUM_AMOUNT . '.');
        }

        if (!$this->IsLoanTermValid($this->term, self::POSSIBLE_TERMS)) {
            throw new Exception('Loan term is not valid. Valid Terms are: ' .
                implode(',', self::POSSIBLE_TERMS) . ' in months.');
        }
    }

    /**
     * Returns the loan amount
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Returns the term of the loan
     *
     * @return integer
     */
    public function getTerm(): int
    {
        return $this->term;
    }
}
