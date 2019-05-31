<?php

namespace djvov\Core;

use djvov\Config;
use djvov\Core\Singleton;

class DB
{
    use Singleton;

    // Database Handle.
    private static $dbh;

    // Statement Handle.
    private static $sth;

    public static function getInstance()
    {
        if (empty(static::$instance)) {
            \djvov\Config::getInstance();
            $dsn = \djvov\Config::$dsn['type']
                . ':host=' . \djvov\Config::$dsn['host']
                . ';dbname=' . \djvov\Config::$dsn['db_name'];

            static::$instance = new static();

            try {
                self::$dbh = new \PDO(
                    $dsn,
                    \djvov\Config::$dsn['user'],
                    \djvov\Config::$dsn['pass'],
                    [
                        \PDO::ATTR_PERSISTENT => true,
                        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    ]);
                self::$dbh->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                Router::notFound($e->getMessage());
            }
        }
        return static::$instance;
    }

    public static function lastInsertId()
    {
        try {
            return self::$dbh->lastInsertId();
        } catch (\PDOException $e) {
            Router::notFound($e->getMessage());
        }
    }

/**
 * bind function.
 * @param array Params to bind.
 * @return array Status done and affected rows count
 */
    public static function bind($bind)
    {
        try {
            foreach ($bind as $b) {
                if (isset($b[2])) {
                    self::$sth->bindValue(':'.$b[0], htmlspecialchars($b[1], ENT_QUOTES,'UTF-8'), $b[2]);
                } else {
                    self::$sth->bindValue(':'.$b[0], htmlspecialchars($b[1], ENT_QUOTES,'UTF-8'));
                }
            }
        } catch (\PDOException $e) {
            Router::notFound($e->getMessage());
        }
    }

/**
 * query function to use with some queries if needs
 * @param str Query string.
 * @param array Params to bind.
 * @return array Rows and rows count
 */
    public static function query($sql, $bind)
    {
        $rows = [];
        $rowsCount = 0;
        try {
            self::$sth = self::$dbh->prepare($sql);
            self::bind($bind);
            self::$sth->execute();
            while ($row = self::$sth->fetch()) {
                $rows[] = $row;
            }
            self::$sth->closeCursor();
            $rowsCount = self::$sth->rowCount();
        } catch (\PDOException $e) {
            Router::notFound($e->getMessage());
        }
        return [$rows, $rowsCount];
    }

/**
 * exec function to execute unprepared or very simple or very difficult select
 * @param str Query string
 * @param array Params to bind
 * @return array Rows and rows count
 */
    public static function exec($sql, $bind = '')
    {
        $rows = [];
        $rowsCount = 0;
        try {
            self::$sth = self::$dbh->prepare($sql);
            if ($bind != '') {
                self::bind($bind);
            }
            self::$sth->execute();
            while ($row = self::$sth->fetch()) {
                $rows[] = $row;
            }
            self::$sth->closeCursor();
            $rowsCount = self::$sth->rowCount();
        } catch (\PDOException $e) {
            Router::notFound($e->getMessage());
        }

        return [$rows, $rowsCount];
    }

/**
 * insert function
 * @param str
 * @param array
 * @param array
 * @return array insertId and sql
 */
    public static function insert($tableName, $fields, $values)
    {
        $set_str = '';
        $insertId = 0;
        $bind = [];

        foreach ($fields as $key => $value) {
            $set_str .= '`' . $value . '` = :' . $value . ', ';
            $bind[] = [$fields[$key], $values[$key]];
        }
        $set_str = substr($set_str, 0, -2);
        $sql = 'INSERT INTO ' . $tableName . ' SET ' . $set_str;

        try {
            self::$sth = self::$dbh->prepare($sql);
            self::bind($bind);
            self::$sth->execute();
            $insertId = self::lastInsertId();
        } catch (\PDOException $e) {
            Router::notFound($e->getMessage());
        }
        return [$insertId, $sql];
    }
}
