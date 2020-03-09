<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

/**
 * Interface for FeeBound class
 * We will use for abstracting and mocking.
 */
interface FeeBoundInterface
{
    /**
     * getTerm will return the loan duration for this loan application
     * in number of months.
     */
    public function getLoanAmount(): float;

    /**
     * getTerm will return the loan duration for this loan application
     * in number of months.
     */
    public function getLoanTerm(): int;

    /**
     * getAmount retrieves the amount requested for this loan application.
     */
    public function getFee(): float;
}