<?php

namespace djvov\Core;

trait Singleton {
    protected static $instance;

    // Protect avoid second instance.
    private function __construct() { }
    private function __clone() { }
    private function __wakeup() { }

    public static function getInstance()
    {
        if (empty(static::$instance)) {
            static::$instance= new static();
            if (method_exists(static::$instance, 'init')) {
                static::$instance->init();
            }
        }
        return static::$instance;
    }
}
