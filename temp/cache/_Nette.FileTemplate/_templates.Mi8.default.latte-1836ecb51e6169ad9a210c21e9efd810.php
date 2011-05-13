<?php //netteCache[01]000352a:2:{s:4:"time";s:21:"0.77697600 1305276737";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:66:"/var/www/projekty/aero/app/FrontModule/templates/Mi8.default.latte";i:2;i:1304452803;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Mi8.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'vllfne6g6k'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb565223ff8d_main')) { function _lb565223ff8d_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vrtulník Mi-8'))) ?></h1>

    <p class="intro cufon">Legendární těžký vrtulník schopný unést
        břemena do váhy 3000 kg v podvěsu a 4000 kg v nákladovém prostoru v trupu vtulníku, jež pojme i např. osobní automobil.</p>
    <p>Vrtulník Mi-8 je poháněn dvěma turbohřídelovými motory.</p>
    <p class="tip">Výhodou vrtulníku Mi-8 je operativnost v husté zástavbě při pracech nad městem.</p>
    <?php echo TemplateHelpers::escapeHtml($template->image('gallery/mi8-nad-polem.jpg', 645, 330, 'mi-8', TRUE, TRUE, FALSE)) ?>


    <h2 class="cufon">Technické parametry vrtulníku:</h2>
    <table>
        <tr class="first">
            <th>délka</th>
            <td>25,33 m</td>

            <th>maximální rychlost</th>
            <td>250 km/h</td>
        </tr>
        <tr>
            <th>výška</th>
            <td>4,70 m</td>

            <th>cestovní rychlost</th>
            <td>220 km/h</td>
        </tr>
        <tr>
            <th>průměr rotoru / počet listů</th>
            <td>21,3 m / 5</td>

            <th>stoupavost</th>
            <td>5-8 m/s</td>
        </tr>
        <tr>
            <th>normální vzletová hmotnost</th>
            <td>11 000 kg</td>

            <th>typ motoru</th>
            <td>TV2-117A</td>
        </tr>
        <tr>
            <th>maximální vzletová hmotnost</th>
            <td>12 000 kg</td>

            <th>počet motorů</th>
            <td>2</td>
        </tr>
        <tr>
            <th>hmotnost prázdného vrtulníku</th>
            <td>7 150 kg</td>

            <th>výkon motoru</th>
            <td>1125 / 1500 kW/k</td>
        </tr>
        <tr>
            <th>nosnost v nákladové kabině</th>
            <td>4 000 kg</td>

            <th>cestovní rychlost</th>
            <td>190 km/h</td>
        </tr>
        <tr>
            <th>nosnost v podvěsu</th>
            <td>3 000 kg</td>

            <th>maximální rychlost</th>
            <td>230 km/h</td>
        </tr>
        <tr>
            <th>maximální operační výška</th>
            <td>4 500 m</td>

            <th>ekonomická rychlost</th>
            <td>160 km/h</td>
        </tr>
        <tr>
            <th>počet přepravovaných osob</th>
            <td>24</td>

            <th>osádka</th>
            <td>2 piloti </td>
        </tr>
        <tr>
            <th>maximální dolet</th>
            <td>700 km</td>
        </tr>
    </table>

</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbf4b7250c88_next')) { function _lbf4b7250c88_next($_l, $_args) { extract($_args)
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

<?php $description = 'Vrtulník Mi-8 společnosti Aerocentrum schopný unést
        břemena do váhy 3000 kg v podvěsu a 4000 kg na palubě, jejíž velikost
        pojme i osobní automobil.' ;$keywords = 'aerocentrum, vrtulník, mi 8' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
