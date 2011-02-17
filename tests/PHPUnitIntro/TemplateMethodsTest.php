<?php
/**
 * This class is test-case where all PHPUnit template methods are demonstrated
 * 
 * @author   Sebastian Bergmann, Ivan Mosiev <i.k.mosev@gmail.com>
 */
class PHPUnitIntro_TemplateMethodsTest  extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        print __METHOD__ . "\n";
        print "Common Arrange of environment that not changes\n";
    }

    protected function setUp()
    {
        print __METHOD__ . "\n";
        print "Common Arrange of environment that we have to reset evry time\n";
    }

    protected function assertPreConditions()
    {
        print __METHOD__ . "\n";
        print "Common assertions we do before every test\n";
    }

    public function testOne()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(TRUE);
    }

    public function testTwo()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(FALSE);
    }

    protected function assertPostConditions()
    {
        print __METHOD__ . "\n";
        print "Common assertions we do after every test\n";
    }

    protected function tearDown()
    {
        print __METHOD__ . "\n";
        print "Common clean up actions we do after every test\n";
    }

    public static function tearDownAfterClass()
    {
        print __METHOD__ . "\n";
        print "Common clean up actions we do after all tests\n";
    }

    protected function onNotSuccessfulTest(Exception $e)
    {
        print __METHOD__ . "\n";
        print "Something we need to do when test fail\n";
        throw $e;
    }
}
