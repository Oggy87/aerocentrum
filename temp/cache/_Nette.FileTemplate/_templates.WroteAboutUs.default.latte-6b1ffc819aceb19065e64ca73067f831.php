<?php //netteCache[01]000361a:2:{s:4:"time";s:21:"0.11261900 1305276752";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:75:"/var/www/projekty/aero/app/FrontModule/templates/WroteAboutUs.default.latte";i:2;i:1304415093;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/WroteAboutUs.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'zkwkl89ega'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb1c14fdd063_main')) { function _lb1c14fdd063_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Napsali o nás'))) ?></h1>

    <p class="intro cufon">Články v tisku a na internetu.</p>

<?php $_ctrl = $control->getWidget("vpArticles"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
    <div class="press"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($articles) as $article): ?>
        <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

            <div><span class="date"><?php echo TemplateHelpers::escapeHtml($template->date($article['date'])) ?></span><span class="medium"><?php echo TemplateHelpers::escapeHtml($article['medium']) ?></span></div>
            <div class="link"><a href="<?php echo TemplateHelpers::escapeHtml($article['url']) ?>" target="_blank"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('blank'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($article['title']) ?></a></div>
        </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </div>
<?php $_ctrl = $control->getWidget("vpArticles"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb50652cce81_next')) { function _lb50652cce81_next($_l, $_args) { extract($_args)
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
</div><?php
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
$_l->extends = '@layout.classic.latte' ?>

<?php $description = 'Články o Aerocentru v tisku a na internetových zpravodajstvích.' ;$keywords = 'aerocentrum v novinách, vrtulník' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
