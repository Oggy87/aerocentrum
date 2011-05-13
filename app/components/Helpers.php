<?php

/**
 * Common helpers.
 *
 * @author     David Grudl
 * @package    Nette\Extras
 */
class Helpers
{
	/**
	 * Static class - cannot be instantiated.
	 */
	final public function __construct()
	{
		throw new LogicException("Cannot instantiate static class " . get_class($this));
	}


        public static function czechMonth($month) {
            static $nazvy = array('January' => 'ledna','February' => 'února','March' => 'března','April' => 'dubna','May' => 'května','June' => 'června','July' => 'července','August' => 'srpna','September' => 'září','October' => 'října','November' => 'listopadu', 'December' =>'prosince');

            return $nazvy[$month];
        }

        public static function czechDay($day) {
            static $nazvy = array('neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota');

            return $nazvy[$day];
        }

        public static function image($image,$width,$height,$alt,$watermark = TRUE, $crop = FALSE, $dateMark = TRUE,$enlarge = FALSE,$class = NULL, $id = NULL) {

             $static = 'static/';
            $image = $static.$image;
            if (!file_exists(WWW_DIR.'/'.$image)) {
                return 'Image not found.';
            }
            $staticTemp = $static.'temp';
            $staticUri = WWW_DIR.'/'.$static;
            $staticUriTemp = WWW_DIR.'/'.$staticTemp;

            if ($watermark == 'true' OR $watermark == 'TRUE') $watermark = TRUE;
            elseif ($watermark == 'false' OR $watermark == 'FALSE') $watermark = FALSE;

            if ($dateMark == 'true' OR $dateMark == 'TRUE') $dateMark = TRUE;
            elseif ($dateMark == 'false' OR $dateMark == 'FALSE') $dateMark = FALSE;

            if ($crop == 'true' OR $crop == 'TRUE') $crop = TRUE;
            elseif ($crop == 'false' OR $crop == 'FALSE') $crop = FALSE;

            if ($enlarge == 'true' OR $enlarge == 'TRUE') $enlarge = TRUE;
            elseif ($enlarge == 'false' OR $enlarge == 'FALSE') $enlarge = FALSE;

            if ($class == 'NULL') $class = NULL;
            if ($id == 'NULL') $id = NULL;

            $dirName = dirname($image).'/';
            list($name, $suffix) = explode('.',basename($image),2);
            $suffix = '.'.$suffix;

            $nameSuffix = $width.'x'.$height;
            if ($watermark) $nameSuffix = $nameSuffix.'_w';
            if ($crop) $nameSuffix = $nameSuffix.'_c';

            $newImage = $name.'_'.$nameSuffix.$suffix;

            if (!is_dir(WWW_DIR.'/'.$dirName) || !is_writable($staticUriTemp)) {
                throw new InvalidStateException('Thumbnail path ' . WWW_DIR.'/'.$dirName . ' does not exists or '.$staticUriTemp.' is not writable.');
            }

            if (!file_exists($staticUriTemp.'/'.$newImage)) {
                if ($crop) {
                    if($enlarge) {
                        $thumb = Image::fromFile(WWW_DIR.'/'.$image)->resize($width, $height,Image::FILL | Image::ENLARGE)
                                    ->crop('50%', '50%', $width, $height);
                    }
                    else {
                        $thumb = Image::fromFile(WWW_DIR.'/'.$image)->resize($width, $height,Image::FILL)
                                    ->crop('50%', '50%', $width, $height);
                    }
                }
                else {
                    if($enlarge) {
                        $thumb = Image::fromFile(WWW_DIR.'/'.$image)->resize($width, $height, Image::ENLARGE);
                    }
                    else {
                        $thumb = Image::fromFile(WWW_DIR.'/'.$image)->resize($width, $height);
                    }
                }

                if ($watermark) {
                    $watermarkImage = Image::fromFile($staticUri."images/watermark.png");
                    $watermarkImage->resize($thumb->width * 0.225,$thumb->height * 0.1875);

                    $thumb->place($watermarkImage, '97%', '97%');
                }
                $thumb->sharpen();
                $thumb->saveAlpha(true);
                $thumb->save($staticUriTemp.'/'.$newImage, 100);
            }
            else {
                $thumb = Image::fromFile($staticUriTemp.'/'.$newImage);
            }

            $dateTime = new DateTime53();

            $img = Html::el('img');
            if ($dateMark) $src = Environment::getVariable("baseUri").$staticTemp.'/'.$newImage.'?'.$dateTime->getTimestamp();
            else $src = Environment::getVariable("baseUri").$staticTemp.'/'.$newImage;
            $img->src =  $src;
            $img->width = $thumb->width;
            $img->height = $thumb->height;
            $img->alt = $alt;
            if ($class) $img->class = $class;
            if ($id) $img->id = $id;

            return $img;
        }

