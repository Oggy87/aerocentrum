<?php //netteCache[01]000359a:2:{s:4:"time";s:21:"0.36571900 1305183645";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:73:"/var/www/projekty/aero/app/FrontModule/templates/Reference.assembly.latte";i:2;i:1302594847;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Reference.assembly.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, '5v4ars0zxz'); unset($_extends);

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
$_l->extends = $layout ?>

<?php $description = 'Reference ze stavebních a montážních výškových pracích vrtulníky společnosti Aerocentrum.' ;$keywords = 'aerocentrum, vrtulník, stavení práce, výškové práce, montážní práce' ;
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
