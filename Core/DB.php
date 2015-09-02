<?php

namespace Core;

use \PDO;

require_once __DIR__ . '/../Config/conf_db.php';

class DB
{
    public static $instance;

    private $dbh;

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    private function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=' . DB_DATABASE . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);
    }

    public function query($sql, $class = 'stdClass', $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($params);
    }

    public function rawQuery($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}