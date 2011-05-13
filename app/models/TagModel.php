<?php
//use Nette\Environment, Nette\Debug;

class TagModel extends BaseModel {

    static function main() {
        return self::$notORM->tag("tagType.main",1)->order("tagType_id, 'order' DESC");
    }

    static function getIdByUrl($url) {
        $field = explode('+', $url);
        $tags = self::$notORM->tag("url_slug",$field)->order("url_slug");
        $return = NULL;
        foreach ($tags as $tag) {
            if($return) $return .= '+';
            $return .= $tag['id'];
        }
        
        return $return;
    }

    static function getUrlById($string) {
        $field = explode('+', $string);
        $tags = self::$notORM->tag("id",$field)->order("url_slug");
        $return = NULL;
        foreach ($tags as $tag) {
            if($return) $return .= '+';
            $return .= $tag['url_slug'];
        }

        return $return;
    }
}
