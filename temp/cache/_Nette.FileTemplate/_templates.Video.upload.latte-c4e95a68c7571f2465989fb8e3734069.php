<?php //netteCache[01]000353a:2:{s:4:"time";s:21:"0.67407600 1305203365";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:67:"/var/www/projekty/aero/app/AdminModule/templates/Video.upload.latte";i:2;i:1305203363;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Video.upload.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'x4825uq9sz'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lbccab679bc3_css')) { function _lbccab679bc3_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('plupload.queue.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lbaf03d45ec0_js')) { function _lbaf03d45ec0_js($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lb8012aea251_content')) { function _lb8012aea251_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
    <h1>Nové video</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>

<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ;$form = $presenter['videoForm'] ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>
    <div class="videoView">
        <div class="video">
            <h2>Nahrát video:</h2>
<?php $_ctrl = $control->getWidget("upload"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderVideo() ?>
            <?php echo TemplateHelpers::escapeHtml($form['video']['tmpname']->control) ?>

            <?php echo TemplateHelpers::escapeHtml($form['video']['name']->control) ?>

        </div>
        <div class="thumb">
            <h2>Nahrát náhledový obrázek:</h2>
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
            <div class="send"><?php if (isset($form['back'])): echo TemplateHelpers::escapeHtml($form['back']->control) ;endif ?> <?php echo TemplateHelpers::escapeHtml($form['send']->control) ?></div>
            
        </div>
        <div class="clear"></div>
    </div>
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>
</div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb3f7d8cbc78_breadcrumbs')) { function _lb3f7d8cbc78_breadcrumbs($_l, $_args) { extract($_args)
?>
    <div id="breadcrumbs">
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Video:default")) ?>">Přehled videií</a>

        <span> » </span>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("upload")) ?>">nahrát video</a>

    </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lb361b951afe_flashMessage')) { function _lb361b951afe_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lbb746bb2472__flashMessage')) { function _lbb746bb2472__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
if (!function_exists($_l->blocks['entryerrors'][] = '_lbdd0d85f544_entryerrors')) { function _lbdd0d85f544_entryerrors($_l, $_args) { extract($_args)
?>
                <ul class="error">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($errors) as $error): ?>
                    <li><?php echo TemplateHelpers::escapeHtml($error) ?></li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                </ul>
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
$title = 'nahrát video' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
