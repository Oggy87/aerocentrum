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
class Front_AerialSprayingPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Letecké postřiky');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-aerialspraying'));
    }

}
