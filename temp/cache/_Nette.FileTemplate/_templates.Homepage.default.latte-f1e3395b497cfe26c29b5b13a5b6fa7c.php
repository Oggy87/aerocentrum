<?php //netteCache[01]000357a:2:{s:4:"time";s:21:"0.82333400 1305145450";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:71:"/var/www/projekty/aero/app/FrontModule/templates/Homepage.default.latte";i:2;i:1305145448;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Homepage.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'coq7qrv7g2'); unset($_extends);


//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lba6456dc716_content')) { function _lba6456dc716_content($_l, $_args) { extract($_args)
?>
<div id="homepage">
    <div class="page">
        <div id="carusel" class="text">
            <div id="tools">
                <div class="tool" id="carusel-aerocentrum">
                    <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Letecké práce vrtulníky'))) ?></h1>
                    <p>Společnost <strong>AEROCENTRUM spol. s r.o.</strong> je letecký provozovatel, specializující se na <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Services:")) ?>"><strong>letecké práce vrtulníky</strong></a>

                        a <a href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>"><strong>vrtulníkovou leteckou školu</strong></a>. </p>
                    <h3 class="cufon">Máme dlouholeté zkušenosti:</h3>
                    <p>Vrtulníková letecká společnost AEROCENTRUM byla založena v roce 1993. Za dobu existence jsme vrtulníky postavili řadu lyžařských lanovek,
                        demontovali a montovali linie sloupů vysokého napětí, přiblížili desítky tisíc kubíků dřeva v horských oblastech, povápnili dolomitickým vápencem
                        tisíce hektarů lesních porostů, osadili nesčetně antén, technologií GSM, vysílačů, klimatizačních jednotek, ...</p>
                    <blockquote>
                        <p>Naši <strong>piloti mají zkušenosti s extrémně náročnými <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:")) ?>">leteckými prácemi</a></strong>, u kterých je každá zakázka svým způsobem unikátní.
                            Piloti nalétají při <strong>nejsložitějších stavebně-montážních pracích</strong> stovky letových hodin ročně.</p>
                    </blockquote>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("AboutUs:")) ?>"> » více o Aerocentrum</a>

                </div>

                <div class="tool" id="carusel-assembly">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Assembly:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Stavebně montážní práce vrtulníkem'))) ?></a></h2>
                    <blockquote>
                        <p><strong>Jsme špička v oboru stavebně montážních prací vrtulníky</strong>. <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Helicopters:")) ?>">Vrtulníky Aerocentra</a> provádí
                           <strong>nejtěžší stavebně montážní práce </strong> a jsou připraveny plnit Vaše představy na klíč. </p>
                    </blockquote>
                    <p>V těžko přístupných horských terénech stavíme vrtulníkem <strong>lyžařské lanovky</strong> včetně betonáže patek. Osazujeme a vyměňujeme <strong>technologie na střechách</strong>
                        výškových budov, budov v centrech měst, v místech kde by byl problém s delším omezením dopravy záborem prostranství pro jeřáb.
                        Vrtulníkem sestavujeme <strong>ocelové konstrukce</strong>, nosné rámy pod technologie, <strong>zastřešujeme světliky</strong>, sesazujeme <strong>vzduchotechniky</strong>, demontujeme konstrukce ...</p>
                    <p class="tip"> » prohlédněte si některé naše <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:assembly")) ?>">zakázky ze stavebně montážních pracích</a></p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("AirWork:")) ?>"> » více o leteckých pracech vrtulníky</a>

                </div>

                <div class="tool" id="carusel-transport">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("Transport:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Transport objemných břemen'))) ?></a></h2>
                    <p>Provádíme <strong>transporty nejrůznějších břemen</strong>. Transportovali jsme například letadla, bazény, výřiveky, odlučovací nástavce na komíny, střešní věžičky, sochy, auta, vzrostlé stromy ...</p>
                    <p class="tip" > » prohlédněte si některé naše <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:transport")) ?>">zakázky z transportu břemen</a></p>
                    <p>Těžký transportní <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>">vrtulník Mi-8</a> je schopný unést břemena do váhy <strong>3000 kg v podvěsu</strong> a <strong>4000 kg v nákladovém prostoru v trupu vtulníku</strong>,
                        jež <strong>pojme i např. osobní automobil</strong>. Dvoumotorý <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>">vrtulník Mi-8</a> může operovat i nad hustou městskou zástavbou.
                    </p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("Transport:")) ?>"> » více o transportu břemen vrtulníkem</a>

                </div>

                <div class="tool" id="carusel-pilot-school">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vrtulníková pilotní škola'))) ?></a></h2>
                    <p>Letecká společnost <strong>AEROCENTRUM spol. s r.o.</strong> je registrovaným zařízením pro <a href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>"><strong>výcvik pilotů vrtulníků</strong></a>.</p>
                    <p>Absolvent leteckého výcviku získá <strong>Průkaz způsobilosti soukromého pilota vrtulníku</strong> - Private Pilot License (Helicopters)
                        - PPL(H) Licence soukromého pilota vrtulníků. Výcvik provádíme na vrtulnících <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">Robinson R22</a> a <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>">R44</a>.</p>
                    <blockquote>
                        <p>Veškerý výcvik je prováděn plně v souladu s<strong> evropskými leteckými předpisy JAA (JAR-FCL 2)</strong> a po získání národního průkazu,
                            anebo kvalifikace, umožňuje držiteli létání na příslušném typu vrtulníku.</p>
                    </blockquote>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("FlyingSchool:")) ?>"> » více o letecké škole</a>

                </div>

                <div class="tool" id="carusel-sightseeing">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vyhlídkové lety vrtulníkem'))) ?></a></h2>
         
                    <h3 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>">Vyhlídkový let vrtulníkem</a> jako originální dárek</h3>
                    <p>Nenechte si ujít <strong>jedinečný zážitek</strong>. Obdarujte své blízké dárkem, na který budou dlouho vzpomínat. Dopřejte jim adrenalinový zážitek - <a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>">let vrtulníkem</a>.</p>
                    <h3 class="cufon">Poletíte sám nebo s rodinou?</h3>
                    <p>Můžete si vybrat dvoumístný <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>"><strong>vrtulník Robinson R22</strong></a>, ve kterém zažijete neopakovatelný zážitek z výhledu z kokpitu a pilotáže vedle Vás sedícího pilota.
                       Nebo si chcete tyto úžasné okamžiky vychutnat s blízkými a zvolíte čtyřmístný <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>"><strong>vrtulník Robinson R44</strong></a>?.</p>
                                        <p>Cena 30-ti minutového <a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>">vyhlídkového letu vrtulníkem R22</a> pro jednu osobu je 4.760 Kč.<br />
                    Cena 30-ti minutového <a href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>">vyhlídkového letu vrtulníkem R44</a> pro tři osoby je 9.520 Kč.</p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("SightseeingFlight:")) ?>"> » více o vyhlídkových letech</a>

                </div>

                <div class="tool" id="carusel-service">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("ServiceCenter:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Servisní středisko Robinson Helicopters'))) ?></a></h2>
                    <p><strong>Autorizované servisní středisko</strong> AEROCENTRUM pro <strong>vrtulníky Robinson</strong> na letišti Mělník-Hořín
                        provádí <strong>garanční</strong> a <strong>pogaranční prohlídky</strong>, servis a opravy <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">vrtulníků Robinson R22</a> a <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>">R44</a>.</p>
                    <p>Dále zajišťujeme údržbu a opravy palubní
                        elektroniky a palubních přístrojů, defektoskopii vybraných komponentů, prodej originálních náhradních dílů od výrobce, případně od jeho subdodavatelů.
                        Středisko má vlastní zařízení pro vyvažování rotujících částí a testovací stolici pro zapalovací svíčky.</p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("ServiceCenter:")) ?>"> » více o servisním středisku</a>

                </div>

                <div class="tool" id="carusel-spraying">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("AerialSpraying:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Letecké postřiky proti škůdcům'))) ?></a></h2>
                    <p>Postřiky pro zemědělství a lesní hospodářství provádíme <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">vrtulníkem Robinson R22</a> osazeným postřikovacím zařízením
                        pro postřiky mikrodávkami. Tento způsob se vyznačuje <strong>vysokou účinností postřiku oproti postřiku klasickým letadlem</strong>
                        vlivem nízké přeletové rychlosti, vlivu tlaku rotoru vrtulníku proti zemi a vznikajícímu víření vzduchu. Listy jsou díky tomu <strong>postřikem
                            ošetřeny i ze spodní strany</strong>.</p>
                    <h3 class="cufon">Oblast využití:</h3>
                    <ul class="fleft">
                        <li>postřiky vinic,</li>
                        <li>postřiky lesních porostů,</li>
                    </ul>
                    <ul class="fleft">
                        <li>postřiky okrasných stromů,</li>
                        <li>postřiky ovocných stromů,</li>
                    </ul>
                    <ul class="fleft">
                        <li>postřiky alejí,</li>
                        <li>postřiky stromořadí.</li>
                    </ul>
                    <div class="clear"></div>
                    <p class="tip"> » prohlédněte si některé naše <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:aerialSpraying")) ?>">zakázky ze zemědělských postřiků</a></p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("AerialSpraying:")) ?>"> » více o leteckých postřicích</a>

                </div>

                <div class="tool" id="carusel-timberharvesting">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("TimberHarvesting:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Těžba a letecké přibližování dřeva'))) ?></a></h2>
                    <p><strong>Nejšetrnější způsob</strong> přibližování dřeva z lesních porostů <strong>bez poškození okolních stromů, bez smyků</strong>, bez poškození kořenových systémů.
                       Výkony vrtulníku jsou podle složitosti terénu a vzdálenosti přibližování v rozmezí 100 až 300 kubíků dřeva denně.</p>
                                        <p class="tip"> » prohlédněte si některé naše <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:timberHarvesting")) ?>">zakázky z těžby dřeva</a></p>
                    <blockquote>
                        <p>Způsob přibližování dřeva pomocí vrtulníku je vůči lesu <strong>velmi šetrný</strong>. Na rozdíl od ostatních způsobů přibližování. Během těžby za pomoci vrtulníku
                            <strong>nedochází vůbec k narušení půdního svršku</strong>, odhalení a poničení kořenového systému okolních stromů pohybem těžké lesní techniky nebo vláčení
                            poražených kmenů.</p>
                    </blockquote>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("TimberHarvesting:")) ?>"> » více o těžbě dřeva</a>

                </div>

                <div class="tool" id="carusel-limingforests">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("LimingForests:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vápnění lesů vrtulníkem'))) ?></a></h2>
                    <p>Společnost Aerocentrum se zabývá touto činností již od svého založení. Naše vrtulníky již povápnily desítky tisíc hektarů lesů, a to jak pro soukromé vlastníky
                        lesů, tak v projektech "Lesů ČR", "Phare", dlouhodobém projektu Ministerstva zemědělství ČR a také v Německu.</p>
                    <p class="tip"> » prohlédněte si některé naše <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Reference:limingForests")) ?>"> zakázky z vápnění lesů</a></p>
                    <p>Pro tyto účely využíváme těžké transportní <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Mi8:")) ?>">vrtulníky Mi-8T</a>, které jsou schopny nést v podvěsu až 3 tuny nákladu vápence.
                        Díky tomu na rozdíl od jiných technologií, tento vrtulník obsáhne jedním letem jeden hektar lesa (při požadavku 3 tuny na hektar).
                        Tím se tato <strong>technologie kvalitou i rychlostí práce řadí k nejlepším</strong>.</p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("LimingForests:")) ?>"> » více o vápnění lesů</a>

                </div>

                <div class="tool" id="carusel-photoflight">
                    <h2 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link("PhotoFlight:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Fotolety a filmování z vrtulníku'))) ?></a></h2>
                    <p>Pro <a href="<?php echo TemplateHelpers::escapeHtml($control->link("PhotoFlight:")) ?>">fotolety a filmování</a> poskytujeme vrtulníky se zkušeným pilotem. Zákazník si může fotografování či filmování z paluby vrtulníku zabezpečit sám nebo
                        jsme schopni zajistit profesionálního fotografa nebo kameramana. Spolupracujeme s několika renomovanými kameramany.</p>
                    <blockquote>
                        <p>Naše vrtulníky se podíleli při natáčení např. filmů Tmavomodrý svět, <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:default", array('id' => 23))) ?>">Snowborďáci</a>, Královský slib, Krev zmizelého, Mach a Šebestová, Hartova válka, leteckých záběrů do reklamních šotů
                            , televizního seriálu Pamět stromů, ...</p>
                    </blockquote>
                                        <p>Pro tyto účely filmování používáme vrtulníky <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R22:")) ?>">R22</a> , <a href="<?php echo TemplateHelpers::escapeHtml($control->link("R44:")) ?>">R44</a> a <a href="<?php echo TemplateHelpers::escapeHtml($control->link("MD520:")) ?>">MD520</a> pro jejich vynikající manévrovací schopnosti a výborný výhled z kabiny.</p>
                    <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link("PhotoFlight:")) ?>"> » více focení a filmování z vrtulníku</a>

                </div>

            </div>
        </div>
        <div id="navi">
            <a class="active"><div id="thumb-aerocentrum"><?php echo TemplateHelpers::escapeHtml($template->upper('Aero centrum')) ?></div></a>
            <a><div id="thumb-assembly"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Stavby a montáže'))) ?></div></a>
            <a><div id="thumb-transport"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Transport břemen'))) ?></div></a>
            <a><div id="thumb-pilotschool"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Pilotní škola'))) ?></div></a>
            <a><div id="thumb-sightseeingflights"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vyhlídkové lety'))) ?></div></a>
            <a><div id="thumb-service"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Servisní středisko'))) ?></div></a>
            <a><div id="thumb-aerialspraying"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Letecké postřiky'))) ?></div></a>
            <a><div id="thumb-timberharvesting"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Těžba dřeva'))) ?></div></a>
            <a><div id="thumb-limingforests"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Vápnění lesů'))) ?></div></a>
            <a><div id="thumb-photoflight"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Fotolety filmování'))) ?></div></a>
        </div>
    </div>
    <div class="line-green"></div>
    <div class="page pagecontent">
        <div class="references">
            <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Nejnovější reference'))) ?></h2>
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($articles) as $article): $modulus = $iterator->getCounter() % 2 ?>
            <?php if ($iterator->isFirst()): ?><div class="container"><?php endif ?>

                <div class="article"><?php if ($article['perex_photo_path']): ?>
                    <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:", array('id' => $article['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array('photo'))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>>

                    <?php echo TemplateHelpers::escapeHtml($template->image($article['perex_photo_path'], 112, 75, 'foto', FALSE, TRUE, FALSE)) ?>

                    </a>
