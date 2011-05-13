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
class Front_Md520nPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Vrtulník MD 520 N');
        $this->template->h1 = $this->translator->translate('MD 520 N');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('helicopters-md520n'));
    }

}
