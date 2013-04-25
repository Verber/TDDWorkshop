<?php
namespace TDDWorkshop\Controller;

/**
 * This is very simple controller
 *
 * @author Ivan Mosiev <i.k.mosev@gmail.com>
 */
class Login
{

    private $_correctLogin = 'admin';
    private $_correctPassword = 'password';
    private $_isLoggedIn = FALSE;

    /**
     * Logs user in
     *
     * @param string $login
     * @param string $passowrd
     *
     * @return boolean
     */
    public function checkLogin($login, $passowrd)
    {
        return (
            $login == $this->_correctLogin
            && $passowrd == $this->_correctPassword
        );
    }
}
