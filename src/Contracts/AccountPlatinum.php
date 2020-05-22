<?php

namespace CashOut\Contracts;

interface AccountPlatinum extends Account
{
    public function transfer(Account $account, $amount);
}