<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

/**
 * Used as a contract for creating a FeeBoundCollectionFactory
 */
interface FeeBoundCollectionFactoryInterface
{
    
    /**
     * Contract that stipulates FeeBoundCollectionInterface must be created in return for array of FeeBounds
     *
     * @param FeeBoundInterface ...$feeBounds
     * @return FeeBoundCollectionInterface
     */
    public static function create(FeeBoundInterface ...$feeBounds): FeeBoundCollectionInterface;
}
