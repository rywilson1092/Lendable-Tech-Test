<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

final class Interpolation implements InterpolationInterface
{
    private LoanApplicationInterface $loanApplication;
    private FeeBoundInterface $lowerBound;
    private FeeBoundInterface $upperBound;

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
     * @return float The calculated total fee.
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
