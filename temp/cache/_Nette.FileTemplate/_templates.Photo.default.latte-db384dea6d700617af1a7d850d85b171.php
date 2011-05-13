<?php //netteCache[01]000354a:2:{s:4:"time";s:21:"0.70061000 1305207270";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:68:"/var/www/projekty/aero/app/AdminModule/templates/Photo.default.latte";i:2;i:1304524642;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Photo.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'xf0sw25bly'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6f13d54ede_content')) { function _lb6f13d54ede_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
    <div class="top-h">
    <h1>Fotogalerie</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>
    </div>
    <div class="top-m">
        <div class="tabs">
            <div class="tab current">webové</div>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("storage", array('id' => NULL))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('tab'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>úložné</a>

            <div class="clear"></div>
        </div>
            </div>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <div class="dialog-gallery">Nová galerie</div>
        </div>
        
        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<?php $_ctrl = $control->getWidget("vpGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<div id="<?php echo $control->getSnippetId('gallery') ?>"><?php call_user_func(reset($_l->blocks['_gallery']), $_l, $template->getParams()) ?></div>
<?php $_ctrl = $control->getWidget("vpGallery"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

    <div id="dialog">
<div id="<?php echo $control->getSnippetId('galleryForm') ?>"><?php call_user_func(reset($_l->blocks['_galleryForm']), $_l, $template->getParams()) ?></div>    </div>
</div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb249e778ecd_breadcrumbs')) { function _lb249e778ecd_breadcrumbs($_l, $_args) { extract($_args)
?>
    <div id="breadcrumbs">
        <span>přehled galerií</span>
        <span> » </span>
        <span>webové</span>
    </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lb8307fe30a0_flashMessage')) { function _lb8307fe30a0_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lbdfaae7362a__flashMessage')) { function _lbdfaae7362a__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block _gallery
//
if (!function_exists($_l->blocks['_gallery'][] = '_lb7261c7afee__gallery')) { function _lb7261c7afee__gallery($_l, $_args) { extract($_args); $control->validateControl('gallery')
?>
    <div class="galleries">
<?php if ($galleries->count('*') > 0): foreach ($iterator = $_l->its[] = new SmartCachingIterator($galleries) as $gallery): $modulus = $iterator->getCounter() % 4 ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("view", array('id' => $gallery['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('gallery', $modulus == 0 ? 'last':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

<?php if ($gallery['photo_id']): $photo = GalleryModel::fetchPhoto($gallery['photo_id']) ?>
                    <?php echo TemplateHelpers::escapeHtml($template->image($photo['picture_path'], 270, 180, $gallery['name_'], TRUE, TRUE)) ?>

<?php endif ?>
                <div class="box">
                    <div class="date"><?php echo TemplateHelpers::escapeHtml($template->date($gallery['date'])) ?></div>
                    <div class="name"><?php echo TemplateHelpers::escapeHtml($gallery['name_']) ?></div>
                </div>
            </a>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;else: ?>
            <div class="notice">Nebyla zatím vytvořena žádná galerie.</div>
<?php endif ?>
        <div class="clear"></div>
    </div>
<?php
}}


//
// block _galleryForm
//
if (!function_exists($_l->blocks['_galleryForm'][] = '_lbfc63690f6a__galleryForm')) { function _lbfc63690f6a__galleryForm($_l, $_args) { extract($_args); $control->validateControl('galleryForm')
;$_ctrl = $control->getWidget("galleryForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb5a7deb57ae_scripts')) { function _lb5a7deb57ae_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {
    $(document).ready(function(){

        $('.dialog-gallery')
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
$title = 'fotogalerie' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
