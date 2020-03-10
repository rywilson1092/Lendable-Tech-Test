<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Model\LoanApplication;

class LoanApplicationTest extends TestCase
{
    private $loanApplication;

    const TEST_LOAN_AMOUNT = 1000;
    const TEST_LOAN_AMOUNT_DECIMALS = 1250.23;
    const TEST_LOAN_TERM = 12;

    const MINIMUM_AMOUNT = 1000;
    const MAXIMUM_AMOUNT = 20000;

    const POSSIBLE_TERMS = array(12,24);

    protected function setUp() : void
    {
        $this->loanApplication = new LoanApplication( self::TEST_LOAN_AMOUNT , self::TEST_LOAN_TERM  );
    }

    public function testLoanApplicationCanConstruct() : void
    {
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\LoanApplication', $this->loanApplication);
    }

    public function testCanGetAmount() : void
    {
        $this->assertEquals( self::TEST_LOAN_AMOUNT , $this->loanApplication->getAmount() );
    }

    public function testCanGetAmountDecimalPlaces() : void
    {
        $loanApplicationDecimalPlaces = new LoanApplication( self::TEST_LOAN_AMOUNT_DECIMALS , self::TEST_LOAN_TERM  );
        $this->assertEquals( self::TEST_LOAN_AMOUNT_DECIMALS , $loanApplicationDecimalPlaces->getAmount() );
    }

    public function testAmountIsFloat() : void
    {
        $this->assertIsFloat( $this->loanApplication->getAmount() );
    }

    public function testCanGetTerm() : void
    {
        $this->assertEquals( self::TEST_LOAN_TERM , $this->loanApplication->getTerm() );
    }

    public function testTermIsInt() : void
    {
        $this->assertIsInt( $this->loanApplication->getTerm() );
    }

    public function testExceptionForInvalidAmount() : void
    {
        $this->expectExceptionMessage('Loan Amount must be between ' . self::MINIMUM_AMOUNT . ' and ' . self::MAXIMUM_AMOUNT . '.' );

        new LoanApplication( 1000000 , self::TEST_LOAN_TERM  );
    }

    public function testExceptionInvalidTerm() : void
    {
        $this->expectExceptionMessage('Loan term is not valid. Valid Terms are: ' . implode(',' , self::POSSIBLE_TERMS) . ' in months.');

        new LoanApplication( self::TEST_LOAN_AMOUNT , 36 );
    }
}