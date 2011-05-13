<?php //netteCache[01]000343a:2:{s:4:"time";s:21:"0.98638700 1305118411";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:57:"/var/www/projekty/aero/app/components/DataGrid/grid.phtml";i:2;i:1304682666;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/DataGrid/grid.phtml

?><?php
$_l = LatteMacros::initRuntime($template, NULL, '2rkrvbe1m0'); unset($_extends);


//
// block _grid
//
if (!function_exists($_l->blocks['_grid'][] = '_lb962dfc1503__grid')) { function _lb962dfc1503__grid($_l, $_args) { extract($_args); $control->validateControl('grid')
?>

<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
<div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if (is_object($control)) $_ctrl = $control; else $_ctrl = $control->getWidget($control); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;if (is_object($control)) $_ctrl = $control; else $_ctrl = $control->getWidget($control); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ;if (is_object($control)) $_ctrl = $control; else $_ctrl = $control->getWidget($control); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('body') ;if (is_object($control)) $_ctrl = $control; else $_ctrl = $control->getWidget($control); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>

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
?><div id="<?php echo $control->getSnippetId('grid') ?>"><?php call_user_func(reset($_l->blocks['_grid']), $_l, $template->getParams()) ?></div><?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
