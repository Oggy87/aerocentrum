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
class Front_R22Presenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Vrtulník Robinson R22');
        $this->template->h1 = $this->translator->translate('Robinson R22');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('helicopters-r22'));
    }

}
