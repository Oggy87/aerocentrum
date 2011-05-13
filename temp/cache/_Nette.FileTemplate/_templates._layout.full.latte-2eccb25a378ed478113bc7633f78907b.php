<?php //netteCache[01]000353a:2:{s:4:"time";s:21:"0.52124400 1305276703";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:67:"/var/www/projekty/aero/app/FrontModule/templates/@layout.full.latte";i:2;i:1299859259;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/@layout.full.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'qvlp579xws'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5e1d4e8c9a_content')) { function _lb5e1d4e8c9a_content($_l, $_args) { extract($_args)
?>
<div id="full">

<?php $_ctrl = $control->getWidget("webStructure"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderBreadcrumbs() ?>

    <div class="page">
        <div class="content">
            <div class="main-panel text">
<?php LatteMacros::callBlock($_l, 'main', $template->getParams()) ?>
                <?php call_user_func(reset($_l->blocks['next']), $_l, get_defined_vars()) ?>

            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line-darkblue"></div>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbdb781d386e_next')) { function _lbdb781d386e_next($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
$_l->extends = '@layout.latte' ; 
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
