<?php //netteCache[01]000351a:2:{s:4:"time";s:21:"0.45134000 1305206692";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:65:"/var/www/projekty/aero/app/AdminModule/templates/Video.view.latte";i:2;i:1304623892;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Video.view.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'aeols2458m'); unset($_extends);


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb3d20a0e763_js')) { function _lb3d20a0e763_js($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'js', $template->getParams()) ?>
    <script type="text/javascript">
        head.js("http://www.google.com/jsapi",
                "<?php echo $staticUri ?>/js/plupload.full.min.js",
                "<?php echo $staticUri ?>/js/jquery.plupload.queue.js",
                "<?php echo $staticUri ?>/js/cs.js"
        );
    </script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbfd7eecfe23_content')) { function _lbfd7eecfe23_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
        <h1>Video - <?php echo TemplateHelpers::escapeHtml($video['name_']) ?></h1>

<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>


    <div class="clear"></div>

    <div class="controls">
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("confirmForm:confirmDelete!", array('id' => $presenter->getParam('id')))) ?>" class="ajax" id="galleryVideo">Smazat video</a>
        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ;$form = $presenter['videoEditForm'] ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>
    <div class="videoView">
        <div class="video">
            <h2>Video:</h2>
            <?php echo TemplateHelpers::escapeHtml($template->video($video['video_path'], 500, 342)) ?>

        </div>
        <div class="thumb">
            <h2>Náhledový obrázek:</h2>

            <div class="image">
<?php if ($video['thumb_path']): ?>
                <?php echo TemplateHelpers::escapeHtml($template->image($video['thumb_path'], 500, 342, 'foto', FALSE, TRUE, FALSE)) ?>

                <div class="play_button"></div>
<?php endif ?>
            </div>
<?php $_ctrl = $control->getWidget("upload"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderVideoThumb() ?>

        </div>
        
        <div class="clear"></div>

        <h2>Údaje o videu:</h2>
        <div class="videoEditForm">
 
            <!-- hidden fields --><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form->getComponents(TRUE, 'Nette\Forms\HiddenField')) as $contrl): ?>
                <div><?php echo TemplateHelpers::escapeHtml($contrl->control) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            <!-- errors -->
<?php $errors = $form->errors ;if ($errors): call_user_func(reset($_l->blocks['entryerrors']), $_l, get_defined_vars()) ;endif ?>
            <!-- form -->

            <div class="two">
                <div class="item"><?php echo TemplateHelpers::escapeHtml($form['date']->label) ?> <?php echo TemplateHelpers::escapeHtml($form['date']->control) ?></div>
                <div class="item"><?php echo TemplateHelpers::escapeHtml($form['visible']->label) ?> <?php echo TemplateHelpers::escapeHtml($form['visible']->control) ?></div>

                <div class="clear"></div>
            </div>
<?php $langs = BaseModel::fetchAll('language') ?>
            <div class="legend">Název:</div>
            <table>
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($langs) as $lang): ?>
                <tr>
                    <td><?php echo TemplateHelpers::escapeHtml($form['name_'.$lang['id']]->label) ?></td>
                    <td><?php echo TemplateHelpers::escapeHtml($form['name_'.$lang['id']]->control) ?></td>
                </tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            </table>
            <div class="legend">Popis:</div>
            <div class="three">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($langs) as $lang): ?>
                <div class="item">
                    <div><?php echo TemplateHelpers::escapeHtml($form['description_'.$lang['id']]->label) ?></div>
                    <div><?php echo TemplateHelpers::escapeHtml($form['description_'.$lang['id']]->control) ?></div>
                </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                <div class="clear"></div>
            </div>
            <div class="send"><?php echo TemplateHelpers::escapeHtml($form['send']->control) ?></div>
            
        </div>
        <div class="clear"></div>
    </div>
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>
    
<?php $_ctrl = $control->getWidget("confirmForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    
</div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb54d9d2a34d_breadcrumbs')) { function _lb54d9d2a34d_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Video:default")) ?>">Přehled videií</a>

            <span> » </span>
            <span><?php echo TemplateHelpers::escapeHtml($video['name_']) ?></span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lbc7a9c59ed3_flashMessage')) { function _lbc7a9c59ed3_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb9c9b5eaefc__flashMessage')) { function _lb9c9b5eaefc__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block entryerrors
//
if (!function_exists($_l->blocks['entryerrors'][] = '_lb229ce029ed_entryerrors')) { function _lb229ce029ed_entryerrors($_l, $_args) { extract($_args)
?>
                <ul class="error">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($errors) as $error): ?>
                    <li><?php echo TemplateHelpers::escapeHtml($error) ?></li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                </ul>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb27b03f5d8b_scripts')) { function _lb27b03f5d8b_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {

    $(document).ready(function(){

        $('#galleryVideo').button({
                icons: {
                    primary: 'ui-icon-trash'
                }
            })
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
$title = 'video - '.$video['name_'] ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
