<?php
class WithBadIsolationTest extends PHPUnit_Framework_TestCase
{   
    private static $db;

    public static function setUpBeforeClass()
    {
        self::$db = sqlite_open('phone_book');
    }

    public static function tearDownAfterClass()
    {
        sqlite_close(self::$db);
    }
    
    function testModelGet()
    {
        $query_res = sqlite_array_query($this->db, "SELECT * FROM phone_book");
        $entry = $query_res[1];
        $this->assertEquals('Bill', $entry['name']);
    }
    
    function testModelAppend()
    {
        sqlite_query($this->db, "INSERT INTO phone_book VALUES('Phill', '123-54-67')");
        $sql_res = sqlite_single_query($this->db, "SELECT COUNT(*) FROM phone_book");
        $this->assertEquals(3, $sql_res);
        $sql_res = sqlite_single_query($this->db, "SELECT phone FROM phone_book WHERE name = 'Phill'");
        $this->assertEquals('123-54-67', $sql_res);
    }
    
    function testModelDelete()
    {
        sqlite_query($this->db, "DELETE FROM phone_book WHERE name = 'Phill'");
        $sql_res = sqlite_single_query($this->db, "SELECT COUNT(*) FROM phone_book");
        $this->assertEquals(2, $sql_res);
        $sql_res = sqlite_single_query($this->db, "SELECT phone FROM phone_book WHERE name = 'Phill'");
        $this->assertEquals(null, $sql_res);
    }
}