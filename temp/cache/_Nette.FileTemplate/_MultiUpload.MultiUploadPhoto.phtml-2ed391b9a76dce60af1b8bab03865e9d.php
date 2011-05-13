<?php //netteCache[01]000358a:2:{s:4:"time";s:21:"0.43211800 1305208414";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"/var/www/projekty/aero/app/components/MultiUpload/MultiUploadPhoto.phtml";i:2;i:1304527991;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/MultiUpload/MultiUploadPhoto.phtml

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'clc5fvtgvo'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>
<div id="flash_uploader">Váš prohlížeč nemá nainstalován Flash.</div>

<script type="text/javascript">
head.ready(function() {
// Convert divs to queue widgets when the DOM is ready
$(function() {
	// Setup flash version
	$("#flash_uploader").pluploadQueue({
		// General settings
		runtimes : 'flash,html5',
		url : <?php echo TemplateHelpers::escapeJs($control->link("upload")) ?>,
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,
		filters : [
			{ title : "Image files", extensions : "jpg,JPG,gif,GIF,png,PNG"},
		],

		// Resize images on clientside if we can
		resize : { width : 1200, height : 900, quality : 90},

		// Flash settings
		flash_swf_url : '<?php echo $baseUri ?>/static/js/plupload.flash.swf'
	});        

        var uploader = $('#flash_uploader').pluploadQueue();

        uploader.bind('Error', function(up, error) {
            console.log(error);

        });

        // Client side form validation
        $('form').submit(function(e) {
            //kdyz nic nenahrano
            if (uploader.total.uploaded == 0) {
                //kdyz neco pripraveno k nahrani
                if (uploader.files.length > 0) {
                    e.preventDefault();
                    alert('Musíte vybrané soubory nahrát.');
                }
                else {
                    e.preventDefault();
                    alert('Musíte vybrat alespoň jeden soubor.');
                }
            }
            else {
                if (uploader.total.uploaded == uploader.files.length) {
                    $('form').submit();
                }
                else {
                    e.preventDefault();
                    alert('Musíte vybrané soubory nahrát.');
                }
            }
        });

});
});
</script>