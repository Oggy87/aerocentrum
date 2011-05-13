<?php //netteCache[01]000336a:2:{s:4:"time";s:21:"0.00699900 1305116125";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:50:"/var/www/projekty/aero/app/templates/@layout.latte";i:2;i:1304609702;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/templates/@layout.latte

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'g8okdny4ff'); unset($_extends);


//
// block css
//
if (!function_exists($_l->blocks['css'][] = '_lb8846dbaa8f_css')) { function _lb8846dbaa8f_css($_l, $_args) { extract($_args)
;$_ctrl = $control->getWidget("css"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('reset.css') ;$_ctrl = $control->getWidget("cssPrint"); if ($_ctrl instanceof IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render('reset.css') ;
}}


//
// block js
//
if (!function_exists($_l->blocks['js'][] = '_lb913bb45ac3_js')) { function _lb913bb45ac3_js($_l, $_args) { extract($_args)
?>

        <script type="text/javascript">
            var staticuri = "<?php echo $staticUri ?>/";

            head.js("http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js",
                    "<?php echo $staticUri ?>/js/analytics.js",
                    "<?php echo $staticUri ?>/js/netteForms.js",
                    "<?php echo $staticUri ?>/js/jquery.livequery.js",
                    "<?php echo $staticUri ?>/js/jquery.nette.js",
                    "<?php echo $staticUri ?>/js/jquery.tools.min.js",
                    "<?php echo $staticUri ?>/js/jquery-ui-1.8.12.custom.min.js",
                    "<?php echo $staticUri ?>/js/cufon-yui.js",
                    "<?php echo $staticUri ?>/js/klavika.js",
                    "<?php echo $staticUri ?>/js/flowplayer-3.2.6.min.js",
                    "<?php echo $staticUri ?>/js/jquery.fancybox-1.3.4.pack.js",
                    "<?php echo $staticUri ?>/js/jquery.easing-1.3.pack.js",
                    "<?php echo $staticUri ?>/js/jquery.mousewheel-3.0.4.pack.js",
                    "<?php echo $staticUri ?>/js/player.js",
                    "<?php echo $staticUri ?>/js/jquery.selectbox-0.1.min.js"
          );
	</script>
<?php
}}


//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb562a03c179_scripts')) { function _lb562a03c179_scripts($_l, $_args) { extract($_args)
?>
        <script type="text/javascript">

                head.ready(function() {

                    Cufon.replace('.cufon', {
                            hover: true
                        });
                    Cufon.replace('#menu a', {
                            hover: true,
                            textTransform: 'uppercase'
                    });

                    $("form").livequery( function() {
                            Nette.initForm(this);
                    });
                
                    flowplayer("a.video", "<?php echo $staticUri ?>/js/flowplayer-3.2.6-0.swf", {
                            clip:  {
                                autoPlay: false,
                                autoBuffering: true
                            },
                            plugins: {
                                controls: {
                                    url: '<?php echo $staticUri ?>/js/flowplayer.controls-3.2.4.swf',

                                    autoHide: {

                                        // make it hide faster
                                        hideDelay: 1000
                                    }
                                }
                            }
                    });

                    $("a.fancybox").fancybox();

                    $("a.iframe").fancybox();

                    $(".youtube").click(function() {
                        $.fancybox({
                                    'padding'		: 0,
                                    'autoScale'		: false,
                                    'transitionIn'	: 'none',
                                    'transitionOut'	: 'none',
                                    'title'			: this.title,
                                    'width'		: 680,
                                    'height'		: 495,
                                    'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                                    'type'			: 'swf',
                                    'swf'			: {
                                             'wmode'		: 'transparent',
                                            'allowfullscreen'	: 'true'
                                    }
                        });

                        return false;
                    });

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
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (isset($description)): ?>
	<meta name="description" content="<?php echo TemplateHelpers::escapeHtml($description) ?>" />
<?php endif ;if (isset($robots)): ?>
	<meta name="robots" content="<?php echo TemplateHelpers::escapeHtml($robots) ?>" />
<?php endif ;if (isset($keywords)): ?>
        <meta name="keywords" content="<?php echo TemplateHelpers::escapeHtml($keywords) ?>" />
<?php endif ?>

        <meta name="owner" content="Petr Ogurčák " />
        <meta name="copyright" content="Petr Ogurčák; petr.ogurcak.cz" />
        <meta name="author" content="Petr Ogurčák; petr.ogurcak.cz" />

	<title><?php echo TemplateHelpers::escapeHtml($title) ?> | <?php echo TemplateHelpers::escapeHtml($layout_title) ?></title>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['css']), $_l, get_defined_vars()); } ?>

	<link rel="shortcut icon" href="<?php echo TemplateHelpers::escapeHtml($basePath) ?>/favicon.ico" type="image/x-icon" />

	<script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtml($staticUri) ?>/js/head.min.js"></script>
<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['js']), $_l, get_defined_vars()); } ?>
        <!--[if IE]>
        <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtmlComment($staticUri) ?>/js/cufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo TemplateHelpers::escapeHtmlComment($staticUri) ?>/js/klavika.js"></script>
        <script type="text/javascript">
            Cufon.replace('.cufon', {
                            hover: true
                        });
                        Cufon.replace('#menu a', {
                                hover: true,
                                textTransform: 'uppercase'
                        });
        </script>
        <![endif]-->
<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars()); } ?>
        
</head>

<body>
	
<?php LatteMacros::callBlock($_l, 'layout', $template->getParams()) ?>

    <script type="text/javascript"> 
        head.ready(function() {
            Cufon.now();
        });
    </script>
</body>
</html>
<?php
if ($_l->extends) {
	ob_end_clean();
	LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
