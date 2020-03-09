<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model\Collections;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Exception;

final class FeeBoundCollection implements FeeBoundCollectionInterface
{
    private array $feeBounds;

    public function __construct(FeeBoundInterface ...$feeBounds)
    {
        $this->feeBounds = $feeBounds;
    }

    public function getFeeBounds(): array
    {
        return $this->feeBounds;
    }
}
