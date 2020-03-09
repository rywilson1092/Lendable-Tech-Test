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
use Exception;

/**
 * Used for calculating the fee based on LoanApplication data and fee bounds
 */
class FeeCalculator implements FeeCalculatorInterface
{
    /**
     * Helpers
     */
    use SortFeeBoundsByLoanAmountAndTerm;
    use FeeBoundsHelper;
    use LoanFeeRounder;

    private const NO_FEE_EXCEPTION = 'Error no fee found.';
    private const ROUND_TO_NEAREST = 5;

    /**
     * Array that holds feeBounds items.
     *
     * @var array
     */
    private $feeBoundsArray = array();

    /**
     * Once initialised the calculater will get an ascending ordered
     * array of FeeBounds from FeeBoundsCollection
     *
     * @param FeeBoundCollectionInterface $feeBoundCollection
     */
    public function __construct(FeeBoundCollectionInterface $feeBoundCollection)
    {
        $this->feeBoundsArray = $this->getSortedArray($feeBoundCollection);
    }

    /**
     * This function will calculate the Fee based on the loan application
     * by comparing with FeeBounds and interpolating if necessary. Will also round
     *
     * @param LoanApplicationInterface $loanApplication
     * @return float
     */
    public function calculate(LoanApplicationInterface $loanApplication): float
    {

        for ($i = 0; $i < count($this->feeBoundsArray) - 1; $i++) {
            /* if feeBoundsArray item loanAmount and term is equal then no interpolation required */

            if ($this->doesFeeExist($loanApplication, $this->feeBoundsArray[$i])
            ) {
                $fee = $this->feeBoundsArray[$i]->getFee();
                break;
            } elseif ($this->isWithinFeeBoundsAndTermMatch(
                $loanApplication,
                $this->feeBoundsArray[$i],
                $this->feeBoundsArray[$i + 1]
            )
            ) {
                $interpolation = InterpolationFactory::create(
                    $loanApplication,
                    $this->feeBoundsArray[$i],
                    $this->feeBoundsArray[$i + 1]
                );

                $fee = $interpolation->getInterpolatedFee();

                break;
            }
        }

        if (isset($fee) && is_float($fee)) {
            return $this->roundFeeByLoanAmount($fee, $loanApplication->getAmount(), self::ROUND_TO_NEAREST);
        } else {
            throw new Exception(self::NO_FEE_EXCEPTION);
        }
    }
}
