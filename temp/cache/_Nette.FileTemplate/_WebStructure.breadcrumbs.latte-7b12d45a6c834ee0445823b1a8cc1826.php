<?php //netteCache[01]000354a:2:{s:4:"time";s:21:"0.73347100 1305142867";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:68:"/var/www/projekty/aero/app/components/WebStructure/breadcrumbs.latte";i:2;i:1300293118;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/WebStructure/breadcrumbs.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'c9mao7aeuq'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>
<div id="breadcrumbs">
    <a href="<?php echo TemplateHelpers::escapeHtml($presenter->link(":Front:Homepage:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('breadcrumb'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>AEROCENTRUM</a>

    <span> » </span>
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($items) as $pathItem): if ($pathItem->url): ?>
            <a href="<?php if ($pathItem->args): echo TemplateHelpers::escapeHtml($presenter->link($pathItem->url, $pathItem->args)) ;else: echo TemplateHelpers::escapeHtml($presenter->link($pathItem->url)) ;endif ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('breadcrumb',$pathItem->isCurrent ? 'current':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($pathItem->label) ?></a>

<?php else: ?>
            <span><?php echo TemplateHelpers::escapeHtml($pathItem->label) ?></span>
<?php endif ?>
        <?php if ($iterator->isLast()): else: ?><span> » </span><?php endif ?>

<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>