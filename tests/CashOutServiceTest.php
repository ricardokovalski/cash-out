<?php
use CashOut\CashOutService;

class CashOutServiceTest extends \PHPUnit_Framework_TestCase
{
    private $cashOutService;
    private $accountGold;
    private $accountPlatinum;

    public function setUp() {
        $this->cashOutService = new CashOutService();
        $this->accountGold = new CashOut\Accounts\Gold('000012');
        $this->accountPlatinum = new CashOut\Accounts\Platinum('000013');
    }

    public function testGiveCredit() {
        $this->cashOutService->giveCredit($this->accountGold, 150.00);
        $this->assertEquals(150.00, $this->accountGold->getBalance());
    }

    public function testGiveDebit() {
        $this->cashOutService->giveDebit($this->accountGold, 50.00);
        $this->assertEquals(-50.00, $this->accountGold->getBalance());
    }

    public function testTransferBetweenAccounts()
    {
        $this->cashOutService->giveCredit($this->accountPlatinum, 500.00);
        $this->cashOutService->transferBetweenAccounts($this->accountPlatinum, $this->accountGold, 150.00);
        $this->assertEquals(350.00, $this->accountPlatinum->getBalance());
        $this->assertEquals(150.00, $this->accountGold->getBalance());
    }
}