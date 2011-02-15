<?php
require_once 'PHPUnit/Framework.php';

class Models_AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $backtrace = debug_backtrace();
        $current_suite_name = str_replace('_', ' ', $backtrace[0]['class']);
        $suite = new PHPUnit_Framework_TestSuite($current_suite_name);
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