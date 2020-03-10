<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

/**
 * Classes implementing this will be used to read the FeeBounds
 */
interface FeeBoundReaderInterface
{

    /**
     * This method stiputlates that the class needs
     * to be able to return a FeeBoundCollection obj.
     *
     * @return FeeBoundCollectionInterface
     */
    public function getFeeBoundCollection(): FeeBoundCollectionInterface;
}
