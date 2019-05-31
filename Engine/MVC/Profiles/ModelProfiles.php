<?php

use djvov\Config;
use djvov\Core\Model;
use djvov\Core\Profiles;
use djvov\Core\Phones;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ModelProfiles extends Model
{
    use Singleton;

    public static function actionEdit()
    {
        $profiles = [];
        $Profiles = Profiles::getInstance();
        $Phones = Phones::getInstance();
        Router::getInstance();

        $phone_types = $Phones::getPhoneTypes();
        $id = (int)Router::$query['id'];
        if ($id > 0) {
            $profiles = $Profiles::getProfiles($id);
        }
        return [
            'id' => $id,
            'profiles' => $profiles,
            'phone_types' => $phone_types,
        ];
    }

    public static function actionDeleteEmail()
    {
        $Profiles = Profiles::getInstance();
        $result = $Profiles::deleteEmail();
        return [
            'result' => $result,
        ];
    }

    public static function actionDeletePhone()
    {
        $Profiles = Profiles::getInstance();
        $result = $Profiles::deletePhone();
        return [
            'result' => $result,
        ];
    }

    public static function actionDeleteProfile()
    {
        $Profiles = Profiles::getInstance();
        $result = $Profiles::deletePhoneType();
        return [
            'result' => $result,
        ];
    }
}
