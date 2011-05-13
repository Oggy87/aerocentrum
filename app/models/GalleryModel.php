<?php

class GalleryModel extends BaseModel {

    const WEB = 'web';
    const STORAGE = 'storage';

    static function fetchGalleries($type) {
        return self::$notORM->gallery("type", $type);
    }

    static function insert($values) {
        return self::$notORM->gallery()->insert($values);
    }

    static function delete($id) {
        return self::$notORM->gallery('id',$id)->delete();
    }

    static function setTitlePhoto($gallery, $photo_id) {
        $args = array('photo_id' => $photo_id);
        return $gallery->update($args);
    }

    static function fetchPhoto($id) {
        return self::$notORM->{'photo'}[$id];
    }

    static function deletePhoto($id) {
        return self::$notORM->photo('id',$id)->delete();
    }

 
	
}
