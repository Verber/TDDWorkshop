<?php
require_once 'PHPUnit/Framework.php';

class HelloPHPUnit extends PHPUnit_Framework_TestCase
{
    
    function setUp()
    {
        //do initialization
    }
    
    function tearDown()
    {
        //do cleanup
    }
    
    function testFailedTest()
    {
        $this->assertFalse(false, "Hello it's PHPUnit first failed test");
    }

    function testSuccessfullTest()
    { 
        $this->assertTrue(true, "If this test failed, it means something " .
                "wrong with this world, or maybe with PHPUnit :)");
    }
    
    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
    
    /**
     * @dataProvider sumDataProvider
     */
    public function testSum($a, $b, $c)
    {
        $this->assertEquals($c, $a+$b);
    }
    
    public function sumDataProvider()
    {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
            array(1, 2, 3)
        );
    }
}