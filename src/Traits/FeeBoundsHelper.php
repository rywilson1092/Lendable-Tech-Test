<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

trait FeeBoundsHelper
{
    public function doesFeeExist(LoanApplicationInterface $loanApplication, FeeBoundInterface $feeBound): bool
    {
        
        return $feeBound->getLoanAmount() === $loanApplication->getAmount() &&
            $feeBound->getLoanTerm() === $loanApplication->getTerm();
    }

    public function isWithinFeeBoundsAndTermMatch(
        LoanApplicationInterface $loanApplication,
        FeeBoundInterface $lowerBound,
        FeeBoundInterface $upperBound
    ): bool {

        return $loanApplication->getAmount() > $lowerBound->getLoanAmount() &&
               $loanApplication->getAmount() < $upperBound->getLoanAmount() &&
               $loanApplication->getTerm() === $lowerBound->getLoanTerm() &&
               $loanApplication->getTerm() === $upperBound->getLoanTerm();
    }
}
