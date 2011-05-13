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
class Front_Eshop_DefaultPresenter extends Front_Eshop_BasePresenter
{

    public function renderDefault() {
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('eshop'));
    }

}
