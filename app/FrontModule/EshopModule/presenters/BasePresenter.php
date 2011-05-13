<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */


/**
 * Base class for all application presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
abstract class Front_Eshop_BasePresenter extends Front_BasePresenter
{
    protected function startup() {
        parent::startup();

        $session = Environment::getSession();
        if (!$session->isStarted()) {
            $session->start();
        }

        $user = Environment::getUser();
        $user->setNamespace('front');

        $user->onLoggedIn[] = array($this, 'convertBasketToDb');
        $user->onLoggedOut[] = array($this, 'convertBasketFromDb');

    }

    public function  beforeRender() {
        parent::beforeRender();

        $user = Environment::getUser();
        $user->setNamespace('front');

        if($user->isLoggedIn()) {
            $this->template->basket = BasketModel::fetchBasket($user->getId());
        }
        else {
            $this->template->basket = Environment::getSession('basket');
            $this->template->basketsum = 0;

            foreach(Environment::getSession('basket') as $product_id => $amount) {
                $product = $this->fetchRow('product', $product_id);
                $this->template->basketsum += $amount * $product['price'];
            }
        }

        $this->template->layout_title = 'Aerocentrum e-shop';

        $this->template->registerHelper('currencyKc', 'Helpers::currencyKc');
    }

    public function handleAddToBasket($product_id,$amount = 1) {
        $user = Environment::getUser();
        $user->setNamespace('front');

        $basket = Environment::getSession('basket');

        if($user->isLoggedIn()) {
            if (!BasketModel::addToBasket(array($product_id => $amount), $user->getId())) {
                $this->flashMessage('Nepodařilo se zboží přidat do košíku', 'error');
            }
        }
        else {
            if ($basket[intval($product_id)]) {
                $basket[intval($product_id)] += $amount;
            }
            else {
                $basket[intval($product_id)] = intval($amount);
            }
        }

    }

    public function convertBasketToDb($user) {
        $basket = Environment::getSession('basket');

        BasketModel::intoBasket($basket, $user->getId());

    }

    public function convertBasketFromDb($user) {
        $basket = Environment::getSession('basket');

        $basketdb = BasketModel::fetchBasket($user->getId());
        foreach($basketdb as $basket_product) {
            $basket[$basket_product['product_id']] = $basket_product['amount'];
        }
    }

    /**
     * Sign in form component factory.
     * @return AppForm
     */
    protected function createComponentSignInForm() {
        $form = new AppForm;
        $form->addText('email', 'Email:')
                ->setType('email')
                ->addRule(AppForm::FILLED)
                ->addCondition(AppForm::FILLED)
                ->addRule(AppForm::EMAIL);

        $form->addPassword('password', 'Password:')
                ->addRule(AppForm::FILLED);

        $form->addSubmit('send', 'Sign in');

        $form->onSubmit[] = callback($this, 'signInFormSubmitted');
        return $form;
    }

    public function signInFormSubmitted($form) {
        try {
            $values = $form->getValues();
            $this->getUser()->setExpiration('+ 14 days', FALSE);

            $this->getUser()->login($values['email'], $values['password']);

            //$this->getApplication()->restoreRequest($this->backlink);
            $this->redirect('this');
        } catch (AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }

    public function actionOut() {
        $this->getUser()->logout();
        $this->flashMessage('Byl jste odhlášen.');
        $this->redirect(':Front:Homepage:');
    }
}
