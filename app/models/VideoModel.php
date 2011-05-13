<?php

class VideoModel extends BaseModel {

    static function insert($values) {
        return self::$notORM->video()->insert($values);
    }
	
}
