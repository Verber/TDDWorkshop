<?php
require_once dirname(__FILE__) . '/../../source/bootstrap.php';
/**
 * This class is example of simplest PHPUnit test case
 *
 * @category Examples
 * @package  Introduction
 * @author   Ivan Mosiev <i.k.mosev@gmail.com>
 */
class PHPUnitIntro_HelloTest extends PHPUnit_Framework_TestCase
{
    /**
     * Example of failed test
     *
     * @return void
     */
    function testFailedTest()
    {
        $this->assertFalse(false, "Hello it's PHPUnit first failed test");
    }

    /**
     * Example of successfull test
     * 
     * @return void
     */
    function testSuccessfullTest()
    { 
        $this->assertTrue(
            true,
            "If this test failed, it means something " .
            "wrong with this world, or maybe with PHPUnit :)"
        );
    }

    /**
     * Example of AAA rule
     *
     * @return void
     */
    function testArrangeActAssertExample()
    {
        //Arrange
        $_POST = array(
            'login'     => 'admin',
            'password'  => 'password'
        );
        $loginController = new Controller_Login();
        //Act
        $result = $loginController->login();
        //Assert
        $this->assertTrue(
            $result,
            "Login controller returned FALSE with correct credentials"
        );
    }
}