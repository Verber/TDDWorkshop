<?php
require_once 'PHPUnit/Framework.php';

class AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new AllTests('Main Test Suite');
        
        AllTests::loadSuites($suite);

        return $suite;
    }

    private static function loadSuites(&$suite, $root_dir='.')
    {  
        $directory = dir($root_dir);
        while (FALSE !== ($entry = $directory->read())) {
            if (is_dir($entry) AND !preg_match('/^\./', $entry)) {
                AllTests::loadSuites($suite, $root_dir . '/' . $entry);
            } elseif (is_file($root_dir . '/' . $entry) 
              && $entry == 'AllTests.php' 
              && realpath($root_dir . '/' . $entry) != __FILE__) {
                $class_path = str_replace('/', '_', preg_replace('~^\./~', '', $root_dir));
                require_once realpath($root_dir . '/' . $entry);
                $suite->addTestSuite($class_path. '_AllTests');
            }
        }  
       $directory->close(); 
    } 
}