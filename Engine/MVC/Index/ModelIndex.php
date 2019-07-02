<?php

use djvov\Config;
use djvov\Core\Model;
use djvov\Core\Profiles;
use djvov\Core\Profile;
use djvov\Core\Email;
use djvov\Core\Phone;
use djvov\Core\Router;
use djvov\Core\Singleton;

class ModelIndex extends Model
{
    use Singleton;

    public static function actionIndex()
    {
        $Profiles = Profiles::getInstance();
        Router::getInstance();
        $saved = 0;

        // need to save edited profile

        if (isset(Router::$query['profileId'])) {

            $profileId = (int)Router::$query['profileId'];

            $profile = new Profile;
            $profile->setId(Router::$query['profileId']);
            $profile->setSurname(Router::$query['surname'][Router::$query['profileId']]);
            $profile->setName(Router::$query['name'][Router::$query['profileId']]);
            $profile->setPatronymic(Router::$query['patronymic'][Router::$query['profileId']]);

            $emails = [];
            if (isset(Router::$query['email']) && count(Router::$query['email'])>0) {
                $mainKey = 0;
                foreach (Router::$query['email'][Router::$query['profileId']] as $key => $value) {
                    if ($key!='add') {
                        $main_email = ($mainKey == Router::$query['emailsMain'])?1:0;
                        $email = new Email;
                        $email->setId($key);
                        $email->setEmail($value);
                        $email->setMain($main_email);
                        $emails[] = $email;
                        $mainKey++;
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $main_email = ($mainKey == Router::$query['emailsMain'])?1:0;
                            $email = new Email;
                            $email->setId(0);
                            $email->setEmail($value1);
                            $email->setMain($main_email);
                            $emails[] = $email;
                            $mainKey++;
                        }
                    }
                }
            }
            $profile->setEmails($emails);

            $phones = [];
            if (isset(Router::$query['phone']) && count(Router::$query['phone'])>0) {
                $mainKey = 0;
                foreach (Router::$query['phone'][Router::$query['profileId']] as $key => $value) {
                    if ($key!='add') {
                        $main_phone = ($mainKey == Router::$query['phonesMain'])?1:0;
                        $phone = new Phone;
                        $phone->setId($key);
                        $phone->setPhone($value);
                        $phone->setPhoneTypeId(Router::$query['phone_type'][Router::$query['profileId']][$key]);
                        $phone->setMain($main_phone);
                        $phones[] = $phone;
                        $mainKey++;
                    } else {
                        foreach ($value as $key1 => $value1) {
                            $main_phone = ($mainKey == Router::$query['phonesMain'])?1:0;
                            $phone = new Phone;
                            $phone->setId(0);
                            $phone->setPhoneTypeId(Router::$query['phone_type'][Router::$query['profileId']]['add'][$key1]);
                            $phone->setPhone($value1);
                            $phone->setMain($main_phone);
                            $phones[] = $phone;
                            $mainKey++;
                        }
                    }
                }
            }
            $profile->setPhones($phones);

            $saved = $profile->save();
        }

        $Profiles::getProfiles();
        return [
            'profiles' => $Profiles,
            'saved' => $saved,
        ];
    }
}
