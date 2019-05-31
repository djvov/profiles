<?php

namespace djvov\Core;

use djvov\Config;

/**
 * Route class for parse url.
 * Took controllers and models class;
 * create controllers instance and run controllers action.
 */

class Router
{
    use Singleton;

    private static $path_arr = [];
    private static $path = '';

    public static $module_name = 'Index';
    public static $action_name = 'Index';

    public static $query;

    public static function run()
    {
        ob_start();

        \djvov\Config::getInstance();

        self::$path = $_SERVER['REQUEST_URI'];

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        $path_arr = explode(DIRECTORY_SEPARATOR, $uri);
        foreach ($path_arr as $key => $value) {
            if ($value == '') {
                unset($path_arr[$key]);
            }
        }
        self::$path_arr = $path_arr;

        // get/post params.
        foreach($_REQUEST as $k => $v) {
            self::$query[$k] = $v;
            unset($_REQUEST[$k]);
        }
        foreach($_GET as $k => $v) {
            unset($_GET[$k]);
        }
        foreach($_POST as $k => $v) {
            unset($_POST[$k]);
        }

        // Get controller name.
        if (!empty(self::$path_arr[1])) {
            self::$module_name = ucfirst(preg_replace('/[^\w\d]/', '', self::$path_arr[1]));
        }

        // Get action name.
        if (!empty(self::$path_arr[2])) {
            $cnt = count(self::$path_arr);
            $action_name = '';
            for ($i = 2; $i <= $cnt; $i++) {
                if (self::$path_arr[$i] != '') {
                    $action_name .= ucfirst(self::$path_arr[$i]);
                }
            }
            self::$action_name = preg_replace('/[^\w\d-]/', '', $action_name);
        }

        $module_name_ = ucfirst(strtolower(self::$module_name));

        // Get model.
        $model_path = \djvov\Config::$dir_mvc . DIRECTORY_SEPARATOR . self::$module_name . DIRECTORY_SEPARATOR
            . 'Model' . $module_name_ . '.php';

        if (file_exists($model_path)) {
            require_once $model_path;
            $model_name = 'Model' . $module_name_;
            \djvov\App::$model = $model_name::getInstance();
        }

        // Get controller.
        $controller_path = \djvov\Config::$dir_mvc . DIRECTORY_SEPARATOR . self::$module_name . DIRECTORY_SEPARATOR
            . 'Controller' . $module_name_ . '.php';

        $controller_name = '';

        if (file_exists($controller_path)) {
            require_once $controller_path;
            $controller_name = 'Controller' . $module_name_;
            \djvov\App::$controller = $controller_name::getInstance();
            $action = 'action' . self::$action_name;
        } else {
            Router::notFound('no controller  ' . $controller_path);
        }

        // Get View.
        $view_path = \djvov\Config::$dir_mvc . DIRECTORY_SEPARATOR . self::$module_name . DIRECTORY_SEPARATOR
            . 'View' . $module_name_ . '.php';

        $view_name = '';
        if (file_exists($view_path)) {
            require_once $view_path;
            $view_name = 'View' . $module_name_;
            \djvov\App::$view = $view_name::getInstance();
        } else {
            Router::notFound('no view ' . $view_path);
        }

        // Run the  controller.
        if (method_exists(\djvov\App::$controller, $action)) {
            \djvov\App::$controller->$action();
        } else {
            Router::notFound('no controller action ' . $action);
        }
    }

    public static function notFound($description)
    {
        \djvov\Core\View::showPage('404.tpl', [
                'description' => $description,
                'is404' => true
            ]
        );
    }

    public static function js() {
        return '<script src="' . \djvov\Config::$dir_tpl_relative . DIRECTORY_SEPARATOR
            . self::$module_name . DIRECTORY_SEPARATOR . self::$action_name
            . DIRECTORY_SEPARATOR . self::$action_name . '.js?r=' . mt_rand() . '"></script>';

    }
}
