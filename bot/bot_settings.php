<?php

// How many errors until the script kills itself.
$errorMax = 25000;

// How many iterations with max offers before the script kills itself (shit not selling)
$loopsWithOffersMax = 10000;

// Minimum amount of money to go to before script ends, shouldn't be an issue with money transfer
$minRoublesToReduceTo = 10000;

// how low should a stack of roubles get before it tries to merge?
$roubleStackMinimum = 250000;

// how many iterations until it collects money from the bank?
$collectEveryIteration  = 50;

// How many items should it search per page? It'll go through everyone one, 10 is good
$itemsPerPage = 10;

// sleeping when script dies (in minutes)
$sleepMinuteMin = 1;
$sleepMinuteMax = 5;

// how long until an offer is reported as "stuck" in minutes
$offerStuckDeadline = 30;

// the compared sale, so 3 = the 3rd item up for sale to compare against for Discount % stats
$sellCompareIndex = 3;

// How many times it should attempt to stack money, more = better stacking, but takes longer
$roubleStackLoops = 5;

// max rouble stack before continuing (goes through 30 stacks then stops)
$maxRoubleStacking = 30;

// How many iterations until it prints current offers
$printOfferIterations   = 15;

// Rating --> offer count
$maximumOffers = [
    10 => 4,
    30 => 5,
    50 => 7,
    // dunno rest
];

// maximum amount to buy from a stack
$maxPurchaseAmount = 50;
