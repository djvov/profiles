<?php

namespace djvov;

use djvov\Core\Singleton;

class Config
{
    use Singleton;

    public static $dsn;
    public static $dir_mvc;
    public static $dir_smarty;
    public static $dir_tpl;
    public static $dir_tpl_relative;

    private static function init()
    {
        self::$dir_mvc = getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'MVC';
        self::$dir_tpl = getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Views';
        self::$dir_smarty = getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Smarty';
        self::$dir_tpl_relative = str_replace($_SERVER['DOCUMENT_ROOT'], '', self::$dir_tpl);
        self::$dsn = [
            'type' => 'mysql',
            'host' => 'a84228.mysql.mchost.ru',
            'db_name' => 'a84228_djvovts3',
            'user' => 'a84228_djvovts3',
            'pass' => 'vbm34trw',
        ];
    }
}
