<?php //netteCache[01]000354a:2:{s:4:"time";s:21:"0.14880300 1305201857";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:68:"/var/www/projekty/aero/app/AdminModule/templates/Press.default.latte";i:2;i:1304675308;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Press.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'mpcwop9l72'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbf2840bed4_content')) { function _lbbf2840bed4_content($_l, $_args) { extract($_args)
?>
<div id="press">
    <div class="top-h">
        <h1>Napsali o nás</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>
    </div>
    <div class="top-m">
            </div>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <div class="new">Nový článek</div>
        </div>

        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<?php $_ctrl = $control->getWidget("vpPress"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<div id="<?php echo $control->getSnippetId('videos') ?>"><?php call_user_func(reset($_l->blocks['_videos']), $_l, $template->getParams()) ?></div>
<?php $_ctrl = $control->getWidget("vpPress"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

    <div id="dialog">
<div id="<?php echo $control->getSnippetId('pressForm') ?>"><?php call_user_func(reset($_l->blocks['_pressForm']), $_l, $template->getParams()) ?></div>    </div>

    <div id="dialogEdit">
<div id="<?php echo $control->getSnippetId('pressEditForm') ?>"><?php call_user_func(reset($_l->blocks['_pressEditForm']), $_l, $template->getParams()) ?></div>    </div>
</div>

<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb12e04049a6_breadcrumbs')) { function _lb12e04049a6_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
            <span>Přehled článků v tisku</span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lb5020addacc_flashMessage')) { function _lb5020addacc_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb237440b697__flashMessage')) { function _lb237440b697__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block _videos
//
if (!function_exists($_l->blocks['_videos'][] = '_lba57c558582__videos')) { function _lba57c558582__videos($_l, $_args) { extract($_args); $control->validateControl('videos')
?>
    <div class="press"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($press) as $article): ?>
        <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

            <div class="top"><span class="date"><?php echo TemplateHelpers::escapeHtml($template->date($article['date'])) ?></span><span class="medium"><?php echo TemplateHelpers::escapeHtml($article['medium']) ?></span></div>
            <div class="link"><a href="<?php echo TemplateHelpers::escapeHtml($article['url']) ?>" target="_blank"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('blank'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($article['title']) ?></a></div>
            <div class="actions">
                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("edit!", array('id' => $article['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('ajax','edit'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>editovat</a>

                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("delete!", array('id' => $article['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('ajax','delete'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>smazat</a>

            </div>
            <div class="clear"></div>
        </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </div>
<?php
}}


//
// block _pressForm
//
if (!function_exists($_l->blocks['_pressForm'][] = '_lb9baa15b11f__pressForm')) { function _lb9baa15b11f__pressForm($_l, $_args) { extract($_args); $control->validateControl('pressForm')
;$_ctrl = $control->getWidget("pressForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}


//
// block _pressEditForm
//
if (!function_exists($_l->blocks['_pressEditForm'][] = '_lb5749cde38d__pressEditForm')) { function _lb5749cde38d__pressEditForm($_l, $_args) { extract($_args); $control->validateControl('pressEditForm')
;$_ctrl = $control->getWidget("pressEditForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbe89db0226b_scripts')) { function _lbe89db0226b_scripts($_l, $_args) { extract($_args)
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
            .click(function() {
                        $('#dialog').dialog('open');
            });

        $("#dialog").dialog("destroy");

        $("#dialog").dialog({
                        autoOpen: false,
                        modal: true,
                        title: 'Galerie',
                        width:700
                      /*  buttons: {
                            Uložit: function() {

                                $(this).dialog("close");
                            }
                        }*/
         });

         $("#dialogEdit").livequery( function() {
            $("#dialogEdit").dialog({
			autoOpen: false,
			//height: 300,
			width: 700,
                        title: 'Upravit článek',
			modal: true

            });
         });
         
         $('.edit')
                .click(function() {
                        $('#dialogEdit').dialog('open');
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
$title = 'napsali o nás' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); } ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
