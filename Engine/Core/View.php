<?php

namespace djvov\Core;

use djvov\Config;
use \Smarty;

class View
{
    protected static $smarty;

    public static function dirTpl()
    {
        \djvov\Config::getInstance();
        $dir_tpl = \djvov\Config::$dir_tpl . DIRECTORY_SEPARATOR . Router::$module_name
            . DIRECTORY_SEPARATOR . Router::$action_name . DIRECTORY_SEPARATOR;
        return $dir_tpl;
    }

    public static function smartyStart($tpl_path = '')
    {
        if (file_exists($tpl_path)) {
            \djvov\Config::getInstance();
            self::$smarty = new Smarty;
            self::$smarty->compile_dir = \djvov\Config::$dir_smarty
                . DIRECTORY_SEPARATOR . 'templates_c'. DIRECTORY_SEPARATOR;
            self::$smarty->assign('content', '');
            self::$smarty->assign('js', '');
        } else {
            Router::notFound('no tpl ' . $tpl_path);
        }
    }

    public static function showPage($template = '', $data = [])
    {
        if (!empty($template)) {
            if ($template == '404.tpl') {
                $tpl_path = \djvov\Config::$dir_tpl . DIRECTORY_SEPARATOR . '404'
                    . DIRECTORY_SEPARATOR . $template;
            } else {
                $tpl_path = \djvov\App::$view->dirTpl() . $template;
                $data['action_name'] = Router::$action_name;
                $data['module_name'] = Router::$module_name;
                $data['is404'] = false;
            }
        }

        self::smartyStart($tpl_path);

        if (is_array($data)) {
            foreach($data as $key => $value) {
                self::$smarty->assign($key, $value);
            }
        }

        if (!empty($template)) {
            $content = self::$smarty->fetch($tpl_path);
            self::$smarty->assign('content', $content);
        }

        self::$smarty->display(\djvov\Config::$dir_tpl . DIRECTORY_SEPARATOR . 'Index.tpl');

        ob_end_flush();

        exit();
    }

    public static function showAjax($data = [])
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        ob_end_flush();
        exit();
    }
}
