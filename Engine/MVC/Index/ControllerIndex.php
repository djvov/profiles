<?php

use djvov\Core\Controller;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ControllerIndex extends Controller
{
    use Singleton;

    public static function actionIndex()
    {
        $data = \djvov\App::$model->actionIndex();
        $data['js'] = Router::js();
        \djvov\App::$view->showPage('Index.tpl', $data);
    }
}
