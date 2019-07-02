<?php

namespace djvov\Core;

use djvov\Core\DB;
use djvov\Core\Profile;
use djvov\Core\Phone;
use djvov\Core\Email;

class Profiles implements \Iterator
{
    use Singleton;

    private static $db;
    private static $items;

    private static function init()
    {
        self::$db = DB::getInstance();
    }

    public function next()
    {
        $var = next(self::$items);
        return $var;
    }

    public function rewind()
    {
        reset(self::$items);
    }

    public function current()
    {
        $var = current(self::$items);
        return $var;
    }

    public function valid()
    {
        $key = key(self::$items);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

    public function key()
    {
        $var = key(self::$items);
        return $var;
    }

    public static function getProfiles($id = '')
    {
        $cls_id = '';
        $id = (int)$id;
        if ($id > 0) {
            $cls_id = ' WHERE id = ' . $id;
        }

        $profiles_ = self::$db->exec('SELECT id, name, surname, patronymic FROM profiles ' . $cls_id . ' ORDER BY surname, name, patronymic');

        if ($profiles_[1] > 0) {

            foreach ($profiles_[0] as $value) {

                $profile = new Profile;
                $emails = [];
                $phones = [];

                $profile->setId($value['id']);
                $profile->setName($value['name']);
                $profile->setSurname($value['surname']);
                $profile->setPatronymic($value['patronymic']);

                $emails_ = self::$db->exec('SELECT id, email, main, ord FROM emails WHERE profile_id = ' . $value['id'] . ' ORDER BY ord');

                if ($emails_[1] > 0) {

                    foreach ($emails_[0] as $eml) {
                        $email = new Email;
                        $email->setId($eml['id']);
                        $email->setProfileId($value['id']);
                        $email->setId($eml['id']);
                        $email->setMain($eml['main']);
                        $email->setOrd($eml['ord']);
                        $email->setEmail($eml['email']);
                        $emails[] = $email;
                    }
                }

                $profile->setEmails($emails);

                $phones_ = self::$db->exec('SELECT id, phone, main, phone_type_id, ord FROM phones WHERE profile_id = ' . $value['id'] . ' ORDER BY ord');

                if ($phones_[1] > 0) {

                    foreach ($phones_[0] as $phn) {
                        $phone = new Phone;
                        $phone->setId($phn['id']);
                        $phone->setProfileId($value['id']);
                        $phone->setPhoneTypeId($phn['phone_type_id']);

                        $phone_type = '';
                        $phone_type_ = self::$db->exec('SELECT id, name FROM phone_types WHERE id = ' . $phn['phone_type_id']);
                        if ($phone_type_[1] > 0 ) {

                            $phone->setPhoneTypeName($phone_type_[0][0]['name']);
                        }

                        $phone->setMain($phn['main']);
                        $phone->setOrd($phn['ord']);
                        $phone->setPhone($phn['phone']);

                        $phones[] = $phone;
                    }
                }

                $profile->setPhones($phones);
                self::$items[] = $profile;
            }
        }
        return ;
    }


}
