<?php //netteCache[01]000354a:2:{s:4:"time";s:21:"0.45208000 1305203320";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:68:"/var/www/projekty/aero/app/AdminModule/templates/Video.default.latte";i:2;i:1304686744;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Video.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'fw4ekencs0'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3704096970_content')) { function _lb3704096970_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
    <div class="top-h">
        <h1>Videa</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>
    </div>
    <div class="top-m">
            </div>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <a class="new" href="<?php echo TemplateHelpers::escapeHtml($control->link("upload")) ?>">Nové video</a>

        </div>
        
        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<?php $_ctrl = $control->getWidget("vpVideo"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<div id="<?php echo $control->getSnippetId('videos') ?>"><?php call_user_func(reset($_l->blocks['_videos']), $_l, $template->getParams()) ?></div>
<?php $_ctrl = $control->getWidget("vpVideo"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;$_ctrl = $control->getWidget("confirmForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb3ad0723875_breadcrumbs')) { function _lb3ad0723875_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
            <span>Přehled videií</span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lba2902fb3ee_flashMessage')) { function _lba2902fb3ee_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lbc7d14b9b74__flashMessage')) { function _lbc7d14b9b74__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
?>
	<div id="flashes">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
		<div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
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
if (!function_exists($_l->blocks['_videos'][] = '_lbdd5519c071__videos')) { function _lbdd5519c071__videos($_l, $_args) { extract($_args); $control->validateControl('videos')
?>
    <div class="galleries">
<?php if ($videos->count('*') > 0): foreach ($iterator = $_l->its[] = new SmartCachingIterator($videos) as $video): $modulus = $iterator->getCounter() % 4 ?>
            <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('video', $modulus == 0 ? 'last':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("view", array('id' => $video['id']))) ?>">


<?php $img = Helpers::image($video['thumb_path'],268,178,$video['name_'],FALSE,TRUE,FALSE) ?>
                <?php echo TemplateHelpers::escapeHtml($img) ?>

                    <div class="play_button"></div>
                    <div class="box">
                        <div class="date"><?php echo TemplateHelpers::escapeHtml($template->date($video['date'])) ?></div>
                        <div class="name"><?php echo TemplateHelpers::escapeHtml($video['name_']) ?></div>
                    </div>
                </a>

                <a class="action edit" href="<?php echo TemplateHelpers::escapeHtml($control->link("view", array('id' => $video['id']))) ?>">editovat</a>

                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("confirmForm:confirmDelete!", array('id' => $video['id']))) ?>" class="ajax action delete">Smazat video</a>
            </div>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;else: ?>
            <div class="notice">Nebylo zatím nahráno žádné video.</div>
<?php endif ?>
        <div class="clear"></div>
    </div>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb43f86a3a55_scripts')) { function _lb43f86a3a55_scripts($_l, $_args) { extract($_args)
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

        $('.delete')
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
$title = 'videogalerie' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