        public static function imageDb($image,$name,$modified,$width,$height,$alt,$watermark = TRUE, $crop = FALSE, $dateMark = TRUE,$class = NULL, $id = NULL) {

            $static = 'static/';

            $staticTemp = $static.'temp';
            $staticUri = WWW_DIR.'/'.$static;
            $staticUriTemp = WWW_DIR.'/'.$staticTemp;

            if ($watermark == 'true' OR $watermark == 'TRUE') $watermark = TRUE;
            elseif ($watermark == 'false' OR $watermark == 'FALSE') $watermark = FALSE;

            if ($dateMark == 'true' OR $dateMark == 'TRUE') $dateMark = TRUE;
            elseif ($dateMark == 'false' OR $dateMark == 'FALSE') $dateMark = FALSE;

            if ($crop == 'true' OR $crop == 'TRUE') $crop = TRUE;
            elseif ($crop == 'false' OR $crop == 'FALSE') $crop = FALSE;

            if ($class == 'NULL') $class = NULL;
            if ($id == 'NULL') $id = NULL;

          /*  $dirName = dirname($image).'/';
            list($name, $suffix) = explode('.',basename($image),2);
            $suffix = '.'.$suffix;*/

            $nameSuffix = $width.'x'.$height;
            if ($watermark) $nameSuffix = $nameSuffix.'_w';
            if ($crop) $nameSuffix = $nameSuffix.'_c';

            $format = Image::getFormatFromString($image);
            switch ($format) {
                case Image::GIF:
                    $suffix = '.gif';
                    break;
                case Image::JPEG;
                    $suffix = '.jpg';
                    break;
                default:
                    $suffix = '.png';
                    break;
            };

            $newImage = $name.'_'.$nameSuffix;//.$suffix;

            if (!is_writable($staticUriTemp)) {
                throw new InvalidStateException($staticUriTemp.' is not writable.');
            }

            foreach (Finder::findFiles($newImage.'.*')->date('<', new DateTime($modified))->in($staticTemp) as $key => $file) {
                unlink($key);
            }

            $newImage .= $suffix;

            if (!file_exists($staticUriTemp.'/'.$newImage)) {
                if ($crop) {
                    $thumb = Image::fromString($image)->resize($width, $height,Image::FILL)
                                    ->crop('50%', '50%', $width, $height);
                }
                else {
                    $thumb = Image::fromString($image)->resize($width, $height);
                }

                if ($watermark) {
                    $watermarkImage = Image::fromFile($staticUri."images/watermark.png");
                    $watermarkImage->resize($thumb->width * 0.225,$thumb->height * 0.1875);

                    $thumb->place($watermarkImage, '97%', '97%');
                }
                $thumb->sharpen();
                $thumb->saveAlpha(true);
                $thumb->save($staticUriTemp.'/'.$newImage);
            }
            else {
                $thumb = Image::fromFile($staticUriTemp.'/'.$newImage);
            }
            $dateTime = new DateTime53();

            $img = Html::el('img');
            if ($dateMark) $src = Environment::getVariable("baseUri").$staticTemp.'/'.$newImage.'?'.$dateTime->getTimestamp();
            else $src = Environment::getVariable("baseUri").$staticTemp.'/'.$newImage;
            $img->src =  $src;
            $img->width = $thumb->width;
            $img->height = $thumb->height;
            $img->alt = $alt;
            if ($class) $img->class = $class;
            if ($id) $img->id = $id;

            return $img;
        }
        
       
        public static function currency($value)
	{
		return str_replace(" ", "\xc2\xa0", number_format($value, 0, "", " ")) . "\xc2\xa0Kč";
	}

        public static function currencyKc($value)
	{
		return str_replace(" ", "\xc2\xa0", number_format($value, 2, ",", " ")) . "\xc2\xa0Kč";
	}

