<?php
use CashBalance\CashBalance as Cash;

class CashBalanceTest extends \PHPUnit_Framework_TestCase
{
    private $cashBalance;

    public function setUp() {
        $this->cashBalance = new Cash(50.00);
    }

    public function testGiveCredit() {
        $this->cashBalance->giveCredit(150.00);
        $this->assertEquals(200.00, $this->cashBalance->getBalance());
    }

    public function testGiveDebit() {
        $this->cashBalance->giveDebit(150.00);
        $this->assertEquals(-100.00, $this->cashBalance->getBalance());
    }
}