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
class Front_ServicesPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Služby');
        $this->template->h1 = $this->translator->translate('Služby');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services'));
    }

}
