<?php //netteCache[01]000351a:2:{s:4:"time";s:21:"0.82880200 1305142867";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:65:"/var/www/projekty/aero/app/components/WebStructure/menuPage.latte";i:2;i:1300123644;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/WebStructure/menuPage.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'zg15i32w2s'); unset($_extends);


//
// block items
//
if (!function_exists($_l->blocks['items'][] = '_lb2ba9ab3ff6_items')) { function _lb2ba9ab3ff6_items($_l, $_args) { extract($_args)
;$sections = $node->getComponents(FALSE,'SectionNode') ?>
            <ul>
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($sections) as $section): ?>
                <li>
                    <div <?php echo Html::el(NULL)->class('last',$iterator->isLast())->attributes() ?>>
<?php if ($section->url): ?>
                        <a href="<?php if ($section->args): echo TemplateHelpers::escapeHtml($presenter->link($section->url, $section->args)) ;else: echo TemplateHelpers::escapeHtml($presenter->link($section->url)) ;endif ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($section->isCurrent ? 'active':null, in_array($section, $path) ? 'inpath':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                            <span<?php if ($_l->tmp = trim(implode(" ", array_unique(array('cufon',$section->getComponents(FALSE,'SectionNode')->count() > 0 ? 'open':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($section->label) ?></span>

                        </a>

<?php else: ?>
                            <span class="a cufon"><?php echo TemplateHelpers::escapeHtml($section->label) ?></span>
<?php endif ?>
                    </div>
<?php if (in_array($section, $path)): if ($section->getComponents(FALSE,'SectionNode')->count() > 0): call_user_func(reset($_l->blocks['items']), $_l, array('node' => $section) + $template->getParams()) ;endif ;endif ?>
                </li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            </ul>
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
if (isset($path)): if ($path[0]->getComponents(FALSE,'SectionNode')->count() > 0): ?>
    <div id="page-menu">
        <a class="cufon parent" href="<?php echo TemplateHelpers::escapeHtml($presenter->link ($path[0]->url)) ?>"><?php echo TemplateHelpers::escapeHtml($path[0]->label) ?></a>
 
<?php $node =  $path[0] ;if (!$_l->extends) { call_user_func(reset($_l->blocks['items']), $_l, get_defined_vars()); } ?>
    </div>
<?php endif ;endif ;
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
