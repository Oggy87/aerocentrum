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
class Front_InspectingFlightsPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Kontrolní a rekognoskační lety');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-inspectingflights'));
    }

}
