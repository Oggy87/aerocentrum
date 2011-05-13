<?php //netteCache[01]000359a:2:{s:4:"time";s:21:"0.05237700 1305276756";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:73:"/var/www/projekty/aero/app/FrontModule/templates/Permission.default.latte";i:2;i:1302593534;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Permission.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'omn1v6mikh'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb6db0b056e5_main')) { function _lb6db0b056e5_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Jsme držiteli příslušných oprávnění'))) ?></h1>

    <ul>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/aerialworkpermit.jpeg">AERIAL WORK OPERATOR PERMIT No: 477/LPR</a> Povolení k provozování leteckých prací vydané Úřadem pro civilní letectví ČR</li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/">APPROVAL CERTIFICATE No: L-1-088/2</a> Oprávnění k provádění údržby a oprav ve vlastním Opravátenském středisku</li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/Robinson service center.jpg">Authorized Service Center Robinson Helicopter Company</a></li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/iso140012005.jpeg">ČSN EN ISO 14001:2005</a> Certifikovaný systém environmentálního managementu</li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/iso90012001.jpeg">ČSN EN ISO 9001:2001</a> Certifikovaný systém managementu jakosti</li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/ohsas180011999.jpeg">OHSAS 18001</a> Certifikovaný systém řízení bezpečnosti práce</li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/">Organizace k řízení zachování letové způsobilosti - rozsah oprávnění</a></li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/">Osvědčení o oprávnění organizace k řizení zachování letové způsobilosti</a></li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/osvedcenioregistraci.jpeg">Osvědčení o registraci</a></li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/operationspecification.jpeg">Provozní specifikace Příloha Povolení k provádění leteckých prací</a></li>
        <li><a href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/files/vypiszor.jpeg">Výpis z obchodního rejstříku</a></li>
    </ul>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb7f37af59ea_next')) { function _lb7f37af59ea_next($_l, $_args) { extract($_args)
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

<?php $description = 'Aerocentrum je držitel příslušných oprávnění pro vykonávání leteckých pracích..' ;$keywords = 'aerocentrum, letecké práce, oprávnění k leteckým pracem' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
