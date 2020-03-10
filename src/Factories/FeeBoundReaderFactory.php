<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeBoundReaderInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderJson;
use Exception;

/**
 * Used for creating FeeBoundReaders depending on stategy
 */
class FeeBoundReaderFactory implements FeeBoundReaderFactoryInterface
{
    /**
     * Error message for type of reader not found
     */
    private const INCORRECT_TYPE_EXCEPTION = 'Type of reader not found';

    /**
     * Will create a FeeBoundReader object in return for filename and type.
     * The type will determine the type of file we will read and which class to use.
     *
     * @param string $filename
     * @param string $type
     * @return FeeBoundReaderInterface
     */
    public static function create(string $filename, string $type): FeeBoundReaderInterface
    {

        if ($type === 'json') {
            return new FeeBoundReaderJson($filename);
        } else {
            throw new Exception(self::INCORRECT_TYPE_EXCEPTION);
        }
    }
}
