<?php //netteCache[01]000349a:2:{s:4:"time";s:21:"0.06146000 1305148668";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:63:"/var/www/projekty/aero/app/AdminModule/templates/@article.latte";i:2;i:1305148585;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/@article.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, '3gfgzi2afl'); unset($_extends);


//
// block entryerrors
//
if (!function_exists($_l->blocks['entryerrors'][] = '_lb004428b67a_entryerrors')) { function _lb004428b67a_entryerrors($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['_perexPhoto'][] = '_lbee313aacb5__perexPhoto')) { function _lbee313aacb5__perexPhoto($_l, $_args) { extract($_args); $control->validateControl('perexPhoto')
;if (isset($image)): ?>
                        <?php echo TemplateHelpers::escapeHtml($image) ?>

                        <a class="rotate-clockwise ajax" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('direction' => '-90', 'image' => $file))) ?>" title="Otočit o 90° ve směru hod. ručiček"></a>
                        <a class="rotate-counterclockwise ajax" href="<?php echo TemplateHelpers::escapeHtml($control->link("rotate!", array('direction' => '90', 'image' => $file))) ?>" title="Otočit o 90° proti směru hod. ručiček"></a>
<?php else: ?>
                        <div class="empty ui-widget-overlay"></div>
<?php endif ;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>

<?php $errors = $form->errors ;if ($errors): if (!$_l->extends) { call_user_func(reset($_l->blocks['entryerrors']), $_l, get_defined_vars()); }  endif ?>

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

    <?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ;
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
