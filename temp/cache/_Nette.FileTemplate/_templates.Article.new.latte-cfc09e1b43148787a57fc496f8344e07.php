<?php //netteCache[01]000352a:2:{s:4:"time";s:21:"0.85941800 1305206769";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:66:"/var/www/projekty/aero/app/AdminModule/templates/Article.new.latte";i:2;i:1305149756;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/Article.new.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'a5ufv34xto'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb6773480c66_css')) { function _lb6773480c66_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('../texyla/css/style.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb596e362a14_js')) { function _lb596e362a14_js($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['content'][] = '_lb238b82e78d_content')) { function _lb238b82e78d_content($_l, $_args) { extract($_args)
?>
<div id="article">

    <h1>Články</h1>
<?php call_user_func(reset($_l->blocks['breadcrumbs']), $_l, get_defined_vars()) ?>

    <div class="clear"></div>

<?php call_user_func(reset($_l->blocks['flashMessage']), $_l, get_defined_vars()) ?>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>

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

    <div class="row submit">
        <?php if (isset($form['sendNext'])): echo TemplateHelpers::escapeHtml($form['sendNext']->control) ;endif ?>

        <?php echo TemplateHelpers::escapeHtml($form['send']->control) ?>

    </div>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>


     <div id="dialogPhotos">
<div id="<?php echo $control->getSnippetId('dialogPhotos') ?>"><?php call_user_func(reset($_l->blocks['_dialogPhotos']), $_l, $template->getParams()) ?></div>    </div>
</div>

<?php
}}


//
// block breadcrumbs
//
if (!function_exists($_l->blocks['breadcrumbs'][] = '_lb7611f8d536_breadcrumbs')) { function _lb7611f8d536_breadcrumbs($_l, $_args) { extract($_args)
?>
        <div id="breadcrumbs">
             <a href="<?php echo TemplateHelpers::escapeHtml($control->link("default")) ?>">Přehled článků</a>

            <span> » </span>
            <span>nový článek</span>
        </div>
<?php
}}


//
// block flashMessage
//
if (!function_exists($_l->blocks['flashMessage'][] = '_lb5e14d3b46e_flashMessage')) { function _lb5e14d3b46e_flashMessage($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_l->blocks['_flashMessage']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _flashMessage
//
if (!function_exists($_l->blocks['_flashMessage'][] = '_lbfca40a54ad__flashMessage')) { function _lbfca40a54ad__flashMessage($_l, $_args) { extract($_args); $control->validateControl('flashMessage')
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
if (!function_exists($_l->blocks['entryerrors'][] = '_lb6ea7a935bd_entryerrors')) { function _lb6ea7a935bd_entryerrors($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['_perexPhoto'][] = '_lbfa8cff8b0e__perexPhoto')) { function _lbfa8cff8b0e__perexPhoto($_l, $_args) { extract($_args); $control->validateControl('perexPhoto')
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
if (!function_exists($_l->blocks['_dialogPhotos'][] = '_lb253536f2d7__dialogPhotos')) { function _lb253536f2d7__dialogPhotos($_l, $_args) { extract($_args); $control->validateControl('dialogPhotos')
;LatteMacros::includeTemplate("dialogPhotos.latte", $template->getParams(), $_l->templates['a5ufv34xto'])->render() ;
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb9f07612c3e_scripts')) { function _lb9f07612c3e_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {
    $(document).ready(function(){

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

        $('[name=heading]').tourl({ id : 'frmarticleForm-url_slug'});

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
$title = 'nový článek' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); } ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
