<?php

// budoucí metoda Form::addDatePicker()
function Form_addDatePicker(Form $_this, $name, $label, $cols = NULL, $maxLength = NULL)
{
    return $_this[$name] = new DatePicker($label, $cols, $maxLength);
}

Form::extensionMethod('Form::addDatePicker', 'Form_addDatePicker'); // v PHP 5.2

FormContainer::extensionMethod('FormContainer::addRequestButton', array('RequestButtonHelper','addRequestButton'));
FormContainer::extensionMethod('FormContainer::addRequestButtonBack', array('RequestButtonHelper','addRequestButtonBack'));