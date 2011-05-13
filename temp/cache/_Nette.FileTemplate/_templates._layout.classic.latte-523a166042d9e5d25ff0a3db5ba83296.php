<?php //netteCache[01]000356a:2:{s:4:"time";s:21:"0.68756600 1305142867";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:70:"/var/www/projekty/aero/app/FrontModule/templates/@layout.classic.latte";i:2;i:1299789785;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/@layout.classic.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'kufaoqoc5v'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb206f10d500_content')) { function _lb206f10d500_content($_l, $_args) { extract($_args)
?>
<div id="classic">

<?php $_ctrl = $control->getWidget("webStructure"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderBreadcrumbs() ?>

    <div class="page">
        <div class="content">
            <div class="main-panel text">
<?php LatteMacros::callBlock($_l, 'main', $template->getParams()) ?>
                <?php call_user_func(reset($_l->blocks['next']), $_l, get_defined_vars()) ?>

            </div>
            <div class="left-panel">
<?php call_user_func(reset($_l->blocks['leftPanel']), $_l, get_defined_vars()) ?>
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
if (!function_exists($_l->blocks['next'][] = '_lb8206405305_next')) { function _lb8206405305_next($_l, $_args) { extract($_args)
;
}}


//
// block leftPanel
//
if (!function_exists($_l->blocks['leftPanel'][] = '_lb8e651a5372_leftPanel')) { function _lb8e651a5372_leftPanel($_l, $_args) { extract($_args)
;$_ctrl = $control->getWidget("webStructure"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderMenuPage() ;
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
