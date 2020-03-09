<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

/**
 *
 * This trait is intended to be used as a helper for
 * sorting FeeBoundArray based on loan and term
 */

trait SortFeeBoundsByLoanAmountAndTerm
{
    /**
     * This method will return a sorted array of FeeBoundInterface based on loan amount and term.
     *
     * @param FeeBoundCollectionInterface $feeBoundCollection
     * @return array
     */
    public function getSortedArray(FeeBoundCollectionInterface $feeBoundCollection): array
    {

        $clonedFeeBoundCollection = clone $feeBoundCollection;

        $feeBoundsArray = $clonedFeeBoundCollection->getFeeBounds();
        
        usort($feeBoundsArray, array($this , 'sortFeeBoundsByLoanAmountAndTerm'));

        return $feeBoundsArray;
    }

    /**
     * This function compares the two array items.
     * If the everything is equal nothing changes and 0 is returned.
     * If either Loan Amount or LoanTerm is greater.
     * 1 will be returned and the sorting function will move x forwards in array.
     * Anything else a -1 is returned to x backwards in array.
     * @param FeeBoundInterface $x
     * @param FeeBoundInterface $y
     * @return integer
     */
    public function sortFeeBoundsByLoanAmountAndTerm(FeeBoundInterface $x, FeeBoundInterface $y): int
    {
        if ($x->getLoanAmount() === $y->getLoanAmount() && $x->getLoanTerm() === $y->getLoanTerm()) {
            return 0;
        } elseif ($x->getLoanTerm() > $y->getLoanTerm()) {
            return 1;
        } elseif ($x->getLoanAmount() > $y->getLoanAmount()) {
            return 1;
        } else {
            return -1;
        }
    }
}
