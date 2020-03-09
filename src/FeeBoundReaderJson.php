<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;
use Lendable\Interview\Interpolation\Factories\FeeBoundCollectionFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Exception;
use stdclass;

final class FeeBoundReaderJson implements FeeBoundReaderInterface
{
    private const FILE_NOT_FOUND_MESSAGE = 'The file does not exist';
    
    private $feeBoundCollection;

    public function __construct(string $filename)
    {

        if (!$this->doesFileExist($filename)) {
            throw new Exception(self::FILE_NOT_FOUND_MESSAGE);
        }

        $this->readFile($filename);
    }

    public function getFeeBoundCollection(): FeeBoundCollectionInterface
    {
        return $this->feeBoundCollection;
    }

    private function doesFileExist(string $filename): bool
    {
        return file_exists($filename);
    }

    private function readFile($filename): void
    {

        $fileContents = file_get_contents($filename);
        $decodedContents = json_decode($fileContents);

        $feeBoundArray = array();

        for ($i = 0; $i < count($decodedContents->feeBounds); $i++) {
            array_push($feeBoundArray, $this->createFeeBound($decodedContents->feeBounds[$i]));
        }

        $this->feeBoundCollection = FeeBoundCollectionFactory::create(...$feeBoundArray);
    }

    private function createFeeBound(stdclass $decodedFeeBound): FeeBoundInterface
    {

        return FeeBoundFactory::create($decodedFeeBound->loanAmount, $decodedFeeBound->term, $decodedFeeBound->fee);
    }
}
