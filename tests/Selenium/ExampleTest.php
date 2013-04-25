<?php

class ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.google.com.ua/');
    }

    public function testTitle()
    {
        $this->url('http://www.google.com.ua/');
        $this->assertEquals('Google', $this->title());
    }

    public function testPhpunit()
    {
        $this->timeouts()->implicitWait(10000);
        $this->url('http://www.google.com.ua/');
        $this->byName('q')->value('phpunit');
        $this->assertContains('PHPUnit', $this->byId('ires')->text());
    }

}