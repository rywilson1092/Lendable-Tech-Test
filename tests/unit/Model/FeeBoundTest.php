<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Model\FeeBound;

class FeeBoundTest extends TestCase
{
    private FeeBound $feeBound;

    const TEST_LOAN_AMOUNT = 1000.00;
    const TEST_LOAN_TERM = 12;
    const TEST_LOAN_FEE = 50.00;

    protected function setUp() : void
    {
        $this->feeBound = new FeeBound( self::TEST_LOAN_AMOUNT , self::TEST_LOAN_TERM , self::TEST_LOAN_FEE );
    }

    public function testItemCanConstruct() : void
    {
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\FeeBound', $this->feeBound);
    }

    public function testCanGetLoanAmount() : void
    {
        $this->assertEquals( self::TEST_LOAN_AMOUNT , $this->feeBound->getLoanAmount() );
    }

    public function testLoanAmountIsFloat() : void
    {
        $this->assertIsFloat( $this->feeBound->getLoanAmount() );
    }

    public function testCanGetLoanTerm() : void
    {
        $this->assertEquals( self::TEST_LOAN_TERM , $this->feeBound->getLoanTerm() );
    }

    public function testLoanTermIsInt() : void
    {
        $this->assertIsInt( $this->feeBound->getLoanTerm() );
    }

    public function testCanGetLoanFee() : void
    {
        $this->assertEquals( self::TEST_LOAN_FEE , $this->feeBound->getFee() );
    }

    public function testLoanFeeIsFloat() : void
    {
        $this->assertIsFloat( $this->feeBound->getFee() );
    }
}