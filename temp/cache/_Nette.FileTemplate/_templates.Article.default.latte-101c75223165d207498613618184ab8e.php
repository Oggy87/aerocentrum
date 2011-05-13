<?php //netteCache[01]000356a:2:{s:4:"time";s:21:"0.86737400 1305118411";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:70:"/var/www/projekty/aero/app/AdminModule/templates/Article.default.latte";i:2;i:1304687316;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Article.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'p0ung7adjz'); unset($_extends);


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb624cabeb75_js')) { function _lb624cabeb75_js($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'js', $template->getParams()) ?>
    <script type="text/javascript">
        head.js("<?php echo $staticUri ?>/js/datagrid.js");
    </script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3f264c6793_content')) { function _lb3f264c6793_content($_l, $_args) { extract($_args)
?>
<div id="press">

    <h1>Články</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <a class="new" href="<?php echo TemplateHelpers::escapeHtml($control->link("new")) ?>">Nový článek</a>

        </div>

        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<div id="<?php echo $control->getSnippetId('articlesGrid') ?>"><?php call_user_func(reset($_l->blocks['_articlesGrid']), $_l, $template->getParams()) ?></div>
<?php $_ctrl = $control->getWidget("confirmForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>

<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lbedd6cf1334_breadcrumbs')) { function _lbedd6cf1334_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
            <span>Přehled článků</span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lbcf8d3c4e39_flashMessage')) { function _lbcf8d3c4e39_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lba8e8298895__flashMessage')) { function _lba8e8298895__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
?>
	<div id="flashes">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
		<div class="flashMessage <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

		<!--
		<div class="flash info">Info message.</div>
		<div class="flash success">Success message.</div>
		<div class="flash warning">Warning message.</div>
		<div class="flash error">Error message.</div>
		<div class="flash validation">Validation message.</div>
		-->

	</div>
<?php
}}


//
// block _articlesGrid
//
if (!function_exists($_l->blocks['_articlesGrid'][] = '_lbb4a8c64c21__articlesGrid')) { function _lbb4a8c64c21__articlesGrid($_l, $_args) { extract($_args); $control->validateControl('articlesGrid')
;$_ctrl = $control->getWidget("articlesGrid"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb4780d559c0_scripts')) { function _lb4780d559c0_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {
    $(document).ready(function(){

        $('.new')
            .button({
                icons: {
                    primary: 'ui-icon-plusthick'
                }
            })

       $('a[title=smazat]')
            .click(function() {
                $('#snippet-confirmForm-').dialog('open');
            });

        $("#snippet-confirmForm-").dialog("destroy");

        $("#snippet-confirmForm-").dialog({
                            autoOpen: false,
                            modal: true,
                            title: 'Potvrzení akce',
                            width:590,
                            buttons: {

                            }
        });

        $("#frmform-no").livequery('click', function(event) {
            $("#snippet-confirmForm-").dialog('close')
        });

    });
    });
    </script>
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
$title = 'články' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); } ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
