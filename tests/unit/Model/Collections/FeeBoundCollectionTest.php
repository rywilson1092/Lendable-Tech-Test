<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollection;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;

class FeeBoundCollectionTest extends TestCase
{    
    private FeeBoundCollection $feeBoundCollection;
    private $itemMocksArray = array();
    
    const NUMBER_OF_ITEM_MOCKS = 5;

    const NO_FEEBOUNDS_EXCEPTION = 'No FeeBounds have been passed through.';

    protected function setUp(): void
    {
        for( $i = 0; $i < self::NUMBER_OF_ITEM_MOCKS; $i++ ){
            array_push($this->itemMocksArray , $this->createMock( FeeBoundInterface::class ) );
        }

        $this->feeBoundCollection = new FeeBoundCollection( ...$this->itemMocksArray );
    }

    public function testFeeBoundCollectionCanConstruct() : void
    {
        $this->assertInstanceOf('Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollection', $this->feeBoundCollection);
    }

    public function testCanGetFeeBoundsFromCollection() : void
    {
        $this->assertEquals( $this->itemMocksArray , $this->feeBoundCollection->getFeeBounds());
    }
}