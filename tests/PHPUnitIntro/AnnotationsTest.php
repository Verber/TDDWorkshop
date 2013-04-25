<?php
/**
 * This class is example of PHPUnit annotations
 *
 * @author   Ivan Mosiev <i.k.mosev@gmail.com>
 */
class PHPUnitIntro_AnnotationsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group account
     * @group exceptions
     * @expectedException TDDWorkshop\Model\Account\Exception
     */
    public function testConstructorException()
    {
        $account = new TDDWorkshop\Model\Account('some shit');
    }

    public function testConstructorZero()
    {
        $account = new TDDWorkshop\Model\Account(0.0);
        $this->assertSame(0.0, $account->getBalance());
    }

    public function testGetBalance()
    {
        $account = new TDDWorkshop\Model\Account(123.32);
        $this->assertEquals(123.32, $account->getBalance());
    }

    /**
     * @depends testGetBalance
     */
    public function testDeposit()
    {
        $initial_balance = 123.32;
        $deposit = 21.13;
        $account = new TDDWorkshop\Model\Account($initial_balance);
        $account->deposit($deposit);
        $this->assertEquals($deposit + $initial_balance, $account->getBalance());
        return array($account, $account->getBalance());
    }

    /**
     *
     * @depends testDeposit
     */
    public function testPayDependent($params) {
        //echo $params[1];
        $params[0]->pay(23.32);
        $this->assertSame(121.13, $params[0]->getBalance());
    }

    /**
     * @group exceptions
     * @expectedException TDDWorkshop\Model\Account\Exception
     */
    public function testDepositExceptionNegative()
    {
        $deposit = -5;
        $account = new TDDWorkshop\Model\Account(0.0);
        $account->deposit($deposit);
    }

    /**
     * @group exceptions
     * @expectedException TDDWorkshop\Model\Account\Exception
     */
    public function testDepositExceptionNotFloat()
    {
        $deposit = 'something';
        $account = new TDDWorkshop\Model\Account(0.0);
        $account->deposit($deposit);
    }

    /**
     * @group issue-101
     * @group exceptions
     * @expectedException TDDWorkshop\Model\Account\Exception
     */
    public function testPayExceptionNotFloat()
    {
        $account = new TDDWorkshop\Model\Account(0);
        $account->pay('$pay_amount');

    }

    /**
     * @group issue-122
     * @group exceptions
     * @expectedException TDDWorkshop\Model\Account\Exception
     */
    public function testPayExceptionNegative()
    {
        $account = new TDDWorkshop\Model\Account(0);
        $account->pay(-12.11);
    }

    /**
     * @depends testGetBalance
     * @dataProvider providerTestPay
     */
    public function testPay($initial_balance, $pay_amount, $result, $rest)
    {
        $account = new TDDWorkshop\Model\Account($initial_balance);
        $this->assertSame($result, $account->pay($pay_amount));
        $this->assertEquals($rest, $account->getBalance());

    }

    public function providerTestPay()
    {
        return array(
            array(123.23, 122.0, TRUE, 123.23 - 122.0),
            array(0.0, 1.75, FALSE, 0.0),
            array(0.0, 0.0, TRUE, 0.0),
            array(213.21, 0.0, TRUE, 213.21),
            array(132.21, 150.75, FALSE, 132.21),
            array(534.12, 534.12, TRUE, 0.0)
        );
    }
}
