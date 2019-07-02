<?php

use djvov\Config;
use djvov\Core\Model;
use djvov\Core\Profiles;
use djvov\Core\Profile;
use djvov\Core\PhoneTypes;
use djvov\Core\Phone;
use djvov\Core\Email;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ModelProfiles extends Model
{
    use Singleton;

    public static function actionEdit()
    {
        Router::getInstance();

        $Profiles = Profiles::getInstance();
        $PhoneTypes = PhoneTypes::getInstance();
        $PhoneTypes::getPhoneTypes();
        $id = (int)Router::$query['id'];

        if ($id > 0) {
            $Profiles::getProfiles($id);
        }

        return [
            'id' => $id,
            'profiles' => $Profiles,
            'phone_types' => $PhoneTypes,
        ];
    }

    public static function actionDeleteEmail()
    {
        $email_id = (int)Router::$query['email_id'];
        $result = 0;
        if ($email_id > 0) {
            $email = new Email;
            $email->setId($email_id);
            $result = $email->delete();
        }

        return [
            'result' => $result,
        ];
    }

    public static function actionDeletePhone()
    {
        $phone_id = (int)Router::$query['phone_id'];
        $result = 0;
        if ($phone_id > 0) {
            $phone = new Phone;
            $phone->setId($phone_id);
            $result = $phone->delete();
        }

        return [
            'result' => $result,
        ];
    }

    public static function actionDeleteProfile()
    {
        $profile_id = (int)Router::$query['profileId'];
        $result = 0;

        if ($profile_id > 0) {
            $profile = new Profile;
            $profile->setId($profile_id);
            $result = $profile->delete();
        }

        return [
            'result' => $result,
        ];
    }
}