        public static function template($text) {

            $template = new StringTemplate();
            $template->registerFilter(new LatteFilter);
            
            $template->content = $text;
            $template->presenter = Environment::getApplication()->getPresenter();

            return $template->__toString();

        }

        public static function video($video_path,$width,$height) {
            if(self::is_url($video_path)) {
                $iframe = Html::el('iframe frameborder="0" allowfullscreen');
                $iframe->width = $width;
                $iframe->height = $height;
                $iframe->src = "http://www.youtube.com/embed/".self::getYoutubeId($video_path);
                
                return $iframe;
            }
            else {
                $a = Html::el('a');
                $a->class = "video";
                $a->href = Environment::getVariable("baseUri")."static/".$video_path;
                $a->style = "display:block;width:".$width."px;height:".$height."px;";

                return $a;
            }
        }


        public static function macroVideo($videoId,$width,$height) {

            $video = GalleryModel::getVideo($videoId);
            if (!$video) {
                return "";
            }

            $a = Html::el('a');
            $a->href = Environment::getVariable("baseUri").$video['umisteni'];
            $a->style = "display:block;width:".$width."px;height:".$height."px;";
            $a->class = "player";

            return $a;

        }

        /** Zkrácení textu s HTML značkami
        * @param string $s zkracovaný řetězec bez komentářů a bloků skriptu
        * @param int $limit požadovaný počet vrácených znaků
        * @return string zkrácený řetězec se správně uzavřenými značkami
        * @copyright Jakub Vrána, http://php.vrana.cz
        */
        public static function html_cut($s, $limit)
        {
            static $empty_tags = array('area', 'base', 'basefont', 'br', 'col', 'frame', 'hr', 'img', 'input', 'isindex', 'link', 'meta', 'param');
            $length = 0;
            $tags = array(); // dosud neuzavřené značky
            for ($i=0; $i < strlen($s) && $length < $limit; $i++) {
                switch ($s{$i}) {

                case '<':
                    // načtení značky
                    $start = $i+1;
                    while ($i < strlen($s) && $s{$i} != '>' && !ctype_space($s{$i})) {
                        $i++;
                    }
                    $tag = strtolower(substr($s, $start, $i - $start));
                    // přeskočení případných atributů
                    $in_quote = '';
                    while ($i < strlen($s) && ($in_quote || $s{$i} != '>')) {
                        if (($s{$i} == '"' || $s{$i} == "'") && !$in_quote) {
                            $in_quote = $s{$i};
                        } elseif ($in_quote == $s{$i}) {
                            $in_quote = '';
                        }
                        $i++;
                    }
                    if ($s{$start} == '/') { // uzavírací značka
                        $tags = array_slice($tags, array_search(substr($tag, 1), $tags) + 1);
                    } elseif ($s{$i-1} != '/' && !in_array($tag, $empty_tags)) { // otevírací značka
                        array_unshift($tags, $tag);
                    }
                    break;

                case '&':
                    $length++;
                    while ($i < strlen($s) && $s{$i} != ';') {
                        $i++;
                    }
                    break;

                default:
                    $length++;

                }
            }
            $s = substr($s, 0, $i);

            if ($length == $limit) $s = $s .' ... ';

            if ($tags) {
                $s .= "</" . implode("></", $tags) . ">";
            }
            
            return $s;
        }


        public static function strip_tags_content($text, $tags = '', $invert = FALSE) {

          preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
          $tags = array_unique($tags[1]);

          if(is_array($tags) AND count($tags) > 0) {
            if($invert == FALSE) {
              return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
            }
            else {
              return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
            }
          }
          elseif($invert == FALSE) {
            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
          }
          return $text;
        }

       


	/**
	 * Plural: three forms, special cases for 1 and 2, 3, 4.
	 * (Slavic family: Slovak, Czech)
	 * @param  int
	 * @return mixed
	 */
	private static function plural($n)
	{
		$args = func_get_args();
		return $args[($n == 1) ? 1 : ($n >= 2 && $n <= 4) ? 2 : 3];
	}

         /** Check whether the string is URL address
         * @param string
         * @return string 1 or 0
         */
        public static function is_url($string) {
            $domain = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])'; // one domain component //! IDN
            return (preg_match("~^(https?)://($domain?\\.)+$domain(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i", $string)); //! restrict path, query and fragment characters
        }

        public static function getYoutubeId($url) {
            parse_str( parse_url( $url, PHP_URL_QUERY ) );
            return $v;
        }


}