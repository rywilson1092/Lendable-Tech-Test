<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Factories;

use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

interface FeeBoundCollectionFactoryInterface
{
    /**
     * @return FeeBoundCollectionInterface
     */
    public static function create(FeeBoundInterface ...$feeBounds): FeeBoundCollectionInterface;
}
