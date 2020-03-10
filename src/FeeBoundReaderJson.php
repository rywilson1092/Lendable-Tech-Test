<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation;

use Lendable\Interview\Interpolation\Model\Collections\FeeBoundCollectionInterface;
use Lendable\Interview\Interpolation\Factories\FeeBoundCollectionFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Model\FeeBoundInterface;
use Lendable\Interview\Interpolation\Traits\SortFeeBoundsByLoanAmountAndTerm;
use Exception;
use Stdclass;

/**
 * This class is used to read the FeeBounds from json file.
 */
final class FeeBoundReaderJson implements FeeBoundReaderInterface
{
    use SortFeeBoundsByLoanAmountAndTerm;

    private const FILE_NOT_FOUND_MESSAGE = 'The file does not exist';

    /**
     * This holds an array of FeeBound items
     */
    private FeeBoundCollectionInterface $feeBoundCollection;

    /**
     * Once initialised the class will try to read from the json filename provided in input.
     * This will then be stored in feeBoundCollection propery.
     *
     * @param string $filename
     * @throws Exception when file cannot be found based on filename
     */
    public function __construct(string $filename)
    {

        if (!$this->doesFileExist($filename)) {
            throw new Exception(self::FILE_NOT_FOUND_MESSAGE);
        }

        $this->readFile($filename);
    }

    /**
     * Returns the collection holding FeeBounds array,
     *
     * @return FeeBoundCollectionInterface
     */
    public function getFeeBoundCollection(): FeeBoundCollectionInterface
    {
        return $this->feeBoundCollection;
    }

    /**
     * Checks if filename exists
     *
     * @param string $filename
     * @return boolean
     */
    private function doesFileExist(string $filename): bool
    {
        return file_exists($filename);
    }

    /**
     * This function will read from the filename
     * and populate FeeBoundCollection with the FeeBounds found.
     * Will also sort array in ascending order
     *
     * @param string $filename
     * @return void
     */
    private function readFile(string $filename): void
    {

        $fileContents = file_get_contents($filename);
        $decodedContents = json_decode($fileContents);

        $feeBoundArray = array();

        for ($i = 0; $i < count($decodedContents->feeBounds); $i++) {
            array_push($feeBoundArray, $this->createFeeBound($decodedContents->feeBounds[$i]));
        }

        $feeBoundCollection = FeeBoundCollectionFactory::create(...$feeBoundArray);
        $sortedFeeBoundsArray = $this->getSortedArray($feeBoundCollection);

        $this->feeBoundCollection = FeeBoundCollectionFactory::create(...$sortedFeeBoundsArray);
    }

    /**
     * Used for creating FeeBound object from array item retrived from json file.
     *
     * @param stdclass $decodedFeeBound
     * @return FeeBoundInterface
     */
    private function createFeeBound(stdclass $decodedFeeBound): FeeBoundInterface
    {

        return FeeBoundFactory::create($decodedFeeBound->loanAmount, $decodedFeeBound->term, $decodedFeeBound->fee);
    }
}
