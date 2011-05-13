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
class Front_AdvertisementPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Originální reklama');
        $this->template->h1 = $this->translator->translate('Reklama na vrtulníku');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-advertisement'));
    }

}
