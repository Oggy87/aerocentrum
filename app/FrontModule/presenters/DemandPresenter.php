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
class Front_DemandPresenter extends Front_BasePresenter
{

    public function renderDefault() {
        $this->template->title = $this->translator->translate('Poptávka nezávazné kalkualce');
        $this['webStructure']->setCurrent($this['webStructure']->getComponent('demand'));
    }

    public function  createComponentDemandForm($name) {
        $form = new AppForm($this, $name);
        $form->setTranslator($this->translator);

        $form->addText('name','Jméno:')
                ->setRequired('Vyplňte prosím Vaše jméno.');
        $form->addText('email', 'Email:')
                ->setType('email')
                ->setRequired('Vyplňte prosím Váš email.');
        $form->addText('phone', 'Telefon:');
        $form->addText('company', 'Firma:')
                ->setRequired('Vyplňte prosím název firmy');
        $services = array('Transport břemen v podvěsu vrtulníku',
                          'Transport nákladu ve vrtulníku',
                          'Fotolety a filmování',
                          'Přeprava osob');
        $form->addSelect('service','Vyberte druh zakázky:', $services)
                ->skipFirst(' -- ')
                ->setRequired('Vyberte prosím druh zakázky')
                ->addCondition(Form::EQUAL,0)
                    ->toggle('transport1')
                ->addCondition(Form::EQUAL,1)
                    ->toggle('transport2')
                ->addCondition(Form::EQUAL,2)
                    ->toggle('photoflight')
                ->addCondition(Form::EQUAL,3)
                    ->toggle('helitaxi');

        $transport1 = $form->addGroup('transport1');
        $form->setCurrentGroup($transport1);

        $transport1Container = $form->addContainer('transport1');
        $transport1Container->addText('place','Místo zakázky:')
                                ->addConditionOn($form['service'],  Form::EQUAL,0)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím místo.');
        $transport1Container->addText('amount','Počet břemen:')
                                ->addConditionOn($form['service'],  Form::EQUAL,0)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím počet břemen.');
        $transport1Container->addText('type','Druh břemene:')
                                ->addConditionOn($form['service'],  Form::EQUAL,0)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím druh břemene.');
        $transport1Container->addText('date','Termín:')
                                ->addConditionOn($form['service'],  Form::EQUAL,0)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím termín.');

        $transport2 = $form->addGroup('transport2');
        $form->setCurrentGroup($transport2);

        $transport2Container = $form->addContainer('transport2');
        $transport2Container->addText('from','Odkud:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím odkud.');
        $transport2Container->addText('where','Kam:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím kam.');
        $transport2Container->addText('type','Druh nákladu:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte druh nákladu.');
        $transport2Container->addText('weight','Váha nákladu:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím váhu nákladu.');
        $transport2Container->addText('dimension','Rozměry nákladu:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím rozměry nákladu.');
        $transport2Container->addText('amount','Počet břemen:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím počet břemen.');
        $transport2Container->addText('date','Termín:')
                                ->addConditionOn($form['service'],  Form::EQUAL,1)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím termín.');

        $photoflight = $form->addGroup('photoflight');
        $form->setCurrentGroup($photoflight);

        $photoflightContainer = $form->addContainer('photoflight');
        $photoflightContainer->addText('where','Lokalita:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím lokalitu.');
        $photoflightContainer->addText('range','Rozsah filmování/focení:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím rozsah filmování/focení.');
        $photoflightContainer->addText('persons','Požadovaný počet osob na palubě:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím požadovaný počet osob na palubě.');
        $photoflightContainer->addText('date','Termín:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím termín.');

        $helitaxi = $form->addGroup('helitaxi');
        $form->setCurrentGroup($helitaxi);

        $helitaxiContainer = $form->addContainer('helitaxi');
        $helitaxiContainer->addText('persons','Požadovaný počet osob:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím požadovaný počet osob.');
        $helitaxiContainer->addText('from','Odkud:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím odkud.');
        $helitaxiContainer->addText('where','Kam:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím kam.');
        $helitaxiContainer->addText('date','Termín:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím termín.');
        $helitaxiContainer->addText('time','Čas:')
                                ->addConditionOn($form['service'],  Form::EQUAL,2)
                                    ->addRule(Form::FILLED, 'Vyplňte prosím čas.');

        $form->setCurrentGroup();
        $form->addTextArea('comment', 'Poznámka/Vzkaz:');

        $form->addSubmit('send', 'Odeslat » ');
        $form->onSubmit[] = callback($this, 'demandFormSubmitted');
        return $form;
    }

    public function demandFormSubmitted($form) {

        $values = $form->getValues();

        $template = new FileTemplate;
        $template->setFile(APP_DIR.'/templates/mail.demand.latte');
        $template->registerFilter(new LatteFilter);
        $template->form =  $values;

        $services = array('Transport břemen v podvěsu vrtulníku',
                          'Transport nákladu ve vrtulníku',
                          'Fotolety a filmování',
                          'Přeprava osob');
        $template->services = $services;

        $mail = new Mail();
        $mail->setFrom($form['email']->getValue());
        $mail->addReplyTo('info@aerocentrum.cz <info@aerocentrum.cz>');
        //$mail->addTo('info@aerocentrum.cz');
        $mail->addTo('petr.ogurcak@gmail.com');
        $mail->setEncoding('utf-8');
        $mail->setSubject('Poptávka nezávazné kalkulace - '. $values['name']);
        $mail->setHtmlBody($template);
        
        try {
            $mail->send();
            $this->flashMessage('Váše poptávka byla odeslána.', 'success');
        }
        catch (InvalidStateException $e) {
            $this->flashMessage('Odeslání Vaší poptávky se nezdařilo. Kontaktujte nás prosím jinou na emailové adrese info@aerocentrum.cz', 'error');
        }
        
        $this->redirect('this');
    }

}
