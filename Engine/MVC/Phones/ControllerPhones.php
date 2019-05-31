<?php

use djvov\Core\Controller;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ControllerPhones extends Controller
{
    use Singleton;

    public static function actionTypeList()
    {
        $data = \djvov\App::$model->actionTypeList();
        $data['js'] = Router::js();
        \djvov\App::$view->showPage('TypeList.tpl', $data);
    }

    public static function actionTypeEdit()
    {
        $data = \djvov\App::$model->actionTypeEdit();
        $data['js'] = Router::js();
        \djvov\App::$view->showPage('TypeEdit.tpl', $data);
    }

    public static function actionDeletePhoneType()
    {
        $data = \djvov\App::$model->actionDeletePhoneType();
        \djvov\App::$view->showAjax($data);
    }
}
