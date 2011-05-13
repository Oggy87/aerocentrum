<?php //netteCache[01]000351a:2:{s:4:"time";s:21:"0.73306800 1305208536";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:65:"/var/www/projekty/aero/app/AdminModule/templates/Photo.view.latte";i:2;i:1304526226;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Photo.view.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'a6znt7tv8f'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lbc1c84dbec6_css')) { function _lbc1c84dbec6_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('admin.confirmform.css') ;
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb07f1dc3509_content')) { function _lb07f1dc3509_content($_l, $_args) { extract($_args)
?>
<div id="gallery">
        <h1>Fotogalerie - <?php echo TemplateHelpers::escapeHtml($gallery['name_']) ?></h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>

    <div class="top-m">
            </div>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <a id="upload" href="<?php echo TemplateHelpers::escapeHtml($control->link("upload")) ?>">Nahrát foto</a>

            <div id="dialog-editForm">Upravit galerii</div>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("confirmForm:confirmDelete!", array('id' => $presenter->getParam('id')))) ?>" class="ajax" id="galleryDelete">Smazat galerii</a>
        </div>
        
        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>
<div id="<?php echo $control->getSnippetId('photos') ?>"><?php call_user_func(reset($_l->blocks['_photos']), $_l, $template->getParams()) ?></div>
    <div id="editForm">
<div id="<?php echo $control->getSnippetId('galleryEditForm') ?>"><?php call_user_func(reset($_l->blocks['_galleryEditForm']), $_l, $template->getParams()) ?></div>    </div>

<?php $_ctrl = $control->getWidget("confirmForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

    </div>
<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb917124c8da_breadcrumbs')) { function _lb917124c8da_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Photo:default")) ?>">Přehled galerií</a>

            <span> » </span><?php if ($gallery['type'] == GalleryModel::STORAGE): ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("storage", array('id' => NULL))) ?>">úložné</a>
<?php endif ;if ($gallery['type'] == GalleryModel::WEB): ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("default", array('id' => NULL))) ?>">webové</a>
<?php endif ?>
            <span> » </span>
            <span><?php if ($gallery['date']): echo TemplateHelpers::escapeHtml($template->date($gallery['date'])) ?> - <?php endif ;echo TemplateHelpers::escapeHtml($gallery['name_']) ?></span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lb5df9589a73_flashMessage')) { function _lb5df9589a73_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb8a359e9733__flashMessage')) { function _lb8a359e9733__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block _photos
//
if (!function_exists($_l->blocks['_photos'][] = '_lb1a0dce71d5__photos')) { function _lb1a0dce71d5__photos($_l, $_args) { extract($_args); $control->validateControl('photos')
?>
    <div class="fotos">

<?php if ($photos->count("*") > 0): $_ctrl = $control->getWidget("photos"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;foreach ($iterator = $_l->its[] = new SmartCachingIterator($photos) as $photo): ?>
            <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('foto', $iterator->isEven() ? 'last':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                <div class="img">
                    <?php echo TemplateHelpers::escapeHtml($template->image($photo['picture_path'], '260', '170', $photo['description_'], TRUE, FALSE)) ?>

                    <a class="rotate-clockwise ajax" title="Otočit o 90° ve směru hod. ručiček" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('photo_id' => $photo['id'] ,'direction' => '-90'))) ?>"></a>

                    <a class="rotate-counterclockwise ajax" title="Otočit o 90° proti směru hod. ručiček" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('photo_id' => $photo['id'],'direction' => '90'))) ?>"></a>

                </div>
                <div class="count"><?php echo TemplateHelpers::escapeHtml($iterator->getCounter()) ?>.</div>
                <div class="form">
                    <div><?php echo TemplateHelpers::escapeHtml($control['photos']['photo'][$photo['id']]['description_'.$presenter->lang]->label) ?></div>
                    <div><?php echo TemplateHelpers::escapeHtml($control['photos']['photo'][$photo['id']]['description_'.$presenter->lang]->control) ?></div>
                    <div><?php echo $control['photos']['photo_id']->getControl($photo['id']) ?>

                         <?php echo TemplateHelpers::escapeHtml($control['photos']['photo_id']->label) ?>

                    </div>
                    <div><?php echo TemplateHelpers::escapeHtml($control['photos']['photo'][$photo['id']]['delete']->control) ?>

                         <?php echo TemplateHelpers::escapeHtml($control['photos']['photo'][$photo['id']]['delete']->label) ?>

                    </div>
                </div>
                <div class="clear"></div>
            </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            <div class="clear"></div>
            <div class="submitForm">
                <?php echo TemplateHelpers::escapeHtml($control['photos']['save']->control) ?>

            </div>
<?php $_ctrl = $control->getWidget("photos"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ;else: ?>
            <div class="notice">Žádné foto zatím nebylo nahráno.</div>
<?php endif ?>
        <div class="clear"></div>
    </div>
<?php
}}


//
// block _galleryEditForm
//
if (!function_exists($_l->blocks['_galleryEditForm'][] = '_lb4995313747__galleryEditForm')) { function _lb4995313747__galleryEditForm($_l, $_args) { extract($_args); $control->validateControl('galleryEditForm')
;if ($gallery['type'] == GalleryModel::WEB): $_ctrl = $control->getWidget("galleryEditForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;else: $_ctrl = $control->getWidget("galleryStorageEditForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;endif ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb416c607477_scripts')) { function _lb416c607477_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {
    $(document).ready(function(){

        $('#upload').button({
            icons: {
                primary: 'ui-icon-image'
            }
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


        $('#galleryDelete').button({
                icons: {
                    primary: 'ui-icon-trash'
                }
            })
            .click(function() {
                        $('#snippet-confirmForm-').dialog('open');
            });

        $('#frmgalleryEditForm-send').button();
        $('#frmfotos-ulozit').button();

        $('#dialog-editForm')
            .button({
                icons: {
                    primary: 'ui-icon-pencil'
                }
            })
            .click(function() {
                        $('#editForm').dialog('open');
            });

        $("#editForm").dialog("destroy");


        $("#editForm").dialog({
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
$title = 'fotogalerie - '.$gallery['name_'] ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
