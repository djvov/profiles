<?php

namespace djvov\Core;

use djvov\Core\DB;

class Profile
{

    private static $db;

    private $id = 0;
    private $name = '';
    private $surname = '';
    private $patronymic = '';
    private $emails = [];
    private $phones = [];

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getPatronymic()
    {
        return $this->patronymic;
    }

    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    public function getEmails()
    {
        return $this->emails;
    }

    public function setEmails($emails)
    {
        $this->emails = $emails;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    public function save()
    {
        $result = 0;

        self::$db = DB::getInstance();

        // if id == 0 need to create Profile
        if ($this->id == 0) {
            $result1 = self::$db->insert(
                'profiles', [
                    'name',
                    'surname',
                    'patronymic'
                ],
                [
                    $this->name,
                    $this->surname,
                    $this->patronymic
                ]
            );
            if ($result1[0] > 0) {
                $result++;
                $this->id = $result1[0];
            }
        } else {
            // else need to update profile
            $result1 = self::$db->query(
                'UPDATE profiles SET name = :name, surname = :surname, patronymic = :patronymic WHERE id = :id',
                [
                    ['name', $this->name],
                    ['surname', $this->surname],
                    ['patronymic', $this->patronymic],
                    ['id', $this->id]
                ]
            );
            if ($result1[1] > 0) {
                $result++;
            }
        }

        if (count($this->emails)>0) {
            foreach ($this->emails as $key => $email) {
                $email->setProfileId($this->id);
                $result += $email->save();
            }
        }

        if (count($this->phones)>0) {
            foreach ($this->phones as $key => $phone) {
                $phone->setProfileId($this->id);
                $result += $phone->save();
            }
        }

        return $result;
    }

    public function delete()
    {
        $result = 0;

        self::$db = DB::getInstance();

        $result2 = self::$db->query('DELETE FROM profiles WHERE id = :id', [['id', $this->id]]);
        if ($result2[1] > 0) {
            $result++;
        }
        $result2 = self::$db->query('DELETE FROM phones WHERE profile_id = :profile_id', [['profile_id', $this->id]]);
        if ($result2[1] > 0) {
            $result++;
        }
        $result2 = self::$db->query('DELETE FROM emails WHERE profile_id = :profile_id', [['profile_id', $this->id]]);
        if ($result2[1] > 0) {
            $result++;
        }
        return $result;

    }

}
