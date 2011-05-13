<?php //netteCache[01]000355a:2:{s:4:"time";s:21:"0.49524300 1305276703";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:69:"/var/www/projekty/aero/app/FrontModule/templates/Demand.default.latte";i:2;i:1302595152;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Demand.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'w5369hznlq'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lbe3608e6ac5_main')) { function _lbe3608e6ac5_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <div id="demand">
        <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Poptávka nezávazné kalkulace'))) ?></h1>

        <p class="intro cufon">Nechte si sestavit nezávaznou kalkulaci Váší zakázky. Vyplňte následující formulář
        a my Vás budeme kontaktovat s konkrétním řešením.</p>
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
        <div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $form = $control['demandForm'] ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>

        <!-- hidden fields --><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form->getComponents(TRUE, 'HiddenField')) as $control): ?>
        <div><?php echo TemplateHelpers::escapeHtml($control->control) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

        <!-- errors -->
<?php $errors = $form->errors ;if ($errors): call_user_func(reset($_l->blocks['errors']), $_l, get_defined_vars()) ;endif ?>

        <table>
            <tr>
                <th><?php echo TemplateHelpers::escapeHtml($form['name']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['name']->control) ?></td>
                <th><?php echo TemplateHelpers::escapeHtml($form['company']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['company']->control) ?></td>
            </tr>
            <tr>
                <th><?php echo TemplateHelpers::escapeHtml($form['email']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['email']->control) ?></td>
                <th><?php echo TemplateHelpers::escapeHtml($form['phone']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['phone']->control) ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th><?php echo TemplateHelpers::escapeHtml($form['service']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['service']->control) ?></td>
            </tr>
        </table>

        <table id="transport1"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form['transport1']->controls) as $item): ?>
            <tr>

                <th><?php echo TemplateHelpers::escapeHtml($item->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($item->control) ?></td>
            </tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </table>

        <table id="transport2"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form['transport2']->controls) as $item): ?>
            <tr>

                <th><?php echo TemplateHelpers::escapeHtml($item->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($item->control) ?></td>
            </tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </table>

        <table id="photoflight"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form['photoflight']->controls) as $item): ?>
            <tr>

                <th><?php echo TemplateHelpers::escapeHtml($item->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($item->control) ?></td>
            </tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </table>

        <table id="helitaxi"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($form['helitaxi']->controls) as $item): ?>
            <tr>

                <th><?php echo TemplateHelpers::escapeHtml($item->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($item->control) ?></td>
            </tr>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </table>

        <table>
            <tr>
                <th><?php echo TemplateHelpers::escapeHtml($form['comment']->label) ?></th>
                <td><?php echo TemplateHelpers::escapeHtml($form['comment']->control) ?></td>
            </tr>
        </table>

        <table class="submit">
            <tr>
                <th>&nbsp;</th>
                <td><?php echo TemplateHelpers::escapeHtml($form['send']->control) ?></td>
            </tr>
        </table>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>
    </div>
</div>
<?php
}}


//
// block errors
//
if (!function_exists($_l->blocks['errors'][] = '_lb79ce612583_errors')) { function _lb79ce612583_errors($_l, $_args) { extract($_args)
?>
        <ul class="error">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($errors) as $error): ?>
            <li><?php echo TemplateHelpers::escapeHtml($error) ?></li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        </ul>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbbee07d9b4e_next')) { function _lbbee07d9b4e_next($_l, $_args) { extract($_args)
?>
<div class="tips">

    <h3 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Naše tipy kam pokračovat ... '))) ?></h3>
    <ul>
        <li>prohlédněte si, co vše jsme Vám <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Services:")) ?>">schopni zajistit »</a></li>
        <li>podívejte se na <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:")) ?>">některé z našich zakázek »</a></li>
        <li>nechte si sestavit <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Demand:")) ?>">nezávaznou kalkulaci »</a></li>
    </ul>
    <ul>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Contacts:")) ?>">kontaktujte nás</a>, rádi Vám na Vaše dotazy zodpovíme »</li>
        <li>prolistujte si naší <a href="<?php echo TemplateHelpers::escapeHtml($control->link("PhotoVideo:")) ?>">foto a video galerií</a> »</li>
    </ul>

    <div class="clear"></div>
</div>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbe5b3cc5b6b_scripts')) { function _lbe5b3cc5b6b_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
        head.ready(function() {
            $("#frmdemandForm-service").selectbox();
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
$_l->extends = '@layout.full.latte' ?>

<?php $description = 'Zpracujeme Vaši nezávaznou potptávku leteckých prací vrtulníkem..' ;$keywords = 'aerocentrum, vrtulník, poptávka' ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
