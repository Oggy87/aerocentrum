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
class Front_PhotoVideoPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Fotky a videa');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('photovideo'));

        $this->template->newgalleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->where("visible",1)->order("date DESC")->limit("2");
        $this->template->newvideos = BaseModel::fetchAll('video')->where("visible",1)->order("date DESC")->limit("2");
        $this->template->topgalleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->where("visible",1)->order("views DESC")->limit("3");
        $this->template->topvideos = BaseModel::fetchAll('video')->where("visible",1)->order("views DESC")->limit("3");
    }
   

}
