<?php

class PressModel extends BaseModel {

    static function insert($values) {
        return self::$notORM->press()->insert($values);
    }
	
}
