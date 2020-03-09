<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;

class FeeBoundFactoryTest extends TestCase
{
    const TEST_AMOUNT = 3000;
    const TEST_TERM = 24;
    const TEST_FEE = 30;

    public function testCanCreateFeeBound() : void
    {
        $feeBound = FeeBoundFactory::create(self::TEST_AMOUNT , self::TEST_TERM , self::TEST_FEE);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\FeeBound', $feeBound);
    }
}