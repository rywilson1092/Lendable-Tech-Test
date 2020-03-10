<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Lendable\Interview\Interpolation\Factories\FeeBoundFactory;
use Lendable\Interview\Interpolation\Factories\FeeBoundCollectionFactory;

use Lendable\Interview\Interpolation\Traits\SortFeeBoundsByLoanAmountAndTerm;

class SortFeeBoundsByLoanAmountAndTermTest extends TestCase
{
    use SortFeeBoundsByLoanAmountAndTerm;

    public function testSortFeeBoundsByLoanAmountEqual() : void
    {
        $feeBound1 = FeeBoundFactory::create( 1000, 24, 30);
        $feeBound2 = FeeBoundFactory::create( 1000, 24, 30);

        $this->assertEquals( 0 , $this->sortFeeBoundsByLoanAmountAndTerm($feeBound1, $feeBound2) );
    }

    public function testSortFeeBoundsByLoanAmountHigher() : void
    {
        $feeBound1 = FeeBoundFactory::create( 2000, 24, 30);
        $feeBound2 = FeeBoundFactory::create( 1000, 24, 30);

        $this->assertEquals( 1 , $this->sortFeeBoundsByLoanAmountAndTerm($feeBound1, $feeBound2) );
    }

    public function testSortFeeBoundsByLoanTermHigher() : void
    {
        $feeBound1 = FeeBoundFactory::create( 2000, 24, 30);
        $feeBound2 = FeeBoundFactory::create( 2000, 12, 30);

        $this->assertEquals( 1 , $this->sortFeeBoundsByLoanAmountAndTerm($feeBound1, $feeBound2) );
    }

    public function testSortFeeBoundsByLoanAmountLower() : void
    {
        $feeBound1 = FeeBoundFactory::create( 1000, 24, 30);
        $feeBound2 = FeeBoundFactory::create( 2000, 24, 30);

        $this->assertEquals( -1 , $this->sortFeeBoundsByLoanAmountAndTerm($feeBound1, $feeBound2) );
    }

    public function testGetSortedArray() : void {

        $feeBoundsArray = array();

        array_push($feeBoundsArray, FeeBoundFactory::create( 4000, 24, 30));
        array_push($feeBoundsArray, FeeBoundFactory::create( 2000, 24, 30));
        array_push($feeBoundsArray, FeeBoundFactory::create( 3000, 24, 30));

        $feeBoundCollection = FeeBoundCollectionFactory::create( ...$feeBoundsArray);

        $sortedArray = $this->getSortedArray($feeBoundCollection);
        /* we will now assert the order has been made ascending i.e 2000, 3000, 4000 for loan amount */

        $this->assertEquals($sortedArray[0] , $feeBoundsArray[1]);
        $this->assertEquals($sortedArray[1] , $feeBoundsArray[2]);
        $this->assertEquals($sortedArray[2] , $feeBoundsArray[0]);

    }
}