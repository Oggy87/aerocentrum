<?php

class ArticleModel extends BaseModel {

    static function recursiveArticles($section, $lang) {
        return self::$notORM->article("section LIKE ?", $section."%")
                            ->where('language_id',$lang)
                            ->where('visible','1');
    }

    static function fetchPhotos($id) {
        $galleries = self::$notORM->article_gallery("article_id",$id)->select("gallery_id");
        return self::$notORM->photo("gallery_id",$galleries);
    }

    static function fetchVideos($id) {
        $article_videos = self::$notORM->article_video("article_id",$id)->select("video_id");
        return self::$notORM->video("id",$article_videos);
    }

    static function fetchPress($id) {
        $article_presses = self::$notORM->article_press("article_id",$id)->select("press_id");
        return self::$notORM->press("id",$article_presses);
    }

    static function getUrlById($id) {
        $article = self::fetchRow('article', $id);
        return $article["url_slug"];
    }

    static function getIdByUrl($url) {
        $article = self::$notORM->article("url_slug",$url)->fetch();
        return $article["id"];
    }

    static function insert($values) {
        return self::$notORM->article()->insert($values);
    }
	
}
