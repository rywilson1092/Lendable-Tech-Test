<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeCalculatorFactory;
use Lendable\Interview\Interpolation\FeeBoundReaderInterface;

class FeeCalculatorFactoryTest extends TestCase
{
    private $feeBoundReader;

    protected function setUp() : void
    {
        $this->feeBoundReader = $this->createMock(FeeBoundReaderInterface::class);
    }

    public function testCanCreateFeeCalculator() : void
    {
        $feeCalculator = FeeCalculatorFactory::create($this->feeBoundReader);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\FeeCalculator', $feeCalculator);
    }
}