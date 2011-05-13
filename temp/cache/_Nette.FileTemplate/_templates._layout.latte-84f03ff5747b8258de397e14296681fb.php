<?php //netteCache[01]000348a:2:{s:4:"time";s:21:"0.89150700 1305191240";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:62:"/var/www/projekty/aero/app/AdminModule/templates/@layout.latte";i:2;i:1305191236;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/AdminModule/templates/@layout.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'va6ljd01hn'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb7c2b06670d_css')) { function _lb7c2b06670d_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('admin.screen.css','jquery-ui/cupertino/jquery-ui-1.8.12.custom.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb4103ea6ec9_js')) { function _lb4103ea6ec9_js($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'js', $template->getParams()) ?>
    <script type="text/javascript">
         head.js("<?php echo $staticUri ?>/js/jquery.blockUI.js",
                 "<?php echo $staticUri ?>/js/jquery.ui.datepicker-cs.js"
          );
    </script>
<?php
}}


//
// block layout
//
if (!function_exists($_l->blocks['layout'][] = '_lb85acca7c2a_layout')) { function _lb85acca7c2a_layout($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['header']), $_l, get_defined_vars()) ?>
    <div class="content">
<?php LatteMacros::callBlock($_l, 'content', $template->getParams()) ?>
        <div class="clear"></div>
    </div>
<?php
}}


//
// block header
//
if (!function_exists($_l->blocks['header'][] = '_lb883375e9ee_header')) { function _lb883375e9ee_header($_l, $_args) { extract($_args)
?>
    <div id="head">

        <div class="user">
            <div>Přihlášen jako <strong><?php echo TemplateHelpers::escapeHtml($user->surname) ?> <?php echo TemplateHelpers::escapeHtml($user->name) ?></strong></div>
            <div class="logged-menu">
                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Settings:")) ?>">Nastavení</a> |
                <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Sign:out")) ?>">Odhlásit</a>

            </div>
        </div>

        <div class="navigation">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Default:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($presenter->linkCurrent ? 'navigation-item-active navigation-item' : 'navigation-item'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>Nástěnka</a>

            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($presenter->isLinkCurrent('Article:*') ? 'navigation-item-active navigation-item' : 'navigation-item'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>Články</a>

            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Photo:", array('id' => NULL))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($presenter->isLinkCurrent('Photo:*') ? 'navigation-item-active navigation-item' : 'navigation-item'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>Foto</a>

            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Video:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($presenter->isLinkCurrent('Video:*') ? 'navigation-item-active navigation-item' : 'navigation-item'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>Video</a>

            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Press:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($presenter->isLinkCurrent('Press:*') ? 'navigation-item-active navigation-item' : 'navigation-item'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>Napsali o nás</a>

        </div>
    </div>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbfc9e6f98c7_scripts')) { function _lbfc9e6f98c7_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">

    head.ready(function() {
        $(document).ready( function() {

            $(document).ajaxStart(function() {
                $.blockUI({ message: '<h1><img src="<?php echo $staticUri ?>/images/admin.busy.gif" /> Chvílí strpení...</h1>' });
            });

            $(document).ajaxStop($.unblockUI);

            $('input.datepicker').datepicker($.datepicker.regional['cs'],{
                duration: 'fast',
                dateFormat: 'd.m.yy',
                changeMonth: true,
                changeYear: true,
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $("input.button:not(.action)").livequery( function() {
                $(this).button();
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
$_l->extends = '../../templates/@layout.latte' ;$robots = 'noindex';$nofollow ;$layout_title = ' administrace Aerocentrum' ?>




<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
