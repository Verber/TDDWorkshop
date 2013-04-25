<?php
class ExampleTest extends PHPUnit_Extensions_Selenium_TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.google.com.ua/');
    }

    public function testTitle()
    {
        $this->open('/');
        $this->assertTitle('Google');
    }

    public function testPhpunit()
    {
        $this->open('/');
        $this->type('name=q', 'phpunit');
        $this->click('name=btnG');
        sleep(3);
        $this->assertElementContainsText('id=ires', 'PHPUnit');
    }

}