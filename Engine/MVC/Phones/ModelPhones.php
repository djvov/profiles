<?php

use djvov\Config;
use djvov\Core\Model;
use djvov\Core\Phones;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ModelPhones extends Model
{
    use Singleton;

    public static function actionTypeEdit()
    {
        $phone_types = [];
        $Phones = Phones::getInstance();
        $id = (int)Router::$query['id'];
        if ($id > 0) {
            $phone_types = $Phones::getPhoneTypes($id);
        }
        return [
            'phone_types' => $phone_types,
            'id' => $id,
        ];
    }

    public static function actionTypeList()
    {
        $phone_types = [];
        $Phones = Phones::getInstance();
        $saved = $Phones::savePhoneType();
        $phone_types = $Phones::getPhoneTypes();
        return [
            'phone_types' => $phone_types,
            'saved' => $saved,
        ];
    }

    public static function actionDeletePhoneType()
    {
        $Phones = Phones::getInstance();
        $result = $Phones::deletePhoneType();
        return [
            'result' => $result,
        ];
    }

}
