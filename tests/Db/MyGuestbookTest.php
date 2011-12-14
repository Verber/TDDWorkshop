<?php
require_once "PHPUnit/Extensions/Database/TestCase.php";

class MyGuestbookTest extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tdd_dbunit',
            'root',
            'qazwsxedc');
        return $this->createDefaultDBConnection($pdo, 'tdd_dbunit');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {

        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }

    public function testRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'), "Pre-Condition");
    }

    public function testNewRecord_assertCount()
    {
        $guestbook = new \Model\MyGuestbook();
        $guestbook->addEntry("suzy", "Hello world!");

        $this->assertEquals(3, $this->getConnection()->getRowCount('guestbook'), "Inserting failed");
    }

    public function testNewRecord_assert_set()
    {
        $guestbook = new \Model\MyGuestbook();
        $guestbook->addEntry("suzy", "Hello world!");

        $queryTable = $this->getConnection()->createQueryTable(
                    'guestbook', 'SELECT id, content, user FROM guestbook WHERE user = \'suzy\''
                );
        $expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/_files/guestbook-suzy.xml')
                              ->getTable("guestbook");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}