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
class Front_PhotogalleryPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Fotogalerie');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('photovideo-photogallery'));

        $galleries = GalleryModel::fetchGalleries(GalleryModel::WEB)->where("visible",1)->order("date DESC");
        $paginator = $this['vpGalleries']->getPaginator();
        $paginator->itemCount = $galleries->count('*');
        $galleries->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->galleries = $galleries;
    }

    public function renderView($id,$slug='') {
        $this->template->gallery = $this->fetchRow('gallery', $id);

        if(!$this->template->gallery['visible']) throw new InvalidArgumentException("Galerie s id '$id' není publikována.");
        if(!$this->template->gallery) throw new InvalidArgumentException("Galerie s id '$id' neexistuje.");

        $this->template->title = $this->template->gallery['name_'];

        $this->checkSlug($this->template->gallery['name_']);
        $this->lastModified($this->template->gallery['modified']);

        $this->template->gallery->update(array('views' => new NotORM_Literal("views + 1")));

        $parent = $this['webStructure']->getComponent('photovideo-photogallery');

        $gallery = new NoMenuNode('gallery'.$this->template->gallery['id'], $this->template->gallery['name_'], 'Photogallery:view', array('id'=> $this->template->gallery['id']));
        $parent->addComponent($gallery,$gallery->componentName);

        $this['webStructure']->setCurrent($gallery);

        $this->template->photos = $this->template->gallery->photo();
        
    }

    protected function createComponentVpGalleries($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 8;

        return $vp;
    }

}
