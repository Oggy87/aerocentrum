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
class Front_ContactsPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Kontakty');
        $this->template->h1 = $this->translator->translate('Kontakty');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('contacts'));
    }

    protected function createComponentContactForm($name) {

        $form = new AppForm($this, $name);

        $form->addText('name', "Jméno:");

        $form->addText('email', "E-mail:")
                ->setType('email')
                ->addRule(Form::FILLED, "Vyplňte e-mail.")
                ->addRule(Form::EMAIL, "Špatný formát e-mailu.")
                ->setEmptyValue("@");

        $form->addText('company', "Společnost:");

        $form->addTextArea('text', "Váš dotaz:", 15, 5)
                ->addRule(Form::FILLED, "Vyplňte zprávu.", 25)
                ->addRule(Form::MIN_LENGTH, "Zpráva je příliš krátká (minimálně %d znaků).", 5)
                ->addRule(Form::MAX_LENGTH, "Zpráva je přílis dlouhá (maximálně %d znaků).", 3000);

        /* OBRAZKOVY SEND BUTTON */
        //$form->addImage('send', Environment::getHttpRequest()->getUri()->baseUri . "/static/images/btn-send-big.png", 'Odeslat zprávu');
        $form->addSubmit('send', "Odeslat");

        $form->onSubmit[] = array($this, 'contactFormSubmitted');

        return $form;
    }

    public function contactFormSubmitted($form) {

        $values = $form->getValues();

        $template = new FileTemplate;
        $template->setFile(APP_DIR.'/templates/mail.contactform.latte');
        $template->registerFilter(new LatteFilter);
        $template->form = $values;

        $mail = new Mail();
        $mail->setFrom($values['email']);
        $mail->addReplyTo('info@aerocentrum.cz <info@aerocentrum.cz>');
        //$mail->addTo('info@aerocentrum.cz');
        $mail->addTo('petr.ogurcak@gmail.com');
        $mail->setEncoding('utf-8');
        $mail->setSubject('Aerocentrum - kontaktní formulář');
        $mail->setHtmlBody($template);
        try {
            $mail->send();
            $this->flashMessage('Váš dotaz byl odeslán.', 'success');
        }
        catch (InvalidStateException $e) {
            $this->flashMessage('Odeslání Vašeho dotazu se nezdařilo.', 'error');
        }

        $this->redirect('this#contactform');
    }

}
