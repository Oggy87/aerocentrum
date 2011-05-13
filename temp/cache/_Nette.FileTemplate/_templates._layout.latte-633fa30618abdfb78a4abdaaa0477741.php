<?php //netteCache[01]000348a:2:{s:4:"time";s:21:"0.66257500 1305142300";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:62:"/var/www/projekty/aero/app/FrontModule/templates/@layout.latte";i:2;i:1304496249;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/@layout.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, 'xpx3sku1li'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb9ebeef65d1_css')) { function _lb9ebeef65d1_css($_l, $_args) { extract($_args)
;LatteMacros::callBlockParent($_l, 'css', $template->getParams()) ;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('screen.css','jquery.selectbox.css') ?>
    <link rel="stylesheet" type="text/css" href="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/css/jquery.fancybox-1.3.4.css" />

<?php
}}


//
// block layout
//
if (!function_exists($_l->blocks['layout'][] = '_lb98bde73e1d_layout')) { function _lb98bde73e1d_layout($_l, $_args) { extract($_args)
?>
<div id="page">
    <div id="head"><?php call_user_func(reset($_l->blocks['logo']), $_l, get_defined_vars()) ?>
        <div id="callus">
            <a class="call cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Contacts:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Zavolejte nám'))) ?></a>

            <a class="number cufon" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Contacts:")) ?>">+420 315 622 277</a>

        </div>
        <div id="languages">
<?php call_user_func(reset($_l->blocks['languages']), $_l, get_defined_vars()) ?>
        </div>

        <div id="headmenu">
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Homepage:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Úvodní stránka')) ?></a>

            <span>|</span>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Contacts:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Napiště nám')) ?></a>

                    </div>
    </div>
    <div class="menu-container">
<?php $_ctrl = $control->getWidget("webStructure"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->renderMenu() ?>
    </div>
<?php LatteMacros::callBlock($_l, 'content', $template->getParams()) ;try { $presenter->link(":Front:HomePage:*"); } catch (InvalidLinkException $e) {}; if ($presenter->getLastCreatedRequestFlag("current")): else: ?>
    <div id="sharebox">
        <div class="sharer">
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo TemplateHelpers::escapeHtml($control->link("//this")) ?>&amp;layout=box_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:65px;" allowTransparency="true"></iframe>
        </div>
        <div class="sharer">
            <iframe src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php echo TemplateHelpers::escapeHtml($control->link("//this")) ?>&amp;via=Aerocentrum&amp;count=horizontal&amp;text=<?php echo TemplateHelpers::escapeHtml($title) ?>" allowtransparency="true" frameborder="0" scrolling="no" style="width:100px; height:25px;"></iframe>
        </div>
    </div>
<?php endif ?>
</div>
<?php call_user_func(reset($_l->blocks['underpage']), $_l, get_defined_vars()) ;call_user_func(reset($_l->blocks['footer']), $_l, get_defined_vars()) ;
}}


//
// block logo
//
if (!function_exists($_l->blocks['logo'][] = '_lbd2d86c2724_logo')) { function _lbd2d86c2724_logo($_l, $_args) { extract($_args)
?>
        <a id="logo" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Homepage:")) ?>"><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/logo.png" width="346" height="156" alt="Aerocentrum - <?php echo TemplateHelpers::escapeHtml($template->translate('úvodní stránka')) ?>" /></a>
<?php
}}


//
// block languages
//
if (!function_exists($_l->blocks['languages'][] = '_lb7e246a3ee8_languages')) { function _lb7e246a3ee8_languages($_l, $_args) { extract($_args)
;foreach ($iterator = $_l->its[] = new SmartCachingIterator(BaseModel::fetchAll('language')->where('active',1)) as $lang): ?>
            <a href="<?php echo TemplateHelpers::escapeHtml($control->link("this", array('lang' => $lang['id']))) ?>"<?php if ($_l->tmp = trim(implode(" ", array_unique(array($lang['id'],$presenter->lang == $lang['id'] ? 'current':null))))) echo ' class="' . TemplateHelpers::escapeHtml($_l->tmp) . '"' ?>><?php echo TemplateHelpers::escapeHtml($lang['id']) ?></a>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
}}


//
// block underpage
//
if (!function_exists($_l->blocks['underpage'][] = '_lb2b566e69b6_underpage')) { function _lb2b566e69b6_underpage($_l, $_args) { extract($_args)
?>
<div id="underpage">

    <div class="ads">
        <div class="ad">
            <div class="box">
                <h3 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:FlyingSchool:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Chcete být pilot vrtulníku?')) ?></a></h3>

                <p>Získejte pilotní licenci v naší vrtulníkové pilotní škole.</p>
                <p>Přeškolíme Vás na vrtulníky typu Robinson R22 a R44.</p>

            </div>
            <div class="foot">
                <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:FlyingSchool:")) ?>">více o pilotní škole</a>

            </div>
        </div>

        <div class="ad">
            <div class="box">
                <h3 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Advertisement:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Chcete originální reklamu?')) ?></a></h3>

                <p>Pořiďte si originální reklamu. Při práci na Vaší zakázce může náš vrtulník nosit Vaše barvy.</p>

            </div>
            <div class="foot">
                <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:Advertisement:")) ?>">více o reklamě na vrtulníku</a>

            </div>
        </div>

        <div class="ad">
            <div class="box">
                <h3 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:SightseeingFlight:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Hledáte jedinečný zážitek?')) ?></a></h3>

                <p>Zažijte nevšední zážitek. Nastupte do našeho vrtulníku a užijte
                    si jedinečný vyhlídkový let.</p>

            </div>
            <div class="foot">
                <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:SightseeingFlight:")) ?>">více o vyhlídkových letech</a>

            </div>
        </div>

        <div class="ad last">
            <div class="box">
                <h3 class="cufon"><a href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:AirWork:")) ?>"><?php echo TemplateHelpers::escapeHtml($template->translate('Výškové práce jednoduše?')) ?></a></h3>

                <p>Výškové, stavební a montážní práce za pár minut? Ano, vrtulníkem.</p>
                <p>Nejnáročnější výškové práce nelze dělat jednodušeji.</p>

            </div>
            <div class="foot">
                <a class="more" href="<?php echo TemplateHelpers::escapeHtml($control->link(":Front:AirWork:")) ?>">více o leteckých pracech</a>

            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
<?php
}}


//
// block footer
//
if (!function_exists($_l->blocks['footer'][] = '_lb266fee7825_footer')) { function _lb266fee7825_footer($_l, $_args) { extract($_args)
?>
<div id="footer">

    <div class="content">
        <div class="icons">
            <a class="facebook" href="http://www.facebook.com/aerocentrum">facebook</a>
            <a class="youtubei" href="http://www.youtube.com/user/Aerocentrum">youtube</a>
             <a class="atom" href="<?php echo TemplateHelpers::escapeHtml($control->link("Feed:atom")) ?>">atom</a>


            <div class="clear"></div>
        </div>

        <a class="ogurcak" href="http://petr.ogurcak.cz">tvorba internetových stránek</a>
        <div class="clear"></div>
    </div>
</div>
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
$_l->extends = '../../templates/@layout.latte' ?>



<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
