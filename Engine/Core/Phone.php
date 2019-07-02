<?php

namespace djvov\Core;

use djvov\Core\DB;

class Phone
{
    private static $db;

    private $id = 0;
    private $phone = '';
    private $main = 0;
    private $profile_id = 0;
    private $phone_type_id = 0;
    private $phone_type_name = '';
    private $ord = 999999;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProfileId()
    {
        return $this->profile_id;
    }

    public function setProfileId($profile_id)
    {
        $this->profile_id = $profile_id;
    }

    public function getPhoneTypeId()
    {
        return $this->phone_type_id;
    }

    public function setPhoneTypeId($phone_type_id)
    {
        $this->phone_type_id = $phone_type_id;
    }

    public function getPhoneTypeName()
    {
        return $this->phone_type_name;
    }

    public function setPhoneTypeName($phone_type_name)
    {
        $this->phone_type_name = $phone_type_name;
    }

    public function getMain()
    {
        return $this->main;
    }

    public function setMain($main)
    {
        $this->main = $main;
    }

    public function getOrd()
    {
        return $this->ord;
    }

    public function setOrd($ord)
    {
        $this->ord = $ord;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function save()
    {
        $result = 0;

        self::$db = DB::getInstance();

        // if id == 0 need to create phone
        if ($this->id == 0) {
            $result2 = self::$db->insert(
                'phones',
                [
                    'phone',
                    'main',
                    'phone_type_id',
                    'profile_id'
                ],
                [
                    $this->phone,
                    $this->main,
                    $this->phone_type_id,
                    $this->profile_id
                ]
            );
            if ($result2[0] > 0) {
                $result++;
            }
        } else {
            // need to update phone
            $result2 = self::$db->query(
                'UPDATE phones SET phone = :phone, main = :main, phone_type_id = :phone_type_id  WHERE id = :id',
                [
                    ['phone', $this->phone],
                    ['main', $this->main],
                    ['phone_type_id', $this->phone_type_id],
                    ['id', $this->id],
                ]
            );
            if ($result2[1] > 0) {
                $result++;
            }
        }

        return $result;
    }

    public function delete()
    {
        $result = 0;
        self::$db = DB::getInstance();
        $result2 = self::$db->query('DELETE FROM phones WHERE id = :id', [['id', $this->id]]);
        if ($result2[1] > 0) {
            $result++;
        }
        return $result;
    }

}
