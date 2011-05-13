<?php //netteCache[01]000355a:2:{s:4:"time";s:21:"0.11367300 1305276759";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:69:"/var/www/projekty/aero/app/FrontModule/templates/Career.default.latte";i:2;i:1302593583;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Career.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'b383xwlryk'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb18a7387b27_main')) { function _lb18a7387b27_main($_l, $_args) { extract($_args)
?>

<?php
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
$_l->extends = '@layout.classic.latte' ?>

<?php $description = 'Volná pracovní místa ve společnosti Aerocentrum' ;$keywords = 'aerocentrum, volná místa, kariéra' ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
