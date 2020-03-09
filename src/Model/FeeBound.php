<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

/**
 * Interface for FeeBound class
 * We will use for abstracting and mocking.
 */
final class FeeBound implements FeeBoundInterface
{

    private float $loanAmount;
    private int $loanTerm;
    private float $fee;

    public function __construct( float $loanAmount , int $loanTerm , float $fee){
        $this->loanAmount = $loanAmount;
        $this->loanTerm = $loanTerm;
        $this->fee = $fee;
    }

    /**
     * getTerm will return the loan duration for this loan application
     * in number of months.
     */
    public function getLoanAmount(): float {

        return $this->loanAmount;
    }

    /**
     * getTerm will return the loan duration for this loan application
     * in number of months.
     */
    public function getLoanTerm(): int {
        return $this->loanTerm;
    }

    /**
     * getAmount retrieves the amount requested for this loan application.
     */
    public function getFee(): float{
        return $this->fee;
    }
}