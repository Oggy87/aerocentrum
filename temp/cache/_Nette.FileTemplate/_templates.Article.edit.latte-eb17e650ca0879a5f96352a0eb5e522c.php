<?php //netteCache[01]000353a:2:{s:4:"time";s:21:"0.20489100 1305217024";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:67:"/var/www/projekty/aero/app/AdminModule/templates/Article.edit.latte";i:2;i:1305217005;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Article.edit.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'ymayhi970a'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb175cc35cc8_css')) { function _lb175cc35cc8_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('../texyla/css/style.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lba5bd0015b8_js')) { function _lba5bd0015b8_js($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'js', $template->getParams()) ?>
    <script type="text/javascript">
        head.js("http://www.google.com/jsapi",
                "<?php echo $staticUri ?>/js/plupload.full.min.js",
                "<?php echo $staticUri ?>/js/jquery.plupload.queue.js",
                "<?php echo $staticUri ?>/js/cs.js",
                "<?php echo $staticUri ?>/js/jquery.tourl.js",
                "<?php echo $staticUri ?>/texyla/js/texyla.js",
                "<?php echo $staticUri ?>/texyla/js/selection.js",
                "<?php echo $staticUri ?>/texyla/js/texy.js",
                "<?php echo $staticUri ?>/texyla/js/buttons.js",
                "<?php echo $staticUri ?>/texyla/js/dom.js",
                "<?php echo $staticUri ?>/texyla/js/view.js",
                "<?php echo $staticUri ?>/texyla/js/ajaxupload.js",
                "<?php echo $staticUri ?>/texyla/js/window.js",
                "<?php echo $staticUri ?>/texyla/languages/cs.js",
                "<?php echo $staticUri ?>/texyla/plugins/table/table.js"
        );
    </script>
<?php
}}


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb7b574c5832_content')) { function _lb7b574c5832_content($_l, $_args) { extract($_args)
?>
<div id="article">

    <h1>Články</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>

    <div class="clear"></div>

    <div class="controls">
        <div class="panel">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("confirmForm:confirmDelete!", array('id' => $presenter->getParam('id')))) ?>" class="ajax" id="delete">Smazat článek</a>
        </div>

        <div class="clear"></div>
    </div>
<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?><div id="<?php echo $control->getSnippetId('articleForm') ?>"><?php call_user_func(reset($_l->blocks['_articleForm']), $_l, $template->getParams()) ?></div>    <div id="dialogPhotos">
<div id="<?php echo $control->getSnippetId('dialogPhotos') ?>"><?php call_user_func(reset($_l->blocks['_dialogPhotos']), $_l, $template->getParams()) ?></div>    </div>
</div>

