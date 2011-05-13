<?php //netteCache[01]000348a:2:{s:4:"time";s:21:"0.79366500 1305121843";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:62:"/var/www/projekty/aero/app/AdminModule/templates/Sign.in.latte";i:2;i:1304410530;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Sign.in.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, '3bq0dny3jv'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lbc24bb97c71_css')) { function _lbc24bb97c71_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('admin.screen.css') ;
}}


//
// block layout
//
if (!function_exists($_l->blocks['layout'][] = '_lbfdfba392b8_layout')) { function _lbfdfba392b8_layout($_l, $_args) { extract($_args)
?>
<div id="login">
    <div id="login-content">
        <h1>Administrace</h1>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>
        <div class="web">www.aerocentrum.cz</div>
<?php $_ctrl = $control->getWidget("signInForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    </div>
</div>


<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lbfc5cfab2b7_flashMessage')) { function _lbfc5cfab2b7_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb9a4eff67be__flashMessage')) { function _lb9a4eff67be__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
;foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
                <div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                    <!--
                    <div class="flash info">Info message.</div>
                    <div class="flash success">Success message.</div>
                    <div class="flash warning">Warning message.</div>
                    <div class="flash error">Error message.</div>
                    <div class="flash validation">Validation message.</div>
                    -->
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
$_l->extends = '../../templates/@layout.latte' ?>

<?php $robots = 'noindex, nofollow' ?>

<?php $layout_title = ' administrace Aerocentrum' ?>

<?php $title = 'Administrace' ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
