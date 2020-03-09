<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeBoundReaderInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderJson;
use Exception;

class FeeBoundReaderFactory implements FeeBoundReaderFactoryInterface
{
    private const INCORRECT_TYPE_EXCEPTION = 'Type of reader not found';

    /**
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