<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb4622eaaae1_breadcrumbs')) { function _lb4622eaaae1_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
             <a href="<?php echo TemplateHelpers::escapeHtml($control->link("default")) ?>">Přehled článků</a>

            <span> » </span>
            <span>editovat článek</span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lbc9ff5300ae_flashMessage')) { function _lbc9ff5300ae_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lb49f7eeb067__flashMessage')) { function _lb49f7eeb067__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
// block _articleForm
//
if (!function_exists($_l->blocks['_articleForm'][] = '_lb319abec8b8__articleForm')) { function _lb319abec8b8__articleForm($_l, $_args) { extract($_args); $control->validateControl('articleForm')
;if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>

<?php $errors = $form->errors ;if ($errors): call_user_func(reset($_l->blocks['entryerrors']), $_l, get_defined_vars()) ;endif ?>

    <fieldset>
        <legend>Základní nastavení:</legend>
        <div class="row">
            <div class="label">
            <?php echo TemplateHelpers::escapeHtml($form['section']->label) ?>

            </div>
            <div class="control">
            <?php echo TemplateHelpers::escapeHtml($form['section']->control) ?>

            </div>
            <div class="clear"></div>
        </div>

    </fieldset>
    <fieldset>
        <legend>Obsah sekce:</legend>
        <div class="row"  id="date">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['date']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['date']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['heading']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['heading']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['url_slug']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['url_slug']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['perex_html']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['perex_html']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row" id="perexPhoto">
            <div class="label">
                <label class="title" for="frmsectionForm-perexPhoto" title="<p>Úvodní foto.</p>">Foto:</label>
            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['perexPhoto']['name']->control) ?>

                <?php echo TemplateHelpers::escapeHtml($form['perexPhoto']['tmpname']->control) ?>

                <?php echo TemplateHelpers::escapeHtml($form['perexPhoto']['source']->control) ?>

                <?php echo TemplateHelpers::escapeHtml($form['perexPhoto']['direction']->control) ?>

                <div class="actions">
                    <div class="upload">
<?php $_ctrl = $control->getWidget("upload"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderPerexPhoto() ?>
                    </div>
                    <div class="choose">
                        <a id="choosefoto" href="#">vybrat z fotogalerie</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="thumb">
<div id="<?php echo $control->getSnippetId('perexPhoto') ?>"><?php call_user_func(reset($_l->blocks['_perexPhoto']), $_l, $template->getParams()) ?></div>                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['text_html']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['text_html']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Údaje pro vyhledávače:</legend>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['title']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['title']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['description']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['description']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['keywords']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($form['keywords']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Další nastavení:</legend>
        <div class="row">
            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($form['visible']->label) ?>

            </div>
            <div class="control">
                <?php echo $form['visible']->getControl('1') ?>

                <?php echo $form['visible']->getControl('0') ?>

            </div>
            <div class="clear"></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Propojení s články v tisku:</legend>
<?php $containers = $form->getComponent('article_press')->getComponents(FALSE, 'FormContainer') ;foreach ($iterator = $_l->its[] = new SmartCachingIterator($containers) as $container): ?>
        <div class="row">

            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($container['press_id']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($container['press_id']->control) ?>


                <?php echo TemplateHelpers::escapeHtml($container['deleteRowPress']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        <div class="row">
            <?php echo TemplateHelpers::escapeHtml($form['addRowPress']->control) ?>

        </div>
        
    </fieldset>

    <fieldset>
        <legend>Propojení s videi:</legend>
<?php $containers = $form->getComponent('article_video')->getComponents(FALSE, 'FormContainer') ;foreach ($iterator = $_l->its[] = new SmartCachingIterator($containers) as $container): ?>
        <div class="row">

            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($container['video_id']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($container['video_id']->control) ?>


                <?php echo TemplateHelpers::escapeHtml($container['deleteRowVideo']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        <div class="row">
            <?php echo TemplateHelpers::escapeHtml($form['addRowVideo']->control) ?>

        </div>
        <div class="row">
            <?php echo TemplateHelpers::escapeHtml($form['addvideo']->control) ?>

        </div>
    </fieldset>

    <fieldset>
        <legend>Propojení s galerií:</legend>
<?php $containers = $form->getComponent('article_gallery')->getComponents(FALSE, 'FormContainer') ;foreach ($iterator = $_l->its[] = new SmartCachingIterator($containers) as $container): ?>
        <div class="row">

            <div class="label">
                <?php echo TemplateHelpers::escapeHtml($container['gallery_id']->label) ?>

            </div>
            <div class="control">
                <?php echo TemplateHelpers::escapeHtml($container['gallery_id']->control) ?>


                <?php echo TemplateHelpers::escapeHtml($container['deleteRowGallery']->control) ?>

            </div>
            <div class="clear"></div>
        </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        <div class="row">
            <?php echo TemplateHelpers::escapeHtml($form['addRowGallery']->control) ?>

        </div>
    </fieldset>

    <div class="row submit">
        <?php if (isset($form['sendNext'])): echo TemplateHelpers::escapeHtml($form['sendNext']->control) ;endif ?>

        <?php echo TemplateHelpers::escapeHtml($form['send']->control) ?>

    </div>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>

<?php $_ctrl = $control->getWidget("confirmForm"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
}}


//
// block entryerrors
//
if (!function_exists($_l->blocks['entryerrors'][] = '_lb31dbb2a8e9_entryerrors')) { function _lb31dbb2a8e9_entryerrors($_l, $_args) { extract($_args)
?>
    <ul class="error">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($errors) as $error): ?>
        <li><?php echo TemplateHelpers::escapeHtml($error) ?></li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </ul>
<?php
}}


//
// block _perexPhoto
//
if (!function_exists($_l->blocks['_perexPhoto'][] = '_lb9d71bfce33__perexPhoto')) { function _lb9d71bfce33__perexPhoto($_l, $_args) { extract($_args); $control->validateControl('perexPhoto')
;if (isset($image)): ?>
                        <?php echo TemplateHelpers::escapeHtml($image) ?>

                        <a class="rotate-clockwise ajax" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('direction' => '-90', 'image' => $file))) ?>" title="Otočit o 90° ve směru hod. ručiček"></a>
                        <a class="rotate-counterclockwise ajax" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('direction' => '90', 'image' => $file))) ?>" title="Otočit o 90° proti směru hod. ručiček"></a>
<?php else: ?>
                        <div class="empty ui-widget-overlay"></div>
<?php endif ;
}}


//
// block _dialogPhotos
//
if (!function_exists($_l->blocks['_dialogPhotos'][] = '_lb70a688b795__dialogPhotos')) { function _lb70a688b795__dialogPhotos($_l, $_args) { extract($_args); $control->validateControl('dialogPhotos')
;LatteMacros::includeTemplate("dialogPhotos.latte", $template->getParams(), $_l->templates['ymayhi970a'])->render() ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb3c36fd7987_scripts')) { function _lb3c36fd7987_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {
    $(document).ready(function(){

        $('#delete')
            .button({
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

        var defaultOptions = {
            baseDir: '<?php echo $staticUri ?>/texyla',
            previewPath: '<?php echo $presenter->link("Texyla:preview") ?>',
            filesPath: '<?php echo $presenter->link("Texyla:listFiles") ?>',
            filesUploadPath: '<?php echo $presenter->link("Texyla:upload") ?>',
            filesMkDirPath: '<?php echo $presenter->link("Texyla:mkDir") ?>',
            filesRenamePath: '<?php echo $presenter->link("Texyla:rename") ?>',
            filesDeletePath: '<?php echo TemplateHelpers::escapeJs($presenter->link("Texyla:delete")) ?>',

            toolbar: ['h2','h3','h4','bold', 'italic', null, 'ul', 'ol', null, 'sup','sub',null,'link', null, "table", null]
        };

        var perex_options = {
            toolbar: ['bold', 'italic', null,'sup','sub',null,'link']
        }

        $.texyla.setDefaults(defaultOptions);

        $("[name=perex_html]").texyla(perex_options);
        $("[name=text_html]").texyla();

        $('[name=heading]').tourl({ id : 'frmarticleEditForm-url_slug'});

        $('#choosefoto')
            .button({
                icons: {
                    primary: 'ui-icon-triangle-1-s'
                }
        });

        $("#dialogPhotos").dialog("destroy");
        $("#dialogPhotos").dialog({
                        autoOpen: false,
                        modal: true,
                        title: 'Vyberte foto',
                        width:890,
                        height:670,
                        buttons: {
                            Ok: function() {

                                id = $('.fotos > #select > img').attr('id').replace("f","");

                                if (id) {
                                    $.get(<?php echo TemplateHelpers::escapeJs($control->link("getPhoto!")) ?>, {'photo_id': id}, function(payload) {
                                        tmpname = payload.photo;

                                        $.get(<?php echo TemplateHelpers::escapeJs($control->link("imageThumb!")) ?>, {'tmpname': tmpname}, function(payload) {

                                            for(var id in payload.snippets) {
                                                jQuery.nette.updateSnippet(id, payload.snippets[id]);
                                            }
                                            $("[name='perexPhoto[name]']").val(tmpname);
                                            $("[name='perexPhoto[tmpname]']").val(tmpname);

                                            $("[name='perexPhoto[source]']").val('photo');
                                        });
                                    });

                                    $(this).dialog("close");
                                }
                            }

                        }
        });
        $('#choosefoto')
            .click(function() {
                        $('#dialogPhotos').dialog('open');
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
$title = 'editovat článek' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); } ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
