<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Traits\LoanApplicationValidator;

class LoanApplicationValidatorTest extends TestCase
{
    use LoanApplicationValidator;

    const MINIMUM_AMOUNT = 1000;

    const MAXIMUM_AMOUNT = 20000;

    const POSSIBLE_TERMS = array(12,24);

    public function testIsLoanAmountValidWithinBoundsTrue() : void
    {
        $this->assertTrue( $this->IsLoanAmountValid( 2000 , self::MINIMUM_AMOUNT , self::MAXIMUM_AMOUNT ) );
    }

    public function testIsLoanAmountValidLessThanFalse() : void
    {
        $this->assertFalse( $this->IsLoanAmountValid( 500 , self::MINIMUM_AMOUNT , self::MAXIMUM_AMOUNT ) );
    }

    public function testIsLoanAmountValidGreaterThanFalse() : void
    {
        $this->assertFalse($this->IsLoanAmountValid( 50000 , self::MINIMUM_AMOUNT , self::MAXIMUM_AMOUNT ) );
    }

    public function testIsLoanTermValidTrue() : void
    {
        $this->assertTrue($this->IsLoanTermValid( 12 , self::POSSIBLE_TERMS ) );
    }

    public function testIsLoanTermValidFalse() : void
    {
        $this->assertFalse($this->IsLoanTermValid( 36 , self::POSSIBLE_TERMS ));
    }
}