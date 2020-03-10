<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model\Collections;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Exception;

/**
 * This collection is used to store an array of FeeBounds
 */
final class FeeBoundCollection implements FeeBoundCollectionInterface
{
    /**
     * Array of FeeBoundsInterface
     */
    private array $feeBounds;

    /**
     * Used to construct the object and unpacks array of feebounds.
     * We do this to type hint arrays of $feeBounds
     *
     * @param FeeBoundInterface ...$feeBounds
     */
    public function __construct(FeeBoundInterface ...$feeBounds)
    {
        $this->feeBounds = $feeBounds;
    }

    /**
     * Will return array of FeeBounds
     *
     * @return array
     */
    public function getFeeBounds(): array
    {
        return $this->feeBounds;
    }
}
