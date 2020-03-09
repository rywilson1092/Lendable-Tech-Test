<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\FeeBoundReaderJson;

class FeeBoundReaderJsonTest extends TestCase
{
    private $feeBoundReaderJson;

    const CORRECT_PATH = 'data/FeeBounds.json';

    const INCORRECT_PATH =  'incorrect path';

    const EXPECTED_INCORRECT_PATH_MESSAGE = 'The file does not exist';

    const EXPECTED_NUMBER_OF_FEEBOUNDS = 40;

    protected function setUp(): void
    {
        $this->feeBoundReaderJson = new FeeBoundReaderJson( self::CORRECT_PATH );
    }

    public function testFeeBoundReaderJsonCanConstruct() : void
    {
        $this->assertInstanceOf('Lendable\Interview\Interpolation\FeeBoundReaderJson', $this->feeBoundReaderJson);
    }

    public function testCanGetFeeBoundCollection() : void
    {
        $feeBoundCollection = $this->feeBoundReaderJson->getFeeBoundCollection();

        $this->assertInstanceOf( 'Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollection' , $feeBoundCollection );
        $this->assertEquals( self::EXPECTED_NUMBER_OF_FEEBOUNDS , count($feeBoundCollection->getFeeBounds() ) );
    }

    public function testThrowsExceptionIncorrectPath() : void
    {
        $this->expectExceptionMessage(self::EXPECTED_INCORRECT_PATH_MESSAGE);

        $this->feeBoundReaderJson = new FeeBoundReaderJson( self::INCORRECT_PATH );
    }
}