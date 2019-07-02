<?php

namespace djvov\Core;

use djvov\Core\DB;
use djvov\Core\PhoneType;
use djvov\Core\Singleton;

class PhoneTypes implements \Iterator
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

    public function getPhoneTypes($id = '') {
    	$cls_id = '';
        $id = (int)$id;
        if ($id > 0) {
            $cls_id = ' WHERE id = ' . $id;
        }

        $phone_types_ = self::$db->exec('SELECT id, name FROM phone_types ' . $cls_id);

        if ($phone_types_[1] > 0) { // check rows count

        	self::$items = [];

            foreach ($phone_types_[0] as $value) {

            	$phoneType = new PhoneType;
            	$phoneType->setId($value['id']);
            	$phoneType->setName($value['name']);
            	self::$items[] = $phoneType;
          	}
        }

    	return ;
    }

}
