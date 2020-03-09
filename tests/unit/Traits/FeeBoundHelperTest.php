<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\LoanApplicationFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Traits\FeeBoundsHelper;

class FeeBoundHelperTest extends TestCase
{
    use FeeBoundsHelper;

    const MATCHING_AMOUNT = 2000;
    const SECOND_FEEBOUND_AMOUNT = 3000;
    const LOWER_AMOUNT = 1234;
    const HIGHER_AMOUNT = 2750;
    const CORRECT_TERM = 24;
    const WRONG_TERM = 10000;
    const VALID_MISSING_TERM = 12;
    const TEST_FEE = 30;

    private FeeBoundInterface $testFeeBound;

    protected function setUp(): void
    {
        $this->testFeeBound1 = FeeBoundFactory::create(2000, self::CORRECT_TERM , self::TEST_FEE);
        $this->testFeeBound2 = FeeBoundFactory::create(3000 , self::CORRECT_TERM , self::TEST_FEE);
    }

    public function testDoesFeeExistMatchingTrue() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::MATCHING_AMOUNT , self::CORRECT_TERM);

        $this->assertTrue($this->DoesFeeExist($loanApplication , $this->testFeeBound1));
    }

    public function testDoesFeeExistValidButMissingTerm() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::MATCHING_AMOUNT , self::VALID_MISSING_TERM);

        $this->assertFalse($this->DoesFeeExist($loanApplication , $this->testFeeBound1));
    }

    public function testDoesFeeExistLowerAmount() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::LOWER_AMOUNT , self::CORRECT_TERM);

        $this->assertFalse($this->DoesFeeExist($loanApplication , $this->testFeeBound1));
    }

    public function testDoesFeeExistHigherAmount() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::HIGHER_AMOUNT , self::CORRECT_TERM);

        $this->assertFalse($this->DoesFeeExist($loanApplication , $this->testFeeBound1));
    }

    public function testIsWithinFeeBoundsAndTermMatchTrue() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::HIGHER_AMOUNT , self::CORRECT_TERM);

        $this->assertTrue($this->IsWithinFeeBoundsAndTermMatch($loanApplication , $this->testFeeBound1 , $this->testFeeBound2));
    }

    public function testIsAboveFeeBoundAndTermMatchFalseAmountLower() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::LOWER_AMOUNT , self::CORRECT_TERM);

        $this->assertFalse($this->IsWithinFeeBoundsAndTermMatch($loanApplication , $this->testFeeBound1 , $this->testFeeBound2));
    }

    public function testIsAboveFeeBoundAndTermMatchFalseAmountMatching() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::MATCHING_AMOUNT , self::CORRECT_TERM);

        $this->assertFalse($this->IsWithinFeeBoundsAndTermMatch($loanApplication , $this->testFeeBound1 , $this->testFeeBound2));
    }

    public function testIsAboveFeeBoundAndTermMatchFalseWrongTerm() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::HIGHER_AMOUNT , self::VALID_MISSING_TERM);

        $this->assertFalse($this->IsWithinFeeBoundsAndTermMatch($loanApplication , $this->testFeeBound1 , $this->testFeeBound2));
    }
}