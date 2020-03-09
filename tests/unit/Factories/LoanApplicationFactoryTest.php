<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\LoanApplicationFactory;

class LoanApplicationFactoryTest extends TestCase
{
    const TEST_AMOUNT = 3000;
    const TEST_TERM = 24;

    public function testCanCreateLoanApplication() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::TEST_AMOUNT , self::TEST_TERM);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\LoanApplication', $loanApplication);
    }
}