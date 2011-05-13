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
class Front_PartnersPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Partneři');
        $this->template->h1 = $this->translator->translate('Naši partneři');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('about-partners'));
    }

}
