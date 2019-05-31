<?php

// Update include_path for autoload.
$path = getcwd() . DIRECTORY_SEPARATOR . 'Engine'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Core'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'MVC'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Smarty'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR . 'sysplugins'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR . 'plugins'
    . PATH_SEPARATOR . getcwd() . DIRECTORY_SEPARATOR . 'Engine' . DIRECTORY_SEPARATOR . 'MVC' . DIRECTORY_SEPARATOR . 'Index';

set_include_path(get_include_path() . PATH_SEPARATOR . $path);

spl_autoload_register(function ($class_name) {
    $parts = explode('\\', $class_name);
    $file_name = end($parts);
    require_once $file_name . '.php';
});

djvov\App::getInstance()->run();
