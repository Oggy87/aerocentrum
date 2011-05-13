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
class Front_ReferencePresenter extends Front_BasePresenter
{
    private $section;

    public function actionDefault() {
        $this->template->title = $this->translator->translate('Reference');
        $this->template->h1 = $this->translator->translate('Některé realizované zakázky');

        $this->section = 'reference';
    }

    public function actionAssembly() {
        $this->template->title = $this->translator->translate('Stavební a montážní práce vrtulníkem');
        $this->template->h1 = $this->translator->translate('Stavební a montážní práce vrtulníkem');
        $this->section = 'reference-assembly';
    }

    public function actionTransport() {
        $this->template->title = $this->translator->translate('Transport objemných břemen');
        $this->template->h1 = $this->translator->translate('Transport objemných břemen');
        $this->section = 'reference-transport';
    }

    public function actionTimberHarvesting() {
        $this->template->title = $this->translator->translate('Těžba a transport dřeva');
        $this->template->h1 = $this->translator->translate('Těžba a transport dřeva');
        $this->section = 'reference-timberharvesting';
    }

    public function actionPhotoFlight() {
        $this->template->title = $this->translator->translate('Fotolety a filmování');
        $this->template->h1 = $this->translator->translate('Fotolety a filmování');
        $this->section = 'reference-photoflight';
    }

    public function actionLimingForests() {
        $this->template->title = $this->translator->translate('Vápnění lesů vrtulníkem');
        $this->template->h1 = $this->translator->translate('Vápnění lesů vrtulníkem');
        $this->section = 'reference-limingforests';
    }
    
    public function actionAerialSpraying() {
        $this->template->title = $this->translator->translate('Letecké postřiky pro zemědělství a lesní hospodářství');
        $this->template->h1 = $this->translator->translate('Letecké postřiky pro zemědělství a lesní hospodářství');
        $this->section = 'reference-aerialspraying';
    }

    public function  beforeRender() {
        parent::beforeRender();

        $this['webStructure']->setCurrent($this['webStructure']->getComponent($this->section));

        $articles = ArticleModel::recursiveArticles($this->section, $this->lang)->order('date DESC');
        $paginator = $this['vpArticles']->getPaginator();
        $paginator->itemCount = $articles->count('*');
        $articles->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->articles = $articles;
    }

    protected function createComponentVpArticles($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 4;

        return $vp;
    }

    
}
