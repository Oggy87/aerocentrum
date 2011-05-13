<?php
//use Nette\Application\Route;

class AppRouter {

       /* public static $translationsPresenters = array(
                'cs' => array(
                        'ONas' => 'AboutUs',
                        'NapsaliONas' => 'WroteAboutUs',
                        'Opravneni' => 'Permission',
                        'VolnaMista' => 'Career',
                        'Sluzby' => 'Services',
                        'LeteckePraceVrtulniky' => 'AirWork',
                        'StavbyAMontaze' => 'Assembly',
                        'TransportBremen' => 'Transport',
                        'VapneniLesu' => 'LimingForests',
                        'TezbaDreva' => 'TimberHarvesting',
                        'LeteckePostriky' => 'AerialSpraying',
                        'KontrolniLety' => 'InspectingFlights',
                        'FotoletyAFilmovani' => 'PhotoFlight',
                        'Paravysadky' => 'Paraschuting',
                        'PrepravaOsob' => 'Helitaxi',
                        'HaseniPozaru' => 'FireFighting',
                        'OutdooroveAkce' => 'Outdoor',
                        'LeteckaSkola' => 'FlyingSchool',
                        'VyhlidkoveLetyVrtulnikem' => 'SightseeingFlight',
                        'ServisniStredisko' => 'ServiceCenter',
                        'Vrtulniky' => 'Helicopters',
                        'Mi8' => 'Mi8',
                        'RobinsonR22' => 'R22',
                        'RobinsonR44' => 'R44',
                        'Md520n' => 'Md520n',
                        'Reference' => 'Reference',
                        'FotoAVideo' => 'PhotoVideo',
                        'Videa' => 'Video',
                        'Poptavka' => 'Demand',
                        'Kontakty' => 'Contacts'
                )
        );

        public static $translationsActions = array(
                'cs' => array(
                        'stavbyAMontaze' => 'assembly'
                )
        );*/
	
	static function initialize($application) {
		$return = $application->getRouter();
                
                $return[] = new Route('robots.txt', array('presenter' => 'Feed', 'action' => 'robots'));
                $return[] = new Route('sitemap.xml', array('presenter' => 'Feed', 'action' => 'sitemap'));

                $return[] = $adminRouter = new MultiRouter('Admin');
                $adminRouter[] = new Route('admin/<presenter>/<action>[/<id>]', 'Default:default');

                $return[] = $frontRouter = new MultiRouter('Front');
              /*  $fRouter = new FilterRoute('<lang>/<presenter>/<action>[/<id>]', array('lang' => LANG, 'presenter' =>  'Homepage', 'action' => 'default'));
                $fRouter->addFilter('presenter','AppRouter::urlToPresenter', 'AppRouter::presenterToUrl');
               // $fRouter->addFilter('action', 'AppRouter::actionToUrl', 'AppRouter::urlToAction');
                $frontRouter[] = $fRouter;*/

                Route::addStyle('#cs-presenter', 'presenter');
                Route::setStyleProperty('#cs-presenter', Route::FILTER_TABLE, array(
                        'o-nas' => 'AboutUs',
                        'napsali-o-nas' => 'WroteAboutUs',
                        'opravneni' => 'Permission',
                        'volna-mista' => 'Career',
                        'sluzby' => 'Services',
                        'letecke-prace-vrtulniky' => 'AirWork',
                        'stavby-a-montaze' => 'Assembly',
                        'transport-bremen' => 'Transport',
                        'vapneni-lesu' => 'LimingForests',
                        'tezba-dreva' => 'TimberHarvesting',
                        'letecke-postriky' => 'AerialSpraying',
                        'kontrolni-lety' => 'InspectingFlights',
                        'fotolety-a-filmovani' => 'PhotoFlight',
                        'paravysadky' => 'Paraschuting',
                        'preprava-osob' => 'Helitaxi',
                        'haseni-pozaru' => 'FireFighting',
                        'outdoorove-akce' => 'Outdoor',
                        'letecka-skola' => 'FlyingSchool',
                        'vyhlidkove-lety-vrtulnikem' => 'SightseeingFlight',
                        'servisni-stredisko' => 'ServiceCenter',
                        'vrtulniky' => 'Helicopters',
                        'mi8' => 'Mi8',
                        'robinson-r22' => 'R22',
                        'robinson-r44' => 'R44',
                        'md520n' => 'Md520n',
                        'reference' => 'Reference',
                        'foto-a-video' => 'PhotoVideo',
                        'fotogalerie' => 'Photogallery',
                        'videa' => 'Video',
                        'poptavka' => 'Demand',
                        'kontakty' => 'Contacts',
                        'referencni-clanek' => 'Article'
                ));
                Route::addStyle('#cs-action', 'action');
                Route::setStyleProperty('#cs-action', Route::FILTER_TABLE, array(
                        'stavby-a-montaze' => 'assembly',
                        'transport-bremen' => 'transport',
                        'tezba-dreva' => 'timberHarvesting',
                        'letecke-snimkovani' => 'photoFlight',
                        'vapneni-lesu' => 'limingForests',
                        'letecke-postriky' => 'aerialSpraying'
                ));
                Route::addStyle('#articleId');
                Route::setStyleProperty('#articleId', Route::FILTER_IN, callback('ArticleModel::getIdByUrl'));
                Route::setStyleProperty('#articleId', Route::FILTER_OUT, callback('ArticleModel::getUrlById'));

                $frontRouter[] = new Route('cs/referencni-clanek/<id #articleId>', array('lang' => 'cs', 'presenter' =>  'Article', 'action' => 'default'));
                $frontRouter[] = new Route('cs/<presenter #cs-presenter>/<action>/<id [1-9]\d*>[-<slug>]', array('lang' => 'cs', 'action' => 'view'));
                $frontRouter[] = new Route('cs/<presenter #cs-presenter>/<action #cs-action>[/<id [1-9]>]', array('lang' => 'cs', 'presenter' =>  'Homepage', 'action' => 'default'));

                $frontRouter[] = new Route('<lang>/<presenter>/<action>[/<id [1-9]>]', array('lang' => LANG, 'presenter' =>  'Homepage', 'action' => 'default'));

		return $return;
	}

       /* public static function presenterToUrl($presenter, PresenterRequest $request)
        {
                $lang = $request->params['lang'];
                $table = array_flip(self::$translationsPresenters[$lang]);
                if(array_key_exists($presenter, $table)) return $table[$presenter];
                return NULL;
        }

        public static function urlToPresenter($url, PresenterRequest $request)
        {
                $lang = $request->params['lang'];
                $table = self::$translationsPresenters[$lang];
                if(array_key_exists($url, $table)) return $table[$url];
                return NULL;
        }

        public static function actionToUrl($action, PresenterRequest $request)
        {
                $lang = $request->params['lang'];
                $table = array_flip(self::$translationsActions[$lang]);
                if(array_key_exists($action, $table)) return $table[$action];
                return NULL;
        }

        public static function urlToAction($url, PresenterRequest $request)
        {
                $lang = $request->params['lang'];
                $table = self::$translationsActions[$lang];
                if(array_key_exists($url, $table)) return $table[$url];
                return NULL;
        }*/
}
