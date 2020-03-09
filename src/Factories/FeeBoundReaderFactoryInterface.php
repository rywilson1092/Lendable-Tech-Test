<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeBoundReaderInterface;

/**
 * Used for creating FeeBoundReaders depending on stategy
 */
interface FeeBoundReaderFactoryInterface
{
    
    /**
     * Will create a FeeBoundReader object in return for filename and type.
     * The type will determine the type of file we will read and which class to use.
     *
     * @param string $filename
     * @param string $type
     * @return FeeBoundReaderInterface
     */
    public static function create(string $filename, string $type): FeeBoundReaderInterface;
}
