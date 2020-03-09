<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\InterpolationFactory;

use Lendable\Interview\Interpolation\Model\LoanApplicationInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

class InterpolationFactoryTest extends TestCase
{
    private LoanApplicationInterface $loanApplicationMock;
    private FeeBoundInterface $lowerBoundMock; 
    private FeeBoundInterface $upperBoundMock;

    protected function setUp() : void
    {
        $this->loanApplicationMock = $this->createMock(LoanApplicationInterface::class);
        $this->lowerBoundMock = $this->createMock(FeeBoundInterface::class);
        $this->upperBoundMock = $this->createMock(FeeBoundInterface::class);
    }

    public function testCanCreateInterpolation() : void
    {
        $interpolation = InterpolationFactory::create($this->loanApplicationMock , $this->lowerBoundMock, $this->upperBoundMock);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Interpolation', $interpolation);
    }
}