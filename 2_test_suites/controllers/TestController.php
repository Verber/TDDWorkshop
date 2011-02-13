<?php
require_once 'PHPUnit/Framework.php';

class TestController extends PHPUnit_Framework_TestCase
{
    function testControllerIndex()
    {
        $template = "%fox_color fox jump over %some_obj";
        preg_match_all('/(%[^\s]+)/', $template, $matches);
        $vars = $matches[1];
        $this->assertEquals(array('%fox_color', '%some_obj'), $vars);
        $vals = array('fire', 'internet explorer');
        $page = str_replace($vars, $vals, $template);
        $this->assertEquals('fire fox jump over internet explorer', $page);
    }
}