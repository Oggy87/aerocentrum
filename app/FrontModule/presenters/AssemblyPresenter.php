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
class Front_AssemblyPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Stavby a montáže vrtulníkem');

        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-airwork-assembly'));
    }

}
