<?php
//use Nette\Environment, Nette\Debug;

class productModel extends BaseModel {


    static function getIdByUrl($url) {
        $product = self::$notORM->product("url_slug", $url)->fetch();
        return $product['id'];
    }

    static function getUrlById($id) {
        $product = self::$notORM->{'product'}[$id];
        return $product['url_slug'];
    }
}
