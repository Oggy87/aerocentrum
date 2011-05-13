<?php //netteCache[01]000356a:2:{s:4:"time";s:21:"0.72954700 1305145399";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:70:"/var/www/projekty/aero/app/FrontModule/templates/Article.default.latte";i:2;i:1305145393;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Article.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'b1q3zyg74q'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb4995489f9f_main')) { function _lb4995489f9f_main($_l, $_args) { extract($_args)
?>
<div class="main">
    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($h1)) ?></h1>

    <div class="intro">
    <?php echo $template->texy($article['perex_html']) ?>

    </div>

<?php if ($article['perex_photo_path']): ?>
        <?php echo TemplateHelpers::escapeHtml($template->image($article['perex_photo_path'], 645, 330, $article['heading'], TRUE, TRUE, FALSE, TRUE, 'full')) ?>

<?php endif ?>
    <div class="article-text">
    <?php echo $template->texy($article['text_html']) ?>

    </div>
<?php if (count($photos) > 0): ?>
    <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article-gallery'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

        <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Fotky z této akce:'))) ?></h2>

        <a class="prev browse left disabled"></a>

        <div class="scrollable">

            <div class="items">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($photos) as $photo): $modulus = $iterator->getCounter() % 4 ?>
                
                <?php if ($iterator->isFirst()): ?><div><?php endif ?>

<?php $bigphoto = Helpers::image($photo['picture_path'], 1200, 900, $photo['description_'], TRUE,FALSE,FALSE) ?>
                    <a class="fancybox" rel="article-gallery" href="<?php echo TemplateHelpers::escapeHtml($bigphoto->src) ?>">
                        <?php echo TemplateHelpers::escapeHtml($template->image($photo['picture_path'], 132, 90, $photo['description_'], TRUE, TRUE, FALSE)) ?>

                    </a>
<?php if ($modulus == 0): ?>
                    <?php if ($iterator->isLast()): ?></div>
                    <?php else: ?></div><div>
<?php endif ;elseif ($iterator->isLast()): ?>
                    </div>
<?php endif ;endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            </div>

        </div>

        
        <a class="next browse right disabled"></a>

        <div class="clear"></div>
    </div>
<?php endif ?>

<?php if (count($videos) > 0): ?>
    <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article-gallery','article-videos'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

        <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Videa z této akce:'))) ?></h2>

        <a class="prev browse left disabled"></a>

        <div class="scrollable">

            <div class="items">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($videos) as $video): $modulus = $iterator->getCounter() % 2 ?>

                <?php if ($iterator->isFirst()): ?><div><?php endif ?>

<?php $img = Helpers::image($video['thumb_path'],274,180,$video['name_'],FALSE,TRUE,FALSE) ;if (Helpers::is_url($video['video_path'])): ?>
                    <a class="youtube" href="<?php echo TemplateHelpers::escapeHtml($video['video_path']) ?>" title="<?php echo TemplateHelpers::escapeHtml($video['name_']) ?>" onclick="javascript:$.get(<?php echo TemplateHelpers::escapeHtmlJs($control->link("Video:updateViews", array('id'=>$video['id']))) ?>,{}, function(payload) {});">
                        <?php echo TemplateHelpers::escapeHtml($img) ?>

                        <div class="play_button"></div>
                    </a>
<?php else: ?>
                    <a class="video_link" href="<?php echo TemplateHelpers::escapeHtml($img->src) ?>" name="<?php echo TemplateHelpers::escapeHtml($video['video_path']) ?>" title="<?php echo TemplateHelpers::escapeHtml($video['name_']) ?>" onclick="javascript:$.get(<?php echo TemplateHelpers::escapeHtmlJs($control->link("Video:updateViews", array('id'=>$video['id']))) ?>,{}, function(payload) {});">
                        <?php echo TemplateHelpers::escapeHtml($img) ?>

                        <div class="play_button"></div>
                    </a>
<?php endif ;if ($modulus == 0): ?>
                    <?php if ($iterator->isLast()): ?></div>
                    <?php else: ?></div><div>
<?php endif ;elseif ($iterator->isLast()): ?>
                    </div>
<?php endif ;endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            </div>

        </div>


        <a class="next browse right disabled"></a>

        <div class="clear"></div>
    </div>
<?php endif ?>

<?php if (count($presses) > 0): ?>
    <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article-gallery','article-videos'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

        <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Napsali o této akci:'))) ?></h2>
            <div class="press"><?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($presses) as $press): ?>
                <div<?php if ($_l->tmp = trim(implode(" ", array_unique(array('article'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                    <div><span class="date"><?php echo TemplateHelpers::escapeHtml($template->date($press['date'])) ?></span><span class="medium"><?php echo TemplateHelpers::escapeHtml($press['medium']) ?></span></div>
                    <div class="link"><a href="<?php echo TemplateHelpers::escapeHtml($press['url']) ?>" target="_blank"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('blank'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($press['title']) ?></a></div>
                </div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
            </div>
    </div>

<?php endif ?>

   </div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbe7e26b9155_next')) { function _lbe7e26b9155_next($_l, $_args) { extract($_args)
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
if (!function_exists($_l->blocks['scripts'][] = '_lb677a337b83_scripts')) { function _lb677a337b83_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
    <script type="text/javascript">
    head.ready(function() {

        $(function() {
            // initialize scrollable
            $(".scrollable").scrollable();
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
$_l->extends = '@layout.classic.latte' ?>


<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
