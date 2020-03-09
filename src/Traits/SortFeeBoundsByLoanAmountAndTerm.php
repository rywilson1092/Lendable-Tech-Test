<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Traits;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

trait SortFeeBoundsByLoanAmountAndTerm
{
    public function GetSortedArray( FeeBoundCollectionInterface $feeBoundCollection) : array{

        $clonedFeeBoundCollection = clone $feeBoundCollection;

        $feeBoundsArray = $clonedFeeBoundCollection->getFeeBounds();

        /* sort the array via loan amount */
        
        usort($feeBoundsArray, array($this , 'SortFeeBoundsByLoanAmountAndTerm'));

        return $feeBoundsArray;
    }

    public function SortFeeBoundsByLoanAmountAndTerm(FeeBoundInterface $x, FeeBoundInterface $y) : int
    {
        
        if ($x->getLoanAmount() === $y->getLoanAmount() && $x->getLoanTerm() === $y->getLoanTerm() ){
            return 0;
        }else if ($x->getLoanTerm() > $y->getLoanTerm()){
            return 1;
        }else if ($x->getLoanAmount() > $y->getLoanAmount()){
            return 1;
        }else{
            return -1;
        }
    }
}