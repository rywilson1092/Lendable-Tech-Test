<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Traits\LoanFeeRounder;

class LoanFeeRounderTest extends TestCase
{
    use LoanFeeRounder;

    public function testLoanAmountAndFeeRoundsTo5Correctly() : void
    {
        $roundedFee = $this->roundFeeByLoanAmount( 32 , 2391 , 5);
        $this->assertEquals( 34 , $this->roundFeeByLoanAmount( 32 , 2391 , 5) );
    }
}