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
class Front_LimingForestsPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Vápnění lesů vrtulníkem');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-limingforests'));
    }

}
