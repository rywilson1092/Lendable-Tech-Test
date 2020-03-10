<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

/**
 * This class will calculate interpolated fee using loanApplication
 * and the FeeBounds it falls between.
 */
final class Interpolation implements InterpolationInterface
{
    private LoanApplicationInterface $loanApplication;
    private FeeBoundInterface $lowerBound;
    private FeeBoundInterface $upperBound;


    /**
     * Will construct the interpolation object.
     *
     * @param LoanApplicationInterface $loanApplication
     * @param FeeBoundInterface $lowerBound
     * @param FeeBoundInterface $upperBound
     */
    public function __construct(
        LoanApplicationInterface $loanApplication,
        FeeBoundInterface $lowerBound,
        FeeBoundInterface $upperBound
    ) {
        $this->loanApplication = $loanApplication;
        $this->lowerBound = $lowerBound;
        $this->upperBound = $upperBound;
    }

    /**
     * Will calculate the loan amount by linear interpolating between the bounds.
     *
     * @return float
     */
    public function getInterpolatedFee(): float
    {

        $upperBoundFee = $this->upperBound->getFee();
        $lowerBoundFee = $this->lowerBound->getFee();

        $upperBoundAmount = $this->upperBound->getLoanAmount();
        $lowerBoundAmount = $this->lowerBound->getLoanAmount();
        $loanApplicationAmount = $this->loanApplication->getAmount();

        $interpolatedFee = (
            (($upperBoundFee - $lowerBoundFee) * ($loanApplicationAmount - $lowerBoundAmount ))
            /
            ($upperBoundAmount - $lowerBoundAmount)) + $lowerBoundFee;

        return $interpolatedFee;
    }
}
