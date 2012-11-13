<?php
/**
 * This class is example of mocks and stubs
 *
 * @author   Ivan Mosiev <i.k.mosev@gmail.com>
 */
class WithBadIsolationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PDO $db;
     */
    private static $db;

    public static function setUpBeforeClass()
    {
        self::$db = new PDO('sqlite:' . dirname(__FILE__) . '/phone_book');
    }
    
    function testModelGet()
    {
        $sql = "SELECT * FROM phone_book";
        $query_res = self::$db->query($sql);
        if ($query_res) {
            $users = $query_res->fetchAll();
        }
        $entry = $users[0];
        $this->assertEquals('Bill', $entry['name']);
    }
    
    function testModelAppend()
    {
        self::$db->exec(
            "INSERT INTO phone_book VALUES('Phill', '123-54-67')"
        );
        $sql = "SELECT COUNT(*) FROM phone_book";
        $sql_res = self::$db->query($sql);
        $this->assertEquals(3, $sql_res->fetchColumn());
        $sql = "SELECT phone FROM phone_book WHERE name = 'Phill'";
        $sql_res = self::$db->query($sql);
        $this->assertEquals('123-54-67', $sql_res->fetchColumn());
    }
    
    function testModelDelete()
    {
        self::$db->exec(
            "DELETE FROM phone_book WHERE name = 'Phill'"
        );
        $sql = "SELECT COUNT(*) FROM phone_book";
        $sql_res = self::$db->query($sql);
        $this->assertEquals(2, $sql_res->fetchColumn());
        $sql = "SELECT phone FROM phone_book WHERE name = 'Phill'";
        $sql_res = self::$db->query($sql);
        $this->assertEquals(array(), $sql_res->fetchAll());
    }
}