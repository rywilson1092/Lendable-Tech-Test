<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\InterpolationFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Factories\LoanApplicationFactory;
use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Interpolation;

class InterpolationTest extends TestCase
{
    const EXAMPLE_LOAN_AMOUNT = 2750;
    const EXAMPLE_LOAN_TERM = 24;
    const EXAMPLE_EXPECTED_FEE = 115.0;
    
    public function testInterpolationCanConstructWithMocks() : void
    {
        $interpolation = new Interpolation(
            $this->createMock(LoanApplicationInterface::class),
            $this->createMock(FeeBoundInterface::class),
            $this->createMock(FeeBoundInterface::class)
        );

        $this->assertInstanceOf('Lendable\Interview\Interpolation\Interpolation', $interpolation);
    }

    public function testInterpolationIs115() : void
    {
        $loanApplication = LoanApplicationFactory::create(self::EXAMPLE_LOAN_AMOUNT , self::EXAMPLE_LOAN_TERM);

        $lowerFeeBound = FeeBoundFactory::create(2000 , 24 , 100);
        $upperFeeBound = FeeBoundFactory::create(3000 , 24 , 120);

        $interpolation = InterpolationFactory::create($loanApplication, $lowerFeeBound , $upperFeeBound);
        
        $this->assertEquals( self::EXAMPLE_EXPECTED_FEE , $interpolation->getInterpolatedFee());
    }
}