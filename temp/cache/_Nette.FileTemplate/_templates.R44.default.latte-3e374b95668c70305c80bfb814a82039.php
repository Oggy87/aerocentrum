<?php //netteCache[01]000352a:2:{s:4:"time";s:21:"0.57886800 1305276732";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:66:"/var/www/projekty/aero/app/FrontModule/templates/R44.default.latte";i:2;i:1302594632;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/R44.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'q8bppuv00w'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lbf190e11507_main')) { function _lbf190e11507_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vrtulník Robinson R44'))) ?></h1>

    <p class="intro cufon">Čtyřmístný lehký vrtulník, výrobce Robinson Helicopter Company LA, vhodný pro
        přepravu osob, aerotaxi, filmování za obdobných podmínek jako <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">vrtulník R22</a> s tím,
        že je zde více prostoru i na velkou kameru a může letět případně i režisér.</p>
    <?php echo TemplateHelpers::escapeHtml($template->image('gallery/r44-2.jpg', 645, 330, 'r44', TRUE, TRUE, FALSE)) ?>



    <h2 class="cufon">Technické parametry vrtulníku:</h2>
    <table>
        <tr class="first">
            <th>maximální rychlost</th>
            <td>240 km/h</td>
        </tr>
        <tr>
            <th>cestovní rychlost</th>
            <td>205 km/h</td>
        </tr>
        <tr>
            <th>stoupavost</th>
            <td>5 m/s</td>
        </tr>
        <tr>
            <th>maximální dolet</th>
            <td>650 km</td>
        </tr>
        <tr>
            <th>maximální operační výška</th>
            <td>4 260 m</td>
        </tr>
        <tr>
            <th>maximální vzletová hmotnost</th>
            <td>1 090 kg</td>
        </tr>
        <tr>
            <th>užitečné zatížení</th>
            <td>450 kg</td>
        </tr>
        <tr>
            <th>osádka</th>
            <td>pilot + 3</td>
        </tr>
    </table>

</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb4c4d6f68fd_next')) { function _lb4c4d6f68fd_next($_l, $_args) { extract($_args)
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

<?php $description = 'Čtyřmístný lehký vrtulník R44, výrobce Robinson
        Helicopter Company LA, USA, s vynikajícími manévrovacími
        schopnostmi a výborným výhledem z kabiny.' ;$keywords = 'aerocentrum, vrtulník, robinson 44, r44' ?>

if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}