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
class Front_FlyingSchoolPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Pilotní škola');
        $this->template->h1 = $this->translator->translate('Letecká škola vrtulníky');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-flyingschool'));
    }

    public function renderApplication() {
        $this->template->title = $this->translator->translate('Pilotní škola - přihláška');
        $this->template->h1 = $this->translator->translate('Přihláška do pilotní školy');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('services-flyingschool-application'));
    }

}
