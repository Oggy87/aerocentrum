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
class Front_VideoPresenter extends Front_BasePresenter
{
    public function actionUpdateViews($id) {
        $video = $this->fetchRow('video', $id);
        $video->update(array('views' => new NotORM_Literal("views + 1")));

        $this->terminate();
    }

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Videogalerie');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('photovideo-video'));

        $videos = BaseModel::fetchAll('video')->where("visible",1)->order("date DESC");
        $paginator = $this['vpVideos']->getPaginator();
        $paginator->itemCount = $videos->count('*');
        $videos->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->videos = $videos;
    }

    public function renderView($id,$slug = '') {
        $this->template->video = $this->fetchRow('video', $id);

        if(!$this->template->video['visible']) throw new InvalidArgumentException("Galerie s id '$id' není publikována.");
        if(!$this->template->video) throw new InvalidArgumentException("Galerie s id '$id' neexistuje.");

        $this->template->title = $this->template->video['name_'];
        $this->checkSlug($this->template->video['name_']);
        $this->lastModified($this->template->video['modified']);

        $this->template->video->update(array('views' => new NotORM_Literal("views + 1")));

        $parent = $this['webStructure']->getComponent('photovideo-video');

        $video = new NoMenuNode('video'.$this->template->video['id'], $this->template->video['name_'], 'Video:view', array('id'=> $this->template->video['id']));
        $parent->addComponent($video,$video->componentName);

        $this['webStructure']->setCurrent($video);
        
    }


    protected function createComponentVpVideos($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 8;

        return $vp;
    }



}
