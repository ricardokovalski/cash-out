<?php

namespace CashOut\Users;

use CashOut\Contracts\Account;
use CashOut\Contracts\User;

class Producer implements User
{
    private $accounts = [];

    public function addAccount(Account $account)
    {
        array_push($this->accounts, $account);
        return $this;
    }

    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @param $number
     * @return mixed
     */
    public function getAccount($number)
    {
        $accounts = array_filter($this->getAccounts(), function (Account $account) use ($number) {
            return $account->getNumber() == $number;
        });

        if (! $accounts) {
            throw new \InvalidArgumentException('Account not found.', 404);
        }

        return current($accounts);
    }
}