<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use CashBalance\Users\Producer;
use CashBalance\CashBalance;

$producer = new Producer();
$producer->makeCashBalance(new CashBalance(100.00));
$producer->getCashBalance()
    ->giveCredit(25.00)
    ->giveDebit(75)
    ->getBalance();

$producer->getCashBalance();

echo "<pre>";
var_dump($producer);