<?php endif ?>
                    <div class="content">
                        <h3> <a href="<?php echo TemplateHelpers::escapeHtml($control->link("Article:", array('id' => $article['id']))) ?>"><?php echo TemplateHelpers::escapeHtml($template->truncate($article['heading'], 40)) ?></a></h3>
                    <?php echo $template->html_cut($template->texy($article['perex_html']), 90) ?>


                    </div>

                </div>
<?php if ($modulus == 0): ?>
                <div class="clear"></div>
                <?php if ($iterator->isLast()): ?></div>
                <?php else: ?></div><div class="hr"></div><div class="container">
<?php endif ?>
            <?php elseif ($iterator->isLast()): ?></div>
<?php endif ;endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
        <div class="clear"></div>
    </div>

    <div class="videoreference">
        <h2 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Video reference'))) ?></h2>
        <div class="container">

<?php $img = Helpers::image($video['thumb_path'],266,177,$video['name_'],FALSE,TRUE,FALSE) ;if (Helpers::is_url($video['video_path'])): ?>
            <a class="youtube" href="<?php echo TemplateHelpers::escapeHtml($video['video_path']) ?>" title="<?php echo TemplateHelpers::escapeHtml($video['name_']) ?>" onclick="javascript:$.get(<?php echo TemplateHelpers::escapeHtmlJs($control->link("Video:updateViews", array('id'=>$video['id']))) ?>,{}, function(payload) {});">
                <?php echo TemplateHelpers::escapeHtml($img) ?>

                <div class="play_button"></div>
            </a>
