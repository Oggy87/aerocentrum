<?php //netteCache[01]000353a:2:{s:4:"time";s:21:"0.38857600 1305208414";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:67:"/var/www/projekty/aero/app/AdminModule/templates/Photo.upload.latte";i:2;i:1304527892;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Photo.upload.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, '3mhsb7m8fs'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb231be9c16c_css')) { function _lb231be9c16c_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('plupload.queue.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb3357d0e92a_js')) { function _lb3357d0e92a_js($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lbebaf840315_content')) { function _lbebaf840315_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>
    <div class="controls">

        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<div id="<?php echo $control->getSnippetId('multi') ?>"><?php call_user_func(reset($_l->blocks['_multi']), $_l, $template->getParams()) ?></div>
</div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb7fd699b6d1_breadcrumbs')) { function _lb7fd699b6d1_breadcrumbs($_l, $_args) { extract($_args)
?>
    <div id="breadcrumbs">
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Photo:default")) ?>">Přehled galerií</a>

        <span> » </span><?php if ($gallery['type'] == GalleryModel::WEB): ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("storage")) ?>">úložné</a>
<?php endif ;if ($gallery['type'] == GalleryModel::WEB): ?>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("default")) ?>"></a>
<?php endif ?>
        <span> » </span>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Photo:view", array('id' => $gallery['id']))) ?>">

            <?php if ($gallery['date']): echo TemplateHelpers::escapeHtml($template->date($gallery['date'])) ?> - <?php endif ;echo TemplateHelpers::escapeHtml($gallery['name_']) ?>

        </a>

        <span> » </span>
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("upload")) ?>">nahrát fotky</a>

    </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lbc77cb7338f_flashMessage')) { function _lbc77cb7338f_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb6b5b6053d1__flashMessage')) { function _lb6b5b6053d1__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block _multi
//
if (!function_exists($_l->blocks['_multi'][] = '_lb80e93af168__multi')) { function _lb80e93af168__multi($_l, $_args) { extract($_args); $control->validateControl('multi')
;$_ctrl = $control->getWidget("multiUploadForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;$_ctrl = $control->getWidget("multiUpload"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderPhoto() ?>
       <?php echo TemplateHelpers::escapeHtml($control['multiUploadForm']['save']->control) ?>

<?php $_ctrl = $control->getWidget("multiUploadForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
$title = 'nahrát fotky - '.$gallery['name_'] ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
