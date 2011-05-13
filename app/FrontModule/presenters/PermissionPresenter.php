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
class Front_PermissionPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Naše oprávnění');
        $this->template->h1 = $this->translator->translate('Jmse držiteli příslušných oprávnění');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('about-permission'));
    }

}
