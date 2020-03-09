<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeBoundReaderFactory;
use Lendable\Interview\Interpolation\FeeBoundReaderJson;

class FeeBoundReaderFactoryTest extends TestCase
{
    const INCORRECT_TYPE_EXCEPTION = 'Type of reader not found';
    const JSON_FILE_PATH = 'data/FeeBounds.json';
    const JSON_READER_TYPE = 'json';
    const INCORRECT_TYPE = 'Incorrect Type';

    public function testCanCreateJsonReader() : void
    {
        $feeBoundReaderJson = FeeBoundReaderFactory::create(self::JSON_FILE_PATH , self::JSON_READER_TYPE);
        $this->assertInstanceOf('Lendable\Interview\Interpolation\FeeBoundReaderJson', $feeBoundReaderJson);
    }

    public function testThrowsExceptionForIncorrectType(): void{
        $this->expectExceptionMessage(self::INCORRECT_TYPE_EXCEPTION);
        FeeBoundReaderFactory::create(self::JSON_FILE_PATH , self::INCORRECT_TYPE);
    }
}