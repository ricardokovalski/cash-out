<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use CashOut\Users\Producer;
use CashOut\Accounts\Gold;
use CashOut\Accounts\Platinum;
use CashOut\CashOutService;

$producer = new Producer();
$producer->addAccount(new Gold('12346'))
    ->addAccount(new Gold('47895'))
    ->addAccount(new Platinum('99900'));

$accountGoldOne = $producer->getAccount('12346');
$accountGoldOne->deposit(150.00);

echo "<pre>";
var_dump($accountGoldOne);

$accountGoldTwo = $producer->getAccount('47895');

$accountPlatinum = $producer->getAccount('99900');
$accountPlatinum->deposit(500.00)->transfer($accountGoldTwo, 100.00)->transfer($accountGoldOne, 50.00);

echo "<pre>";
var_dump($accountPlatinum);

echo "<pre>";
var_dump($accountGoldTwo);

$cashOutService = new CashOutService();
$cashOutService->transferBetweenAccounts($accountPlatinum, $accountGoldOne, 270.00);

echo "<pre>";
var_dump($accountGoldOne);

echo "<pre>";
var_dump($accountPlatinum);

