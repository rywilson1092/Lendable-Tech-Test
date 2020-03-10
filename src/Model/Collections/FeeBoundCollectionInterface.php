<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model\Collections;

/**
 * This collection is used to store an array of FeeBounds
 */
interface FeeBoundCollectionInterface
{
    /**
     * Will return array of FeeBounds
     *
     * @return array
     */
    public function getFeeBounds(): array;
}
