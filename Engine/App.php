<?php

namespace djvov;

use djvov\Core\Singleton;
use djvov\Core\Router;

class App
{
    use Singleton;

    public static $router;
    public static $model;
    public static $controller;
    public static $view;

    public static function run()
    {
        self::$router = Router::getInstance()->run();
    }
}
