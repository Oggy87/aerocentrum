<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */



/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Front_BasePresenter extends BasePresenter
{
    public $lang;

    /**
     * Get persistent parameters
     *
     * @return array persistents
    */
    public static function getPersistentParams() {
        return array('lang');

    }

    protected function startup() {
        parent::startup();
        
        $this->lang = $this->getParam('lang');
        if(!$this->lang) $this->lang = LANG;
        foreach(BaseModel::fetchAll('language') as $lang) {
            $languages[] = $lang['id'];
        }

        if (!in_array($this->lang, $languages))
                throw new InvalidArgumentException("Jazyk '$this->lang' neexistuje.");
    }

    public function  beforeRender() {
        parent::beforeRender();

        $this->template->registerHelper('html_cut', 'Helpers::html_cut');
        $this->template->registerHelper('template', 'Helpers::template');
        $this->template->registerHelper('video', 'Helpers::video');
    }

    public function createComponentWebStructure($name) {
        $webStructure = new WebStructure($this, $name);

        //homepage
        $home = new SectionNode('home',$this->translator->translate('Úvod'), ':Front:Homepage:',NULL,array('subheading' => $this->translator->translate('kdo jsme a co děláme')));
        $webStructure->addComponent($home,$home->componentName);

        //about
        $about = new SectionNode('about',$this->translator->translate('O nás'), ':Front:AboutUs:',NULL,array('subheading' => $this->translator->translate('naše oprávnění, tisk o nás, partneři, kariéra')));
        $webStructure->addComponent($about,$about->componentName);

            //about-team
            $team = new SectionNode('team',$this->translator->translate('Náš tým'), ':Front:OurTeam:');
            $about->addComponent($team,$team->componentName);

            //about-media
            $media = new SectionNode('media',$this->translator->translate('Napsali o nás'), ':Front:WroteAboutUs:');
            $about->addComponent($media,$media->componentName);

            //about-permission
            $permission = new SectionNode('permission',$this->translator->translate('Naše oprávnění'), ':Front:Permission:');
            $about->addComponent($permission,$permission->componentName);

            //about-partners
          /*  $partners = new SectionNode('partners',$this->translator->translate('Partneři'), ':Front:Partners:');
            $about->addComponent($partners,$partners->componentName);*/

            //about-career
            $career = new SectionNode('career',$this->translator->translate('Kariéra'), ':Front:Career:');
            $about->addComponent($career,$career->componentName);

        //services
        $services = new SectionNode('services',$this->translator->translate('Služby'), ':Front:Services:',NULL,array('subheading' => $this->translator->translate('co nabízíme')));
        $webStructure->addComponent($services,$services->componentName);

            //services-airwork
            $airwork = new SectionNode('airwork',$this->translator->translate('Letecké práce'), ':Front:AirWork:');
            $services->addComponent($airwork,$airwork->componentName);

                //services-airwork-assembly
                $assembly = new SectionNode('assembly',$this->translator->translate('Stavby a montáže'), ':Front:Assembly:');
                $airwork->addComponent($assembly,$assembly->componentName);

                //services-airwork-transport
                $transport = new SectionNode('transport',$this->translator->translate('Transport břemen'), ':Front:Transport:');
                $airwork->addComponent($transport,$transport->componentName);

                //services-airwork-limingforests
                $limingforests = new SectionNode('limingforests',$this->translator->translate('Vápnění lesů'), ':Front:LimingForests:');
                $airwork->addComponent($limingforests,$limingforests->componentName);

                //services-airwork-timberharvesting
                $timberharvesting = new SectionNode('timberharvesting',$this->translator->translate('Těžba dřeva'), ':Front:TimberHarvesting:');
                $airwork->addComponent($timberharvesting,$timberharvesting->componentName);

                //services-airwork-aerialspraying
                $aerialspraying = new SectionNode('aerialspraying',$this->translator->translate('Letecké postřiky'), ':Front:AerialSpraying:');
                $airwork->addComponent($aerialspraying,$aerialspraying->componentName);

                //services-airwork-inspectingflights
                $inspectingflights = new SectionNode('inspectingflights',$this->translator->translate('Kontrolní lety'), ':Front:InspectingFlights:');
                $airwork->addComponent($inspectingflights,$inspectingflights->componentName);

                //services-airwork-photoflight
                $photoflight = new SectionNode('photoflight',$this->translator->translate('Fotolety a filmování'), ':Front:PhotoFlight:');
                $airwork->addComponent($photoflight,$photoflight->componentName);

                //services-airwork-paraschuting
                $paraschuting = new SectionNode('paraschuting',$this->translator->translate('Paravýsadky'), ':Front:Paraschuting:');
                $airwork->addComponent($paraschuting,$paraschuting->componentName);

                //services-airwork-helitaxi
                $helitaxi = new SectionNode('helitaxi',$this->translator->translate('Přeprava osob'), ':Front:Helitaxi:');
                $airwork->addComponent($helitaxi,$helitaxi->componentName);

                //services-airwork-firefighting
                $firefighting = new SectionNode('firefighting',$this->translator->translate('Hašení požárů'), ':Front:FireFighting:');
                $airwork->addComponent($firefighting,$firefighting->componentName);

                //services-airwork-outdoor
                $outdoor = new SectionNode('outdoor',$this->translator->translate('Outdoorové akce'), ':Front:Outdoor:');
                $airwork->addComponent($outdoor,$outdoor->componentName);

            //services-flyingschool
            $flyingschool = new SectionNode('flyingschool',$this->translator->translate('Letecké škola'), ':Front:FlyingSchool:');
            $services->addComponent($flyingschool,$flyingschool->componentName);

               /* //services-flyingschool-application
                $application = new SectionNode('application',$this->translator->translate('Přihláška'), ':Front:FlyingSchool:application');
                $flyingschool->addComponent($application,$application->componentName);*/

            //services-sightseeingflight
            $sightseeingflight = new SectionNode('sightseeingflight',$this->translator->translate('Vyhlídkové lety'), ':Front:SightseeingFlight:');
            $services->addComponent($sightseeingflight,$sightseeingflight->componentName);

            //services-servicecenter
            $servicecenter = new SectionNode('servicecenter',$this->translator->translate('Servisní středisko'), ':Front:ServiceCenter:');
            $services->addComponent($servicecenter,$servicecenter->componentName);

            //services-advertisement
            $advertisement = new SectionNode('advertisement',$this->translator->translate('Reklama, reklamní lety'), ':Front:Advertisement:');
            $services->addComponent($advertisement,$advertisement->componentName);


        //helicopters
        $helicopters = new SectionNode('helicopters',$this->translator->translate('Vrtulníky'), ':Front:Helicopters:',NULL,array('subheading' => $this->translator->translate('mi-8, r22, r44, md520')));
        $webStructure->addComponent($helicopters,$helicopters->componentName);

            //helicopters-mi8
            $mi8 = new SectionNode('mi8',$this->translator->translate('Mi - 8'), ':Front:Mi8:');
            $helicopters->addComponent($mi8,$mi8->componentName);

            //helicopters-r22
            $r22 = new SectionNode('r22',$this->translator->translate('Robinson R22'), ':Front:R22:');
            $helicopters->addComponent($r22,$r22->componentName);

            //helicopters-r44
            $r44 = new SectionNode('r44',$this->translator->translate('Robinson R44'), ':Front:R44:');
            $helicopters->addComponent($r44,$r44->componentName);

            //helicopters-md520n
            $md520n = new SectionNode('md520n',$this->translator->translate('MD 520 N'), ':Front:Md520n:');
            $helicopters->addComponent($md520n,$md520n->componentName);

        //reference
        $reference = new SectionNode('reference',$this->translator->translate('Reference'), ':Front:Reference:',NULL,array('subheading' => $this->translator->translate('některé z realizovaných zakázek')));
        $webStructure->addComponent($reference,$reference->componentName);

            //reference-assembly
            $assembly = new SectionNode('assembly',$this->translator->translate('Stavby a montáže'), ':Front:Reference:assembly');
            $reference->addComponent($assembly,$assembly->componentName);

            //reference-transport
            $transport = new SectionNode('transport',$this->translator->translate('Transport břemen'), ':Front:Reference:transport');
            $reference->addComponent($transport,$transport->componentName);

            //reference-timberharvesting
            $timberharvesting = new SectionNode('timberharvesting',$this->translator->translate('Těžba dřeva'), ':Front:Reference:timberHarvesting');
            $reference->addComponent($timberharvesting,$timberharvesting->componentName);

            //reference-photoflight
            $photoflight = new SectionNode('photoflight',$this->translator->translate('Fotolety a filmování'), ':Front:Reference:photoFlight');
            $reference->addComponent($photoflight,$photoflight->componentName);

            //reference-limingforests
            $limingforests = new SectionNode('limingforests',$this->translator->translate('Vápnění lesů'), ':Front:Reference:limingForests');
            $reference->addComponent($limingforests,$limingforests->componentName);

            //reference-aerialspraying
            $aerialspraying = new SectionNode('aerialspraying',$this->translator->translate('Zemědělské postřiky'), ':Front:Reference:aerialSpraying');
            $reference->addComponent($aerialspraying,$aerialspraying->componentName);

        //photovideo
        $photovideo = new SectionNode('photovideo',$this->translator->translate('Foto a video'), ':Front:PhotoVideo:',NULL,array('subheading' => $this->translator->translate('foto a video z našich akcí')));
        $webStructure->addComponent($photovideo,$photovideo->componentName);

            //photogallery
            $photogallery = new SectionNode('photogallery',$this->translator->translate('Fotogalerie'), ':Front:Photogallery:');
            $photovideo->addComponent($photogallery,$photogallery->componentName);

            //video
            $video = new SectionNode('video',$this->translator->translate('Video'), ':Front:Video:');
            $photovideo->addComponent($video,$video->componentName);

        //demand
        $demand = new SectionNode('demand',$this->translator->translate('Poptávka'), ':Front:Demand:',NULL,array('subheading' => $this->translator->translate('nezávazná kalkulace')));
        $webStructure->addComponent($demand,$demand->componentName);

        //eshop
       /* $eshop = new SectionNode('eshop',$this->translator->translate('Eshop'), ':Front:Eshop:Default:');
        $webStructure->addComponent($eshop,$eshop->componentName);*/

        //contacts
        $contacts = new SectionNode('contacts',$this->translator->translate('Kontakty'), ':Front:Contacts:');
        $webStructure->addComponent($contacts,$contacts->componentName);
        
        return $webStructure;
   }

}
