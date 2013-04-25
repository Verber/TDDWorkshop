<?php
namespace Model;
/**
 * Class for demonstration only
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
class Account
{

    private $_balance;

    public function  __construct($balance)
    {
        if (\is_float($balance) && $balance >= 0) {
            $this->_balance = $balance;
        } else {
            throw new Account\Exception('Balance must be non-negative float');
        }
    }

    public function getBalance()
    {
        return $this->_balance;
    }

    public function deposit($amount)
    {
        if (\is_float($amount) && $amount >= 0) {
            $this->_balance += $amount;
        } else {
            throw new Account\Exception('Deposit must be non-negative float');
        }
    }

    public function pay($amount)
    {
        if (\is_float($amount) && $amount >= 0) {
            if ($this->_balance >= $amount) {
                $this->_balance = $this->_balance - $amount;
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            throw new Account\Exception('Payment must be non-negative float');
        }
    }

}