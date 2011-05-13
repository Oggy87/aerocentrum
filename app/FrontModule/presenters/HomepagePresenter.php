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
class Front_HomepagePresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Letecké práce vrtulníky');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('home'));

        $this->template->articles = BaseModel::fetchAll('article')
                                        ->where('language_id',$this->lang)
                                        ->where('section LIKE ?','%reference-%')
                                        ->where('visible',1)
                                        ->order('date DESC')
                                        ->limit('4');

        $this->template->video = BaseModel::fetchAll('video')
                                        ->where('visible',1)
                                        ->order('date DESC')
                                        ->limit('1')
                                        ->fetch();
    }

}
