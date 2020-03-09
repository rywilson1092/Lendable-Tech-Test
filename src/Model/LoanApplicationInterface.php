<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

/**
 * Interface for cut down loan application class
 * We will use for abstracting and mocking.
 */
interface LoanApplicationInterface
{
    const MINIMUM_AMOUNT = 1000;
    const MAXIMUM_AMOUNT = 20000;

    const POSSIBLE_TERMS = array(12,24);

    /**
     * getTerm will return the loan duration for this loan application
     * in number of months.
     */
    public function getTerm(): int;

    /**
     * getAmount retrieves the amount requested for this loan application.
     */
    public function getAmount(): float;
}