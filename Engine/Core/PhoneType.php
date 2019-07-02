<?php

namespace djvov\Core;

use djvov\Core\DB;

class PhoneType
{

    private static $db;

    private $id = 0;
    private $name = '';

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

    public function save()
    {
        $result = 0;

        self::$db = DB::getInstance();

        if ($this->id > 0) {

            $result1 = self::$db->query(
                'UPDATE phone_types SET name = :name WHERE id = :id',
                [
                    ['name', $this->name],
                    ['id', $this->id]
                ]
            );
            if ($result1[1] > 0) {
                $result++;
            }

        } else {

            $result1 = self::$db->insert(
                'phone_types',
                [
                    'name',
                ],
                [
                    $this->name,
                ]
            );
            if ($result1[0] > 0) {
                $result++;
            }
        }
        return $result;
    }

    public function delete()
    {
        $result = 0;

        self::$db = DB::getInstance();

        if ($this->id > 0) {

            $result1 = self::$db->query('DELETE FROM phone_types WHERE id = :id', [['id', $this->id]]);
            if ($result1[1] > 0) {
                $result++;
            }

            $result2 = self::$db->query('UPDATE phones SET phone_type_id = 0 WHERE phone_type_id = :phone_type_id', [['phone_type_id', $this->id]]);
            if ($result2[1] > 0) {
                $result++;
            }
        }

        return $result;
    }

}
