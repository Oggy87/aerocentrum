<?php //netteCache[01]000358a:2:{s:4:"time";s:21:"0.22089200 1305145491";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"/var/www/projekty/aero/app/FrontModule/templates/Reference.@layout.latte";i:2;i:1305145488;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Reference.@layout.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'fkv3zwk2cf'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb2059b3b146_main')) { function _lb2059b3b146_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <div id="reference">
    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($h1)) ?></h1>

<?php if (isset($articles)): ?>
    <div class="articles">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($articles) as $article): ?>
        <div class="article"><?php if ($article['perex_photo_path']): ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:", array('id' => $article['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('img', 'thumb'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                <?php echo TemplateHelpers::escapeHtml($template->image($article['perex_photo_path'], 200, 158, 'foto', FALSE, TRUE, FALSE)) ?>

            </a>
<?php endif ?>
            <div class="content">
                <h3><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:", array('id' => $article['id']))) ?>"><?php echo TemplateHelpers::escapeHtml($template->truncate($article['heading'], 100)) ?></a></h3>
                <?php echo $template->html_cut($template->texy($article['perex_html']), 250) ?>


                <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:", array('id' => $article['id']))) ?>"> » <?php echo TemplateHelpers::escapeHtml($template->translate('celý článek')) ?></a>


            </div>

            <div class="clear"></div>
        </div><?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </div>

<?php $_ctrl = $control->getWidget("vpArticles"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ;endif ?>
    </div>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbfe1fecfb3b_next')) { function _lbfe1fecfb3b_next($_l, $_args) { extract($_args)
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
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
