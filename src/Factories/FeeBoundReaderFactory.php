<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\FeeBoundReaderInterface;
use Lendable\Interview\Interpolation\FeeBoundReaderJson;

use exception;

class FeeBoundReaderFactory implements FeeBoundReaderFactoryInterface
{
    /**
     * @return FeeBoundReaderInterface
     */
    public static function create(string $filename , string $type): FeeBoundReaderInterface{

        if($type === 'json'){
            return new FeeBoundReaderJson($filename);            
        }else{
            throw new exception(self::INCORRECT_TYPE_EXCEPTION);
        }

    }
}