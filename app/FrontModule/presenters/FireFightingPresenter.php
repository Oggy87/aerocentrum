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
class Front_FireFightingPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Hašení požáru vrtulníkem');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-firefighting'));
    }

}
