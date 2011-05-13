<?php //netteCache[01]000357a:2:{s:4:"time";s:21:"0.68884700 1305276796";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:71:"/var/www/projekty/aero/app/FrontModule/templates/Contacts.default.latte";i:2;i:1302595231;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/FrontModule/templates/Contacts.default.latte

?><?php
$_l = LatteMacros::initRuntime($template, true, '241lrz770a'); unset($_extends);


//
// block main
//
if (!function_exists($_l->blocks['main'][] = '_lb373b41b440_main')) { function _lb373b41b440_main($_l, $_args) { extract($_args)
?>
<div class="main">

    <div id="contacts">
        <h1 class="cufon"><?php echo TemplateHelpers::escapeHtml($template->upper($template->translate('Kontakty'))) ?></h1>

        <div class="left-panel">
            <div class="top">
                <div class="phone cufon">+420 315 622 277</div>
                <div class="email cufon"><a href="mailto:info@aerocentrum.cz">info@aerocentrum.cz</a></div>
            </div>

            <div class="box">
                <address>
                    <strong>Aerocentrum spol. s r.o.</strong>
                    Letiště Mělník-Hořín<br />
                    276 01 Mělník<br />
                    Česká republika
                </address>

                <table class="numbers">
                    <tr>
                        <th>IČ:</th>
                        <td>47551682</td>
                    </tr>
                    <tr>
                        <th>DIČ:</th>
                        <td>CZ47551682</td>
                    </tr>
                    <tr>
                        <th>tel:</th>
                        <td>+420 315 622 277</td>
                    </tr>
                    <tr>
                        <th>fax:</th>
                        <td>+420 315 621 132</td>
                    </tr>
                    <tr>
                        <th>č. účtu:</th>
                        <td></td>
                    </tr>
                </table>

                <div class="clear"></div>

            </div>
                


            <div class="persons">
                <div class="person even">
                    <h3>Ing. Lubomír Ogurčák</h3>
                    <span>jednatel</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:ogurcak@aerocentrum.cz">ogurcak@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 602 317 891</td>
                        </tr>

                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/icon-phone.png" alt="Telefon" /></th>
                            <td>+420 315 627 795</td>
                        </tr>

                    </table>
                </div>

                <div class="person odd">
                    <h3>Ing. Petr Černý</h3>
                    <span>provozní ředitel</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:cerny@aerocentrum.cz">cerny@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 602 477 468</td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/icon-phone.png" alt="Telefon" /></th>
                            <td>+420 315 627 794</td>
                        </tr>

                    </table>
                </div>
                <div class="clear"></div>
                <div class="person even">
                    <h3>Tomáš Kozák</h3>
                    <span>příprava zakázek</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:kozak@aerocentrum.cz">kozak@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 602 317 897</td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/icon-phone.png" alt="Telefon" /></th>
                            <td>+420 315 627 797</td>
                        </tr>

                    </table>
                </div>

                <div class="person odd">
                    <h3>Vlasta Kolář</h3>
                    <span>technické oddělení</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:kolar@aerocentrum.cz">kolar@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 737 346 797</td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/icon-phone.png" alt="Telefon" /></th>
                            <td>+420 315 627 799</td>
                        </tr>

                    </table>
                </div>
                <div class="clear"></div>

                <div class="person even">
                    <h3>Bc. Zuzana Ogurčáková</h3>
                    <span>ekonomika</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:zuzana.ogurcakova@aerocentrum.cz">zuzana.ogurcakova@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 602 317 894</td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/icon-phone.png" alt="Telefon" /></th>
                            <td>+420 233 310 554</td>
                        </tr>

                    </table>
                </div>

                <div class="person odd">
                    <h3>Eva Krejzová 	</h3>
                    <span>sekretariát</span>

                    <table class="contact">
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-email.png" alt="Email" /></th>
                            <td><a href="mailto:krejzova@aerocentrum.cz">krejzova@aerocentrum.cz</a></td>
                        </tr>
                        <tr>
                            <th><img src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/images/ico-mobile.png" alt="Mobil" /></th>
                            <td>+420 606 893 676</td>
                        </tr>
                      
                    </table>
                </div>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="right-panel">
            <div class="top">
                <h2 class="map cufon">Kde nás najdete:</h2>
            </div>

            <div class="map">
                <iframe width="330" height="330" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?source=s_q&amp;hl=cs&amp;geocode=&amp;q=leti%C5%A1t%C4%9B+m%C4%9Bln%C3%ADk+ho%C5%99%C3%ADn&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=50.777825,135.263672&amp;ie=UTF8&amp;hq=leti%C5%A1t%C4%9B+m%C4%9Bln%C3%ADk+ho%C5%99%C3%ADn&amp;radius=15000.000000&amp;split=1&amp;hnear=&amp;cid=15346934865259866436&amp;ll=50.341955,14.463501&amp;spn=0.350576,0.917358&amp;z=9&amp;iwloc=A&amp;output=embed"></iframe>
            </div>

            <div id="contactform">
                <div class="top">
                    <h2 class="email cufon">Kontaktní formulář</h2>

                    <div class="clear"></div>
                </div>
                <?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($flashes) as $flash): ?>
                <div class="flash <?php echo TemplateHelpers::escapeHtml($flash->type) ?>"><?php echo TemplateHelpers::escapeHtml($flash->message) ?></div>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

<?php $form = $control['contactForm'] ;if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ?>
                <!-- errors -->
<?php $errors = $form->errors ;if ($errors): call_user_func(reset($_l->blocks['errors']), $_l, get_defined_vars()) ;endif ?>

                <table>
                    <tr>
                        <th><?php echo TemplateHelpers::escapeHtml($form['name']->label) ?></th>
                        <td><?php echo TemplateHelpers::escapeHtml($form['name']->control) ?></td>
                    </tr>

                    <tr>
                        <th><?php echo TemplateHelpers::escapeHtml($form['email']->label) ?></th>
                        <td><?php echo TemplateHelpers::escapeHtml($form['email']->control) ?></td>
                    </tr>

                    <tr>
                        <th><?php echo TemplateHelpers::escapeHtml($form['company']->label) ?></th>
                        <td><?php echo TemplateHelpers::escapeHtml($form['company']->control) ?></td>
                    </tr>

                    <tr>
                        <th><?php echo TemplateHelpers::escapeHtml($form['text']->label) ?></th>
                        <td><?php echo TemplateHelpers::escapeHtml($form['text']->control) ?></td>
                    </tr>
                </table>
                <table class="submit">
                    <tr>
                        <th></th>
                        <td><?php echo TemplateHelpers::escapeHtml($form['send']->control) ?></td>
                    </tr>

                </table>

<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $control->getWidget($form); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>

            </div>

            <div class="clear"></div>
        </div>

        <div class="clear"></div>
    </div>
</div>
<?php
}}


//
// block errors
//
if (!function_exists($_l->blocks['errors'][] = '_lb257fa83e3f_errors')) { function _lb257fa83e3f_errors($_l, $_args) { extract($_args)
?>
                <ul class="error">
<?php foreach ($iterator = $_l->its[] = new SmartCachingIterator($errors) as $error): ?>
                    <li><?php echo TemplateHelpers::escapeHtml($error) ?></li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                </ul>
<?php
}}


//
// block next
//
if (!function_exists($_l->blocks['next'][] = '_lbc91851c0af_next')) { function _lbc91851c0af_next($_l, $_args) { extract($_args)
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
$_l->extends = '@layout.full.latte' ?>

<?php $description = 'Kontakty letecké společnosti Aerocentrum.' ;$keywords = 'aerocentrum, vrtulník, kontakty' ?>

<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
