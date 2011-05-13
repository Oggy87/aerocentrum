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
class Front_ArticlePresenter extends Front_BasePresenter
{
    private $article;

    public function startup() {
        parent::startup();

        $this->article = $this->fetchRow('article', $this->getParam('id'));
        if(!$this->article['visible']) throw new InvalidArgumentException("Článek s id '$this->id' není publikován.");
        if(!$this->article) throw new InvalidArgumentException("Článek s id '$this->id' neexistuje.");
    }

    public function renderDefault($id) {

        $this->template->title = $this->article['title'];
        $this->template->h1 = $this->article['heading'];
        $this->template->article = $this->article;

        $this->article->update(array('views' => new NotORM_Literal("views + 1")));

        $parent = $this['webStructure']->getComponent($this->article['section']);

        $article = new NoMenuNode('article'.$this->article['id'], $this->article['heading'], 'Article:', array('id'=> $this->article['id']));
        $parent->addComponent($article,$article->componentName);

        $this['webStructure']->setCurrent($article);

        $this->template->photos = ArticleModel::fetchPhotos($this->article['id']);
        $this->template->videos = ArticleModel::fetchVideos($this->article['id']);
        $this->template->presses = ArticleModel::fetchPress($this->article['id']);
    }
}
