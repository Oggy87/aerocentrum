<?php //netteCache[01]000356a:2:{s:4:"time";s:21:"0.18682000 1305276746";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:70:"/var/www/projekty/aero/app/FrontModule/templates/AboutUs.default.latte";i:2;i:1302593357;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/AboutUs.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'mxtntx77it'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lbcb74ecdd70_main')) { function _lbcb74ecdd70_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('O společnosti Aerocentrum'))) ?></h1>

    <p class="intro cufon">Letecká společnost AEROCENTRUM je jedničkou v oboru leteckých pracích. Náš tým tvoří tým
    špičkových odborníků s mnohaletou zkušeností. </p>
    
    <p>Společnost AEROCENTRUM byla založena v roce 1993. Za dobu existence jsme vrtulníky Aerocentra postavili řadu
        lyžařských lanovek, demontovali a montovali linie sloupů vysokého napětí, přiblížili desítky tisíc kubíků dřeva
        v horských oblastech, povápnili dolomitickým vápencem tisíce hektarů lesních porostů, osadili mnoho antén,
        technologií, GSM vysílačů, ...</p>
    <?php echo TemplateHelpers::escapeHtml($template->image('gallery/mi8-na-letisti.jpg', 645, 330, 'mi-8', TRUE, TRUE, FALSE, FALSE, 'full')) ?>

    <blockquote>
    <p>Výškové a letecké práce dodáváme zákazníkovy tzv. na klíč bez jakýchkoli dalších prostředníků či subdodavatelů.
       Zákazník tak nemusí cokoli zajišťovat.</p>
    </blockquote>

    <div class="signature">
        <div class="name cufon">ing. Lubomír Ogurčák</div>
        <div class="fc cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('jednatel společnosti'))) ?></div>
    </div>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb8d489f18e0_next')) { function _lb8d489f18e0_next($_l, $_args) { extract($_args)
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

<?php $description = '>Letecká společnost AEROCENTRUM je jedničkou v oboru leteckých pracích. Náš tým tvoří tým špičkových odborníků s mnohaletou zkušeností.' ;$keywords = 'aerocentrum, vrtulník, letecké práce, výškové práce' ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
