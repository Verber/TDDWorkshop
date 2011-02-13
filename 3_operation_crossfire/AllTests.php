<?php
require_once 'PHPUnit/Framework.php';

class AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Contract Test Suite');
        $current_dir = dirname(__FILE__);
        $directory = dir($current_dir);
        while (FALSE !== ($entry = $directory->read())) {
            if (is_file($current_dir . '/' . $entry) AND preg_match('~^(Test.*)\.php~', $entry, $matches)){
                $suite->addTestFile($current_dir . '/' . $entry);
            } 
        }
        $directory->close();
        return $suite;
    }
}