<?php

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Front_WroteAboutUsPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Napsali o nás');
        $this->template->h1 = $this->translator->translate('Napsali o nás');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('about-media'));

        $articles = BaseModel::fetchAll('press')->order('date DESC');
        $paginator = $this['vpArticles']->getPaginator();
        $paginator->itemCount = $articles->count('*');
        $articles->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->articles = $articles;
    }

    protected function createComponentVpArticles($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 10;

        return $vp;
    }


}
