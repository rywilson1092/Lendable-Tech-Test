<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
interface LoanApplicationInterface
{
    /**
     * Returns the loan amount
     *
     * @return float
     */
    public function getAmount(): float;

    /**
     * Returns the term of the loan
     *
     * @return integer
     */
    public function getTerm(): int;
}
