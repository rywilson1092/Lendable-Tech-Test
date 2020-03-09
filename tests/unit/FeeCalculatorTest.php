<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundCollectionFactory;
use Lendable\Interview\Interpolation\Factories\LoanApplicationFactory;
use Lendable\Interview\Interpolation\FeeCalculator;

class FeeCalculatorTest extends TestCase
{
    const NO_FEE_EXCEPTION = 'Error no fee found.';

    private FeeCalculator $feeCalculator;

    protected function setUp(): void
    {
        $feeBoundsArray = array();

        array_push($feeBoundsArray , FeeBoundFactory::create( 1000 , 24 , 70));
        array_push($feeBoundsArray , FeeBoundFactory::create( 2000 , 24 , 100));
        array_push($feeBoundsArray , FeeBoundFactory::create( 3000 , 24 , 120));

        $feeBoundCollection = FeeBoundCollectionFactory::create( ...$feeBoundsArray);

        $this->feeCalculator = new FeeCalculator($feeBoundCollection);
    }

    public function testFeeCalculatorTestCanConstruct() : void
    {
        $this->assertInstanceOf('Lendable\Interview\Interpolation\FeeCalculator', $this->feeCalculator );
    }

    public function testFeeCalculatorCanMatchFeeBound() : void
    {
        $loanApplication = LoanApplicationFactory::create(2000 , 24);

        $this->assertEquals(100 , $this->feeCalculator->Calculate( $loanApplication ));
    }

    public function testFeeCalculatorCanGetExampleResult() : void
    {
        $loanApplication = LoanApplicationFactory::create(2750 , 24);

        $this->assertEquals(115 , $this->feeCalculator->Calculate( $loanApplication ));
    }

    public function testFeeCalculatorUsingDecimals() : void
    {
        $loanApplication = LoanApplicationFactory::create(1346.22 , 24);

        $this->assertEquals(83.78 , $this->feeCalculator->Calculate( $loanApplication ));
    }

    public function testFeeCalculatorThrowsExceptionIfNoFee() : void
    {
        $loanApplication = LoanApplicationFactory::create(2750 , 12);

        $this->expectExceptionMessage(self::NO_FEE_EXCEPTION);
        $this->feeCalculator->Calculate( $loanApplication );
    }

}