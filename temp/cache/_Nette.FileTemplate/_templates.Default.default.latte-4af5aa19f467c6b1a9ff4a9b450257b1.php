<?php //netteCache[01]000356a:2:{s:4:"time";s:21:"0.03626800 1305271373";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:70:"/var/www/projekty/aero/app/AdminModule/templates/Default.default.latte";i:2;i:1304410763;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Default.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'y8sqtnz4ld'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9da9fe7bfc_content')) { function _lb9da9fe7bfc_content($_l, $_args) { extract($_args)
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
$title = 'nástěnka' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
