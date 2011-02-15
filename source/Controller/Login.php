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
    private $_isLoggedIn = FALSE;

    /**
     * Logs user in
     *
     * @param string $login
     * @param string $passowrd
     *
     * @return boolean
     *
     * @assert ('admin', 'password') == TRUE
     * @assert ('admin', 'someword') == FALSE
     * @assert ('user', 'password') == FALSE
     * @assert ('user', 'someword') == FALSE
     */
    public function login($login, $passowrd)
    {
        return (
            $login == $this->_correctLogin
            && $passowrd == $this->_correctPassword
        );
    }
}
