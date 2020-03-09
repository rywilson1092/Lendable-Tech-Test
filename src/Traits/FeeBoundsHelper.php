<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

/**
 * This FeeBoundsHelper is used for checking loan application with feebounds
 */
trait FeeBoundsHelper
{

    /**
     * This is used to check if there is already an applicable fee for the loanApplication
     *
     * @param LoanApplicationInterface $loanApplication
     * @param FeeBoundInterface $feeBound
     * @return boolean
     */
    public function doesFeeExist(LoanApplicationInterface $loanApplication, FeeBoundInterface $feeBound): bool
    {
        
        return $feeBound->getLoanAmount() === $loanApplication->getAmount() &&
            $feeBound->getLoanTerm() === $loanApplication->getTerm();
    }

    /**
     * This is used for find if the loanApplication falls between two terms.
     *
     * @param LoanApplicationInterface $loanApplication
     * @param FeeBoundInterface $lowerBound
     * @param FeeBoundInterface $upperBound
     * @return boolean
     */
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
