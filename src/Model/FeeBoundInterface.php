<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

/**
 * This a model to represent a FeeBound object
 */
interface FeeBoundInterface
{
    /**
     * This will return the loan amount
     *
     * @return float
     */
    public function getLoanAmount(): float;

    /**
     * Returns the loan term
     *
     * @return integer
     */
    public function getLoanTerm(): int;

    /**
     * Returns the fee of the loan bound
     *
     * @return float
     */
    public function getFee(): float;
}
