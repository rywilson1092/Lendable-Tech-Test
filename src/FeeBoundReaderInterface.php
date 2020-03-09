<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;

interface FeeBoundReaderInterface
{
    public function getFeeBoundCollection(): FeeBoundCollectionInterface;
}
