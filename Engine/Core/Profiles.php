<?php

namespace djvov\Core;

use djvov\Core\DB;

class Profiles
{
    use Singleton;

    private static $db;

    private static function init()
    {
        self::$db = DB::getInstance();
    }

    public static function getProfiles($id = '')
    {
        $profiles = [];
        $cls_id = '';
        $id = (int)$id;
        if ($id > 0) {
            $cls_id = ' WHERE id = ' . $id;
        }

        $profiles_ = self::$db->exec('SELECT id, name, surname, patronymic FROM profiles ' . $cls_id . ' ORDER BY surname, name, patronymic');

        if ($profiles_[1] > 0) {

            foreach ($profiles_[0] as $value) {

                $item = [];
                $item['id'] = $value['id'];
                $item['name'] = $value['name'];
                $item['surname'] = $value['surname'];
                $item['patronymic'] = $value['patronymic'];

                $emails = [];

                $emails_ = self::$db->exec('SELECT id, email, main FROM emails WHERE profile_id = ' . $value['id'] . ' ORDER BY ord');

                if ($emails_[1] > 0) {

                    foreach ($emails_[0] as $email) {
                        $emails[] = [
                            'id' => $email['id'],
                            'email' => $email['email'],
                            'main' => $email['main'],
                        ];
                    }
                }

                $item['emails'] = $emails;

                $phones = [];

                $phones_ = self::$db->exec('SELECT id, phone, main, phone_type_id FROM phones WHERE profile_id = ' . $value['id'] . ' ORDER BY ord');

                if ($emails_[1] > 0) {

                    foreach ($phones_[0] as $phone) {

                        $phone_type = '';
                        $phone_type_ = self::$db->exec('SELECT id, name FROM phone_types WHERE id = ' . $phone['phone_type_id']);
                        if ($phone_type_[1] > 0 ) {
                            $phone_type = [
                                'id' => $phone_type_[0][0]['id'],
                                'name' => $phone_type_[0][0]['name']
                            ];
                        }

                        $phones[] = [
                            'id' => $phone['id'],
                            'phone' => $phone['phone'],
                            'main' => $phone['main'],
                            'phone_type' => $phone_type,
                        ];
                    }
                }
                $item['phones'] = $phones;
                $profiles[] = $item;
            }
        }
        return $profiles;
    }

    public static function deleteEmail()
    {
        $email_id = (int)Router::$query['email_id'];
        $ret = 0;
        if ($email_id > 0) {
            $result2 = self::$db->query('DELETE FROM emails WHERE id = :id', [['id', $email_id]]);
            if ($result2[1] > 0) {
                $ret = $email_id;
            }
        }
        return $ret;
    }

    public static function deletePhone()
    {
        $phone_id = (int)Router::$query['phone_id'];
        $ret = 0;
        if ($phone_id > 0) {
            $result2 = self::$db->query('DELETE FROM phones WHERE id = :id', [['id', $phone_id]]);
            if ($result2[1] > 0) {
                $ret = $phone_id;
            }
        }
        return $ret;
    }

    public static function deleteProfile()
    {
        $profile_id = (int)Router::$query['profileId'];
        $ret = 0;
        if ($profile_id > 0) {
            $result2 = self::$db->query('DELETE FROM profiles WHERE id = :id', [['id', $profile_id]]);
            if ($result2[1] > 0) {
                $ret++;
            }
            $result2 = self::$db->query('DELETE FROM phones WHERE profile_id = :profile_id', [['profile_id', $profile_id]]);
            if ($result2[1] > 0) {
                $ret++;
            }
            $result2 = self::$db->query('DELETE FROM emails WHERE profile_id = :profile_id', [['profile_id', $profile_id]]);
            if ($result2[1] > 0) {
                $ret++;
            }
        }
        return $ret;
    }

