<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Lendable\Interview\Interpolation\Model\LoanApplication;

use Lendable\Interview\Interpolation\Factories\FeeBoundReaderFactory;
use Lendable\Interview\Interpolation\Factories\FeeCalculatorFactory;
use Lendable\Interview\Interpolation\Factories\LoanApplicationFactory;

$feeBoundReaderJson = FeeBoundReaderFactory::create('data/FeeBounds.json' , 'json');

$feeCalculator = FeeCalculatorFactory::create($feeBoundReaderJson);

$loanApplication = LoanApplicationFactory::create(2750 , 24);
$fee = $feeCalculator->calculate($loanApplication);

echo $fee;