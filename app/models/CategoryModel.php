<?php
//use Nette\Environment, Nette\Debug;

class CategoryModel extends BaseModel {

    static function fetchAll($table = 'category') {
        return parent::fetchAll($table);
    }

    static function fetch() {
        return self::$notORM->category()->order("'order' DESC");
    }

    static function getIdByUrl($url) {
        $tag = self::$notORM->category("url_slug", $url)->fetch();
        return $tag['id'];
    }

    static function getUrlById($id) {
        $tag = self::$notORM->{'category'}[$id];
        return $tag['url_slug'];
    }
}