    public static function saveProfile()
    {
        $ret = 0;
        $profile_id = 0;

        if (isset(Router::$query['profileId']) && (int)Router::$query['profileId'] > 0) {

            $profile_id = (int)Router::$query['profileId'];
            $result1 = self::$db->query('UPDATE profiles SET name = :name, surname = :surname, patronymic = :patronymic WHERE id = :id',
                [
                    ['name', Router::$query['name'][$profile_id]],
                    ['surname', Router::$query['surname'][$profile_id]],
                    ['patronymic', Router::$query['patronymic'][$profile_id]],
                    ['id', $profile_id]
                ]);
            if ($result1[1] > 0) {
                $ret++;
            }
        }

        if (isset(Router::$query['profileId']) && (int)Router::$query['profileId'] == 0) {

            $result1 = self::$db->insert('profiles', [
                    'name',
                    'surname',
                    'patronymic'
                ], [
                    Router::$query['name'][$profile_id],
                    Router::$query['surname'][$profile_id],
                    Router::$query['patronymic'][$profile_id]
                ]
            );
            if ($result1[0] > 0) {
                $ret++;
                $profile_id = $result1[0];
            }
        }

        if ($profile_id > 0) {

            $emails = [];

            foreach (Router::$query['email'][Router::$query['profileId']] as $key => $value) {
                if ($key!='add') {
                    $emails[] = ['id' => $key, 'email' => $value, 'main' => 0];
                }
            }

            if (isset(Router::$query['email'][Router::$query['profileId']]['add'])) {
                foreach (Router::$query['email'][Router::$query['profileId']]['add'] as $key => $value) {
                    $emails[] = ['id' => 'add', 'email' => $value, 'main' => 0];
                }
            }

            foreach ($emails as $key => $value) {
                if ($key == Router::$query['emailsMain']) {
                    $emails[$key]['main'] = 1;
                }
            }

            foreach ($emails as $key => $value) {
                if ($value['id'] != 'add') {
                    $result2 = self::$db->query('UPDATE emails SET email = :email, main = :main WHERE id = :id', [
                        ['email', $value['email']],
                        ['main', $value['main']],
                        ['id', $value['id']],
                    ]);
                    if ($result2[1] > 0) {
                        $ret++;
                    }
                } else {
                    $result2 = self::$db->insert('emails', ['email', 'main', 'profile_id'], [$value['email'], $value['main'], $profile_id]);
                    if ($result2[0] > 0) {
                        $ret++;
                    }
                }
            }

            $phones = [];

            foreach (Router::$query['phone'][Router::$query['profileId']] as $key => $value) {
                if ($key!='add') {
                    $phone_type = Router::$query['phone_type'][Router::$query['profileId']][$key];
                    $phones[] = ['id' => $key, 'phone' => $value, 'main' => 0, 'phone_type' => $phone_type];
                }
            }

            if (isset(Router::$query['phone'][Router::$query['profileId']]['add'])) {
                foreach (Router::$query['phone'][Router::$query['profileId']]['add'] as $key => $value) {
                    $phone_type = Router::$query['phone_type'][Router::$query['profileId']]['add'][$key];
                    $phones[] = ['id' => 'add', 'phone' => $value, 'main' => 0, 'phone_type' => $phone_type];
                }
            }

            foreach ($phones as $key => $value) {
                if ($key == Router::$query['phonesMain']) {
                    $phones[$key]['main'] = 1;
                }
            }

            foreach ($phones as $key => $value) {
                if ($value['id'] != 'add') {
                    $result2 = self::$db->query('UPDATE phones SET phone = :phone, main = :main, phone_type_id = :phone_type_id  WHERE id = :id', [
                        ['phone', $value['phone']],
                        ['main', $value['main']],
                        ['phone_type_id', $value['phone_type']],
                        ['id', $value['id']],
                    ]);
                    if ($result2[1] > 0) {
                        $ret++;
                    }
                } else {
                    $result2 = self::$db->insert('phones', ['phone', 'main', 'phone_type_id', 'profile_id'], [$value['phone'], $value['main'], $value['phone_type'], $profile_id]);
                    if ($result2[0] > 0) {
                        $ret++;
                    }
                }
            }
        }
        return $ret;
    }
}
