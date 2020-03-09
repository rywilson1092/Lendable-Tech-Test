# Lendable Fee Calculator Tech Test

This project is my attempt of completing the Lendable Fee Calculator Test.

## Getting Started

The all of the logic of the system is contained in the /src folder of the project.
The data directory contains the json file for the FeeBounds specified in the requirements of the test.
These get ordered after being read. So this would allow different values to be inserted regardless of where in the file.
The in FeeCalculator.php loops through these to find relevant fee bounds for loan amount and calculates interpolated value.
This is rounded via the requirement of: "The fee should then be "rounded up" such that (fee + loan amount) is an exact multiple of 5."

This is then returned to the client.

### Prerequisites

Docker And Git

### Installing

1. To get started please ensure you have docker installed on your computer.
2. Please go to root directory of project.
3. Run docker-compose build && docker-compose up in the terminal. This will setup everything needed to run the project.
4. Use docker exec -it app php example.php
5. You should see the result of 115 returned.

## Running the tests

To run the unit tests use docker exec -it app vendor/bin/phpunit
To view code coverage open  /build/coverage/index.html in your browser using full path.
Also running example.php will go through the whole flow of getting a fee calculation.

# Continious Integration
I use travis, codesniffer, phpunit and coveralls for builds.
Code must follow both PSR1 and PSR12 standards.
All tests must pass.
Minimum test coverage is 100%
100% unit tested. [![Coverage Status](https://coveralls.io/repos/github/rywilson1092/Lendable-Tech-Test/badge.svg?branch=master)](https://coveralls.io/github/rywilson1092/Lendable-Tech-Test?branch=master)
