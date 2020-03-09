<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeBoundReaderInterface;

interface FeeBoundReaderFactoryInterface
{
    const INCORRECT_TYPE_EXCEPTION = 'Type of reader not found';
    /**
     * @return FeeBoundReaderInterface
     */
    public static function create(string $filename, string $type): FeeBoundReaderInterface;
}