<?php

use djvov\Core\Model;
use djvov\Core\PhoneTypes;
use djvov\Core\PhoneType;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ModelPhones extends Model
{
    use Singleton;

    public static function actionTypeEdit()
    {
        $PhoneTypes = PhoneTypes::getInstance();
        $id = (int)Router::$query['id'];
        if ($id > 0) {
            $PhoneTypes::getPhoneTypes($id);
        }
        return [
            'phone_types' => $PhoneTypes,
            'id' => $id,
        ];
    }

    public static function actionTypeList()
    {
        $PhoneTypes = PhoneTypes::getInstance();
        $saved = 0;
        if (isset(Router::$query['typeId'])) {

            $type_id = (int)Router::$query['typeId'];

            if (isset(Router::$query['typeName'][$type_id])) {

                $phoneType = new PhoneType;
                $phoneType->setId($type_id);
                $phoneType->setName(Router::$query['typeName'][$type_id]);
                $saved = $phoneType->save();
            }
        }

        $PhoneTypes::getPhoneTypes();

        return [
            'phone_types' => $PhoneTypes,
            'saved' => $saved,
        ];
    }

    public static function actionDeletePhoneType()
    {
        $type_id = (int)Router::$query['typeId'];

        if ($type_id > 0) {

            $phoneType = new PhoneType;
            $phoneType->setId($type_id);
            $result = $phoneType->delete();

            return [
                'result' => $result,
            ];
        }
    }

}
