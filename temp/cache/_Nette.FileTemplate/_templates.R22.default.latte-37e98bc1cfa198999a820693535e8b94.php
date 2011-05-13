<?php //netteCache[01]000352a:2:{s:4:"time";s:21:"0.16522600 1305276729";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:66:"/var/www/projekty/aero/app/FrontModule/templates/R22.default.latte";i:2;i:1304498767;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/R22.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'g5ba70jgj3'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb42d68208be_main')) { function _lb42d68208be_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vrtulník Robinson R22'))) ?></h1>

    <p class="intro cufon">Dvoumístný lehký vrtulník, výrobce Robinson
        Helicopter Company LA, USA, s vynikajícími manévrovacími
        schopnostmi a výborným výhledem z kabiny.</p>
    <?php echo TemplateHelpers::escapeHtml($template->image('gallery/r22-postrik.jpg', 645, 330, 'r22', TRUE, TRUE, FALSE, FALSE, 'full')) ?>


    <h2 class="cufon">Technické parametry vrtulníku:</h2>
    <table>
        <tr class="first">
            <th>maximální rychlost</th>
            <td>189 km/h</td>
        </tr>
        <tr>
            <th>cestovní rychlost</th>
            <td>176 km/h</td>
        </tr>
        <tr>
            <th>stoupavost</th>
            <td>5 m/s</td>
        </tr>
        <tr>
            <th>maximální dolet</th>
            <td>480 km</td>
        </tr>
        <tr>
            <th>maximální operační výška</th>
            <td>4 260 m</td>
        </tr>
        <tr>
            <th>maximální vzletová hmotnost</th>
            <td>621 kg</td>
        </tr>
        <tr>
            <th>užitečné zatížení</th>
            <td>247 kg</td>
        </tr>
        <tr>
            <th>osádka</th>
            <td>pilot + 1</td>
        </tr>
        <tr>
            <th>stoupavost</th>
            <td>7,36 m/s</td>
        </tr>
    </table>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb43ad7889ef_next')) { function _lb43ad7889ef_next($_l, $_args) { extract($_args)
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

<?php $description = 'Dvoumístný lehký vrtulník R22, výrobce Robinson
        Helicopter Company LA, USA, s vynikajícími manévrovacími
        schopnostmi a výborným výhledem z kabiny.' ;$keywords = 'aerocentrum, vrtulník, robinson 22, r22' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
