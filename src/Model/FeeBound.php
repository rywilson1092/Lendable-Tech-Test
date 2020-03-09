<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

/**
 * This a model to represent a FeeBound object
 */
final class FeeBound implements FeeBoundInterface
{
    /**
     * Amount of the loan
     */
    private float $loanAmount;
    
    /**
     * The lengh og the loan in months
     */
    private int $loanTerm;

    /**
     * The fee for this type of loan
     */
    private float $fee;

    /**
     * Used to create the FeeBound Object
     *
     * @param float $loanAmount
     * @param integer $loanTerm
     * @param float $fee
     */
    public function __construct(float $loanAmount, int $loanTerm, float $fee)
    {
        $this->loanAmount = $loanAmount;
        $this->loanTerm = $loanTerm;
        $this->fee = $fee;
    }

    /**
     * This will return the loan amount
     *
     * @return float
     */
    public function getLoanAmount(): float
    {

        return $this->loanAmount;
    }

    /**
     * Returns the loan term
     *
     * @return integer
     */
    public function getLoanTerm(): int
    {
        return $this->loanTerm;
    }

    /**
     * Returns the fee of the loan bound
     *
     * @return float
     */
    public function getFee(): float
    {
        return $this->fee;
    }
}
