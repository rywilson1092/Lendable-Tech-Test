<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

trait SortFeeBoundsByLoanAmountAndTerm
{
    public function getSortedArray(FeeBoundCollectionInterface $feeBoundCollection): array
    {

        $clonedFeeBoundCollection = clone $feeBoundCollection;

        $feeBoundsArray = $clonedFeeBoundCollection->getFeeBounds();

        /* sort the array via loan amount */
        
        usort($feeBoundsArray, array($this , 'sortFeeBoundsByLoanAmountAndTerm'));

        return $feeBoundsArray;
    }

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
