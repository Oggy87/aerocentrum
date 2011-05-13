<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */



/**
 * Sign in/out presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class Admin_PressPresenter extends Admin_BasePresenter
{

    public $lang;

    /**
    * Get persistent parameters
    *
    * @return array persistents
    */
    public static function getPersistentParams()
    {
        return array('lang');
    }

    public function startup() {
        parent::startup();

        $this->lang = $this->getParam('lang');
        if(!$this->lang) $this->lang = LANG;
        foreach(BaseModel::fetchAll('language') as $lang) {
            $languages[] = $lang['id'];
        }

        if (!in_array($this->lang, $languages))
                throw new InvalidArgumentException("Jazyk '$this->lang' neexistuje.");
    }

    public function renderDefault() {

        $press = BaseModel::fetchAll("press")->order("date DESC");
        $paginator = $this['vpPress']->getPaginator();
        $paginator->itemCount = $press->count('*');
        $press->limit($paginator->itemsPerPage, $paginator->offset);

        $this->template->press = $press;
    }

    public function handleDelete($id) {

        try {
            $press = $this->fetchRow('press', $id);

            $delete = $press->delete();
            if ($delete) {
                $this->flashMessage('Článek smazán.','success');

                $this->redirect('this');
            }
        } catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se článek smazat.','error');
            Debug::log($exc, Debug::ERROR);

            if (!$this->isAjax()) $this->redirect('this');
        }

    }

    public function handleEdit($id) {
        $this['pressEditForm']->setDefaults($this->fetchRow('press', $id));

        $this->invalidateControl('pressEditForm');
    }

    protected function createComponentPressForm($name) {

        $form = new AppForm($this,$name);

        $form->addText('url', 'URL:', 45, 150)
                ->addRule(Form::FILLED, 'Zadejte prosím url.');

        $form->addDatePicker('date', 'Datum:', 15)
                ->addRule(Form::FILLED, 'Zadejte prosím datum.');

        $form->addText('medium', 'Medium:', 45, 150)
                ->addRule(Form::FILLED, 'Zadejte prosím medium.');

        $form->addText('title', 'Nadpis:', 45, 150)
                ->addRule(Form::FILLED, 'Zadejte prosím nadpis.');

        $form->addSubmit('send', 'Uložit');

        $form->onSubmit[] = array($this, 'pressFormSubmit');

        //$form->getElementPrototype()->class('ajax');

        return $form;
    }

    protected function createComponentPressEditForm($name) {

        $form = $this->createComponentPressForm($name);

        $form->addHidden('id');

        $form->onSubmit = array();
        $form->onSubmit[] = array($this, 'pressEditFormSubmit');

        return $form;
    }

     public function pressFormSubmit(Form $form) {
        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;

        try {
            $press = PressModel::insert($entry);
            $this->flashMessage('Článek byl úspěšně přidán.','success');

            $this->redirect('this');
        }
        catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se článek uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }
    }

    public function pressEditFormSubmit(Form $form) {
        $entry = $form->getValues();
        foreach ($entry as & $val) if ($val === '') $val = NULL;

        $press = $this->fetchRow('press', $entry['id']);

        try {
            $press->update($entry);
            $this->flashMessage('Článek byl úspěšně upraven.','success');

            $this->redirect('this');

        } catch (PDOException $exc) {
            $this->flashMessage('Ajaj, nepovedlo se článek uložit.', 'error');
            Debug::log($exc, Debug::ERROR);
        }

    }

    protected function createComponentVpPress($name) {
        $vp = new VisualPaginator();
        $vp->paginator->itemsPerPage = 15;

        return $vp;
    }

    
	
}
