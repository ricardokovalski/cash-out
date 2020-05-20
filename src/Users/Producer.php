<?php

namespace CashBalance\Users;

use CashBalance\CashBalance;
use CashBalance\Contracts\User;

class Producer implements User
{
    /**
     * @var CashBalance
     */
    private $cashBalance;

    /**
     * @param CashBalance $cashBalance
     * @return $this
     */
    public function makeCashBalance(CashBalance $cashBalance)
    {
        $this->cashBalance = $cashBalance;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCashBalance()
    {
        return $this->cashBalance;
    }
}