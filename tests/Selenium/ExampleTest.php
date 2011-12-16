<?php
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class ExampleTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected $captureScreenshotOnFailure = TRUE;
    protected $screenshotPath = '/var/www/localhost/htdocs/screenshots';
    protected $screenshotUrl = 'http://localhost/screenshots';

    public static $browsers = array(
      array(
        'name'    => 'Firefox',
        'browser' => '*firefox',
        'host'    => 'localhost',
        'port'    => 4444,
        'timeout' => 30000,
      ),
    );

    protected function setUp()
    {
        $this->setBrowser('*firefox'); //remove to use self::$browsers
        $this->setBrowserUrl('http://www.google.com.ua/');
    }

    public function testTitle()
    {
        $this->open('http://www.google.com.ua/');
        $this->assertTitle('Google');
    }

    public function testPhpunit()
    {
        $this->open('http://www.google.com.ua/');
        $this->type('name=q', 'phpunit');
        $this->click('name=btnG');
        sleep(3);
        $this->assertElementContainsText('id=ires', 'PHPUnit');
    }

}