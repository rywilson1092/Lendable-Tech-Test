<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\FeeCalculatorInterface;
use Lendable\Interview\Interpolation\Factories\InterpolationFactory;
use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

use Lendable\Interview\Interpolation\Traits\SortFeeBoundsByLoanAmountAndTerm;
use Lendable\Interview\Interpolation\Traits\FeeBoundsHelper;
use Lendable\Interview\Interpolation\Traits\LoanFeeRounder;

use exception;

class FeeCalculator implements FeeCalculatorInterface
{
    use SortFeeBoundsByLoanAmountAndTerm , FeeBoundsHelper , LoanFeeRounder;

    private $feeBoundsArray = array();

    public function __construct( FeeBoundCollectionInterface $feeBoundCollection) {
        /* Get the bounds */
        $this->feeBoundsArray = $this->GetSortedArray( $feeBoundCollection );
    }

    /**
     * @return float The calculated total fee.
     */
    public function Calculate(LoanApplicationInterface $loanApplication) : float{

        for($i = 0; $i < count($this->feeBoundsArray) - 1; $i++){

            /* if feeBoundsArray item loanAmount and term is equal then no interpolation required */

            if($this->DoesFeeExist($loanApplication , $this->feeBoundsArray[$i])
            ){
                $fee = $this->feeBoundsArray[$i]->getFee();
                break;
            }elseif(
                $this->IsWithinFeeBoundsAndTermMatch(
                    $loanApplication , $this->feeBoundsArray[$i] , $this->feeBoundsArray[$i + 1]
                ))
            {
                $interpolation = InterpolationFactory::create(
                    $loanApplication,
                    $this->feeBoundsArray[$i],
                    $this->feeBoundsArray[$i + 1]
                );

                $fee = $interpolation->getInterpolatedFee();

                break;
            }
        }

        if(isset($fee) && is_float($fee)){
            return $this->RoundFeeByLoanAmount( $fee , $loanApplication->getAmount() , self::ROUND_TO_NEAREST);
        }else{
            throw new exception( self::NO_FEE_EXCEPTION);
        }
    }
}