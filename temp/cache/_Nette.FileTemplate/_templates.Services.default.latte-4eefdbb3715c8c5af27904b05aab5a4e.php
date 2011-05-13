<?php //netteCache[01]000357a:2:{s:4:"time";s:21:"0.65945800 1305142867";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:71:"/var/www/projekty/aero/app/FrontModule/templates/Services.default.latte";i:2;i:1302593724;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Services.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'vmn1xnctqe'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb8bb49f856b_main')) { function _lb8bb49f856b_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Služby'))) ?></h1>

    <?php echo TemplateHelpers::escapeHtml($template->image('images/razitko_transport_letadla.png', 124, 277, 'mi-8', FALSE, FALSE, FALSE, FALSE, 'imgfright')) ?>

    <p class="intro cufon"><strong>Náš tým špičkových odborníků</strong> vyškolených na ty nejnáročnější
        ůkoly je připraven kdykoliv splnit Vaše představy.</p>
    <ul>
    <li>Provádíme
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("AirWork:")) ?>"><strong>letecké práce vrtulníky</strong></a> jako jsou transporty břemen,
        osazování technologických zařízení na budovy, stavby stožárů, lanovek,
        těžba dřeva, fotolety, přepravní lety a paravýsadky.</li>
    <li>Provozujeme <a href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>"><strong>leteckou školu</strong></a>, ve které se i Vy můžete stát
        pilotem <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">vrtulníků Robinson R22</a> a <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">R44</a>.</li>
    <li>Nebo u nás můžete okusit krásu letu vrtulníkem na vlastní oči při
        <a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>"><strong>vyhlídkovém letu</strong></a>.</li>
    <li>Další naší službou je <a href="<?php echo TemplateHelpers::escapeHtml($control->link("ServiceCenter:")) ?>"><strong>servisní středisko vrtulníků Robinson</strong></a>, ve kterém
        poskytneme Vašemu vrtulníku plný servis.</li>
    </ul>

    <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Přehled našich služeb'))) ?></h2>

    <ul class="navigator">
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Assembly:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Stavby a montáže'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Transport:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Transport břemen'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:LimingForests:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vápnění lesů'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:TimberHarvesting:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Těžba dřeva'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:AerialSpraying:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Postřiky'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:InspectingFlights:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Kontrolní lety'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Paraschuting:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Paravýsadky'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:PhotoFlight:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Fotolety a filmování'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Helitaxi:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Helitaxi'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:FireFighting:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Hašení požárů'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Outdoor:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Outdoorové akce'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:FlyingSchool:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Letecká škola'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link("ServiceCenter:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Servisní středisko'))) ?></a></li>
        <li><a class="cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vyhlídkové lety'))) ?></a></li>

        <div class="clear"></div>
    </ul>

    <div class="clear"></div>
</div>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lb7fea500aa4_next')) { function _lb7fea500aa4_next($_l, $_args) { extract($_args)
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

<?php $description = 'Provádíme letecké práce vrtulníky jako jsou transporty břemen, montáže klimatizací, stavba stožárů lanovek, fotolety a paravýsadky.' ;$keywords = 'aerocentrum, vrtulníky, letecké práce, transport vrtulníkem, vápnění lesů, paravýsadky, letecká škola, servisní středisko' ?>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
