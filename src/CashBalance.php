<?php

namespace CashOut;

class CashOutService
{
    private $credit = 0.00;
    private $debit = 0.00;
    private $balance;

    /**
     * CashOut constructor.
     * @param float $amount
     */
    public function __construct($amount = 0.00)
    {
        $this->balance = $amount;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function giveCredit($amount)
    {
        $this->credit += $amount;
        return $this;
    }

    /**
     * @param $amount
     * @return $this
     */
    public function giveDebit($amount)
    {
        $this->debit += $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance + $this->credit - $this->debit;
    }
}
