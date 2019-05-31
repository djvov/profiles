<?php

use djvov\Core\Controller;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ControllerProfiles extends Controller
{
    use Singleton;

    public static function actionEdit()
    {
        $data = \djvov\App::$model->actionEdit();
        $data['js'] = Router::js();
        \djvov\App::$view->showPage('Edit.tpl', $data);
    }

    public static function actionDeleteEmail()
    {
        $data = \djvov\App::$model->actionDeleteEmail();
        \djvov\App::$view->showAjax($data);
    }

    public static function actionDeletePhone()
    {
        $data = \djvov\App::$model->actionDeletePhone();
        \djvov\App::$view->showAjax($data);
    }

    public static function actionDeleteProfile()
    {
        $data = \djvov\App::$model->actionDeleteProfile();
        \djvov\App::$view->showAjax($data);
    }
}
