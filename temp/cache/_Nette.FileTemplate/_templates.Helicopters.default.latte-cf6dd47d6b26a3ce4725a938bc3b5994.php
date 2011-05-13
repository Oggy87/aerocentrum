<?php //netteCache[01]000360a:2:{s:4:"time";s:21:"0.37002300 1305276725";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:74:"/var/www/projekty/aero/app/FrontModule/templates/Helicopters.default.latte";i:2;i:1302594456;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Helicopters.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'cbrxlfmgvo'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb0ab24acd5b_main')) { function _lb0ab24acd5b_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Naše vrtulníky'))) ?></h1>

    <p class="intro cufon"> Vrtulníky naší společnosti jsou po celý rok <strong>špičkově udržovány</strong> a připraveny
            kdykoliv splnit Vaše představy.</p>

    <div class="helicopters">
        <div class="helicopter">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('img'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($template->image('gallery/mi8-na-palube-auto.jpg', 300, NULL, 'mi-8', TRUE, FALSE, FALSE, FALSE, 'imgfleft')) ?></a>

            <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>">Mi-8</a></h2>
            <p>Provozujeme těžký <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>"><strong>vrtulník Mi-8</strong></a>, který může letět s podvěsem do 3 tun,
                nákladem do trupu max. 4 tuny. Velikost tohoto legendárního dokazuje i fakt, že
                zadními vraty do něj vjede osobní automobil.</p>
            <div class="clear"></div>
        </div>
        <div class="helicopter">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('img'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($template->image('gallery/r44.jpg', 300, NULL, 'r44', TRUE, FALSE, FALSE, FALSE, 'imgfleft')) ?></a>

            <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>">Robinson R44</a></h2>
            <p>Dalším vrtulníkem v naší flotile je čtyřmístný lehký vrtulník, výrobce Robinson
                Helicopter Company LA, <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>"><strong>Robinson R44</strong></a>. Je vhodný pro přepravu
                osob, aerotaxi, filmování atd.</p>
            <div class="clear"></div>
        </div>
        <div class="helicopter">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('img'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($template->image('gallery/r22.jpg', 300, NULL, 'r22', TRUE, FALSE, FALSE, FALSE, 'imgfleft')) ?></a>

            <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">Robinson R-22 Beta</a></h2>
            <p><a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>"><strong>Robinson R-22 Beta</strong></a> je klasická dvoumístná jednomotorová helikoptéra,
                která se již od začátku výroby stala celosvětově oblíbeným modelem. Jedná se o vrtulník,
                který je používán zhruba v 60 zemích světa. Oblíbeným se stal pro svou multifunkčnost.
                Je používán opravdu k všemožným aktivitám od sledování dopravy, přes <a href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>">výuku  pilotů</a>

                po <a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight")) ?>">vyhlídkové lety</a>. Tento elegantní stroj dosahuje
                rychlosti až 189 km/h a váží 389 kg. Výrobcem je Robinson Helicopter Company LA, USA.
                Tato helikoptéra je určena pro jednoho cestujícího plus pilot. </p>
            <div class="clear"></div>
        </div>
        <div class="helicopter">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Md520n:")) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('img'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($template->image('gallery/md520-zrcatko.jpg', 300, NULL, 'md520n', TRUE, FALSE, FALSE, FALSE, 'imgfleft')) ?></a>

            <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Md520n:")) ?>">MD 520 N</a></h2>
            <p>Nejmodernějším strojem je čtyřmístný lehký vrtulník <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Md520n:")) ?>"><strong>MD 520 N</strong></a>

                vhodný pro přepravu osob, aerotaxi, filmování za obdobných podmínek jako vrtulník R44
                s tím, že je zde více prostoru i na velkou kameru a může letět případně i režisér,
                lety s podvěsem do 700 kg. </p>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbc1212bd997_next')) { function _lbc1212bd997_next($_l, $_args) { extract($_args)
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

<?php $description = 'Vrtulníky letecké společnosti Aerocentrum - Robinson R22, Robinson R44, Mil Mi-8 a MD520n.' ;$keywords = 'aerocentrum, vrtulníky, robinson 22, robinson 44, md520n, mi 8' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
