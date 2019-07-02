<?php

namespace djvov\Core;

use djvov\Core\DB;

class Email
{
    private static $db;

    private $id = 0;
    private $email = '';
    private $main = 0;
    private $profile_id = 0;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $result = 0;

        self::$db = DB::getInstance();

        // if id == 0 need to create email
        if ($this->id == 0) {
            $result2 = self::$db->insert(
                'emails',
                [
                    'email',
                    'main',
                    'profile_id'
                ],
                [
                    $this->email,
                    $this->main,
                    $this->profile_id
                ]
            );
            if ($result2[0] > 0) {
                $result++;
            }
        } else {
            //need to update email
            $result2 = self::$db->query(
                'UPDATE emails SET email = :email, main = :main WHERE id = :id',
                [
                    ['email', $this->email],
                    ['main', $this->main],
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

        $result2 = self::$db->query('DELETE FROM emails WHERE id = :id', [['id', $this->id]]);
        if ($result2[1] > 0) {
            $result++;
        }

        return $result;

    }

}
