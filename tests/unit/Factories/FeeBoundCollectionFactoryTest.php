<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeBoundCollectionFactory;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

class FeeBoundCollectionFactoryTest extends TestCase
{
    public function testCanCreateFeeBoundCollection() : void
    {
        $feeBoundMockArray = array();
        array_push($feeBoundMockArray , $this->createMock(FeeBoundInterface::class));

        $feeBoundCollection = FeeBoundCollectionFactory::create( ...$feeBoundMockArray);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollection', $feeBoundCollection);
    }
}