<?php else: ?>
            <a class="video_link" href="<?php echo TemplateHelpers::escapeHtml($img->src) ?>" name="<?php echo TemplateHelpers::escapeHtml($video['video_path']) ?>" title="<?php echo TemplateHelpers::escapeHtml($video['name_']) ?>" onclick="javascript:$.get(<?php echo TemplateHelpers::escapeHtmlJs($control->link("Video:updateViews", array('id'=>$video['id']))) ?>,{}, function(payload) {});">
                <?php echo TemplateHelpers::escapeHtml($img) ?>

                <div class="play_button"></div>
            </a>
<?php endif ?>

        </div>
    </div>

    <div class="clear"></div>
</div>
<div class="line-blue"></div>

</div>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbd95b284f87_scripts')) { function _lbd95b284f87_scripts($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'scripts', $template->getParams()) ?>
       <script type="text/javascript">
            head.ready(function() {
                
                // initialize scrollable
                $(".scrollable").scrollable();

                // initialize scrollable and return the programming API
                $("#carusel").scrollable({
                    items: '#tools'
                    // use the navigator plugin
                }).navigator("#navi");

                

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
$description = 'Provádíme letecké práce vrtulníky, leteckou pilotní školu, vyhlídkové lety vrtulníky a servisní středisko pro vrtulníky Robinson.' ;$keywords = 'aerocentrum, vrtulník, letecké práce, letecká škola, vyhlídkové lety vrtulníkem' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); } ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
