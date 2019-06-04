<?php

namespace djvov\Core;

use djvov\Core\DB;

class Phones
{
    use Singleton;

    private static $db;

    private static function init()
    {
        self::$db = DB::getInstance();
    }

    public static function savePhoneType()
    {
        $ret = 0;
        $type_id = 0;

        if (isset(Router::$query['typeId']) && (int) Router::$query['typeId'] > 0) {
            $type_id = (int)Router::$query['typeId'];
            $result1 = self::$db->query(
                'UPDATE phone_types SET name = :name WHERE id = :id',
                [
                    ['name', Router::$query['typeName'][$type_id]],
                    ['id', $type_id]
                ]
            );
            if ($result1[1] > 0) {
                $ret++;
            }
        }

        if (isset(Router::$query['typeId']) && (int) Router::$query['typeId'] == 0) {
            $result1 = self::$db->insert(
                'phone_types',
                [
                    'name',
                ],
                [
                    Router::$query['typeName'][$type_id],
                ]
            );
            if ($result1[0] > 0) {
                $ret++;
            }
        }
        return $ret;
    }

    public static function getPhoneTypes($id = '')
    {
        $phone_types = [];
        $cls_id = '';
        $id = (int)$id;
        if ($id > 0) {
            $cls_id = ' WHERE id = ' . $id;
        }

        $phone_types_ = self::$db->exec('SELECT id, name FROM phone_types ' . $cls_id);

        if ($phone_types_[1] > 0) {

            foreach ($phone_types_[0] as $value) {
                $item = [];
                $item['id'] = $value['id'];
                $item['name'] = $value['name'];
                $phone_types[] = $item;
            }
        }
        return $phone_types;
    }

    public static function deletePhoneType()
    {
        $type_id = (int)Router::$query['typeId'];
        $ret = 0;

        if ($type_id > 0) {
            $result1 = self::$db->query('DELETE FROM phone_types WHERE id = :id', [['id', $type_id]]);
            if ($result1[1] > 0) {
                $ret++;
            }

            $result2 = self::$db->query('UPDATE phones SET phone_type_id = 0 WHERE phone_type_id = :phone_type_id', [['phone_type_id', $type_id]]);
            if ($result2[1] > 0) {
                $ret++;
            }
        }
        return $ret;
    }
}
