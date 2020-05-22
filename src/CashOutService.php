<?php

namespace CashOut;

use CashOut\Contracts\Account;

class CashOutService
{
    public function transferBetweenAccounts(Account $sourceAccount, Account $destinationAccount, $amount)
    {
        if ($sourceAccount->getBalance() < $amount) {
            throw new \Exception('Insufficient balance in your account.', 404);
        }

        $sourceAccount->withdraw($amount);
        $destinationAccount->deposit($amount);
        return $this;
    }

    public function giveCredit(Account $destinationAccount, $amount)
    {
        $destinationAccount->deposit($amount);
        return $this;
    }

    public function giveDebit(Account $destinationAccount, $amount)
    {
        $destinationAccount->withdraw($amount);
        return $this;
    }
}
