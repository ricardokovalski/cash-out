<?php

namespace CashOut\Accounts;

use CashOut\Contracts\Account;
use CashOut\Contracts\AccountPlatinum;

class Platinum implements AccountPlatinum
{
    private $balance = 0.00;
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
        return $this;
    }

    public function withdraw($amount)
    {
        $this->balance -= $amount;
        return $this;
    }

    public function transfer(Account $account, $amount)
    {
        $this->withdraw($amount);
        $account->deposit($amount);
        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getNumber()
    {
        return $this->number;
    }
}