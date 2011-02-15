<?php
require_once 'PHPUnit/Framework.php';

class TestModel extends PHPUnit_Framework_TestCase
{
    private $phone_book;
    
    function setUp()
    {
        $this->phone_book = new ArrayObject;
        $this->phone_book->append(array('name' => 'John', 'phone' => '123-45-67'));
        $this->phone_book->append(array('name' => 'Bill', 'phone' => '890-12-34'));
    }
    
    function tearDown()
    {
        unset($this->phone_book);
    }
    
    function testModelGet()
    {
        $entry = $this->phone_book->offsetGet(1);
        $this->assertEquals('Bill', $entry['name']);
    }
    
    function testModelAppend()
    {
        $this->assertEquals(2, $this->phone_book->count());
        $this->phone_book->append(array('name' => 'Phill', 'phone' => '123-54-67'));
        $this->assertEquals(3, $this->phone_book->count());
        $new_entry = $this->phone_book->offsetGet(2);
        $this->assertEquals('Phill', $new_entry['name']);
    }
    
    function testModelDelete()
    {
        $this->assertEquals(2, $this->phone_book->count());
        $this->phone_book->offsetUnset(0);
        $this->assertEquals(1, $this->phone_book->count());
        $entry = $this->phone_book->offsetGet(1);
        $this->assertEquals('Bill', $entry['name']);
    }
}