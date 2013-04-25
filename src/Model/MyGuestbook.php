<?php
namespace Model;
/**
 * Created by JetBrains PhpStorm.
 * User: verber
 * Date: 15.12.11
 * Time: 0:50
 * To change this template use File | Settings | File Templates.
 */
class MyGuestbook
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:host=localhost;dbname=tdd_dbunit',
                    'root',
                    'qazwsxedc',
                    array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function addEntry($user, $content)
    {
        $sth = $this->connection->prepare('INSERT INTO guestbook (`content`, `user`, `created`)
            VALUES (:content, :user, NOW())');
        $sth->bindValue(':user', $user, \PDO::PARAM_STR);
        $sth->bindValue(':content', $content, \PDO::PARAM_STR);
        $sth->execute();
    }

}
