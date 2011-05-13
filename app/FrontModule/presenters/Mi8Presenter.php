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
class Front_Mi8Presenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Vrtulník Mi - 8');
        $this->template->h1 = $this->translator->translate('Mi - 8');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('helicopters-mi8'));
    }

}
