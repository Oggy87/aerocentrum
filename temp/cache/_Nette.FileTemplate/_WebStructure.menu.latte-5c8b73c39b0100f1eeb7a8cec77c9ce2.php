<?php //netteCache[01]000347a:2:{s:4:"time";s:21:"0.70231200 1305142300";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:61:"/var/www/projekty/aero/app/components/WebStructure/menu.latte";i:2;i:1299805429;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/WebStructure/menu.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, '2hhl81mopt'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>
<div id="menu"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($section->getComponents(FALSE,'SectionNode')) as $item): ?>
    <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('item',$iterator->isFirst() ? 'first':null,$iterator->isLast() ? 'last' :null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

<?php if ($item->url): ?>
            <a href="<?php if ($item->args): echo TemplateHelpers::escapeHtml($presenter->link($item->url, $item->args)) ;else: echo TemplateHelpers::escapeHtml($presenter->link($item->url)) ;endif ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array(in_array($item,$path) ? 'active':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                <?php echo TemplateHelpers::escapeHtml($item->label) ?>

                            </a>

<?php else: ?>
            <span class="a"><?php echo TemplateHelpers::escapeHtml($item->label) ?></span>
<?php endif ?>
    </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</div>
