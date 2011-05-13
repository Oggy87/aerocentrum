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
class Front_PhotoFlightPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Fotolety a filmování');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-photoflight'));

        $this->template->video = $this->fetchRow('video', 22);
    }

}
