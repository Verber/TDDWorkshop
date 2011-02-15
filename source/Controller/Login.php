<?php
/**
 * This is very simple controller
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
class Controller_Login
{

    private $_correctLogin = 'admin';
    private $_correctPassword = 'password';

    public function login()
    {
        return (
            $_POST['login'] == $this->_correctLogin
            && $_POST['password'] == $this->_correctPassword
        );
    }
}
