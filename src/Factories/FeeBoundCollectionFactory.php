<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollection;

/**
 * Used for creatng objects that implement FeeBoundsCollectionInterface
 */
class FeeBoundCollectionFactory implements FeeBoundCollectionFactoryInterface
{
    /**
     * This will create a FeeBoundsCollectionInterface object based on FeeBoundsInterfaceArray.
     * Please note argument unpacking is used here as a method of type hinting the array
     *
     * @param FeeBoundInterface ...$feeBounds
     * @return FeeBoundCollectionInterface
     */
    public static function create(FeeBoundInterface ...$feeBounds): FeeBoundCollectionInterface
    {
        return new FeeBoundCollection(...$feeBounds);
    }
}
