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
class Front_ServiceCenterPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Servisní středisko');
        $this->template->h1 = $this->translator->translate('Servisní středisko');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-servicecenter'));
    }

}
