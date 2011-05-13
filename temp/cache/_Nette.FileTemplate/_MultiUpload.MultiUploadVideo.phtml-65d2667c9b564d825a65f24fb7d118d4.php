<?php //netteCache[01]000358a:2:{s:4:"time";s:21:"0.30508800 1305207117";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:72:"/var/www/projekty/aero/app/components/MultiUpload/MultiUploadVideo.phtml";i:2;i:1305207099;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/MultiUpload/MultiUploadVideo.phtml

?><?php
$_l = LatteMacros::initRuntime($template, NULL, 'p46i70nmrs'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>

<div id="container">
    <div id="message">Váš prohlížeč nepodporuje flash.</div>

    <div id="filelist"><table></table></div>
    <div class="clear"></div>
    <a id="pickfiles" href="#">Procházet</a>
        
</div>

<script type="text/javascript">
head.ready(function() {
    $('#pickfiles')
        .button({
            icons: {
                primary: 'ui-icon-triangle-1-s'
            }
    });


$(function(){
	// Setup flash version        
	var uploader = new plupload.Uploader({
		// General settings
		runtimes : 'html5, flash',
                browse_button : 'pickfiles',
	        container : 'container',
		url : <?php echo TemplateHelpers::escapeJs($control->link("upload")) ?>,
		max_file_size : '100mb',
		chunk_size : '1mb',
		unique_names : true,
                rename: true,
                multi_selection:false,

		filters : [
			{ title : "Flash files", extensions : "mpg,avi,wmv,movflv,FLV,mp4,MP4"},
		],

		// Resize images on clientside if we can
		resize : { width : 1200, height : 900, quality : 90},

		// Flash settings
		flash_swf_url : '<?php echo $baseUri ?>/static/js/plupload.flash.swf'
	});

        uploader.bind('Init', function(up, params) {
		$('#message').html('Maximální velikost videa je ' + plupload.formatSize(uploader.settings.max_file_size) + '!');
	});

        uploader.init();

        uploader.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {

                if(file.size > uploader.settings.max_file_size) {
                    alert('Soubor je příliš veliký.');
                    uploader.removeFile(file);
                }
                else {
                    $('#filelist > table').append(
                        '<tr id="' + file.id + '">' +
                            '<td class="name">'
                                + file.name +
                            '</td>' +
                            '<td class="size">' +
                                plupload.formatSize(file.size) +
                            '</td>' +
                            '<td class="percent">' +
                                file.percent + "%" +
                            '</td>' +
                            '<td class="status"> </td>' +
                        '</tr>'
                    );

                    up.refresh(); // Reposition Flash/Silverlight

                    uploader.start();
                }

            });
        });

        uploader.bind('QueueChanged', function(up) {
            if(uploader.files.length>1) {
                $.each(uploader.splice(0,1), function(i, file) {
                    $('#' + file.id).remove();
                });
            }
        });

	uploader.bind('UploadProgress', function(up, file) {
            $('#' + file.id + ' > .percent').html(file.percent + "%");

            if(file.status==plupload.DONE) {
                $('#' + file.id + ' > .percent').html("100%")
            }
	});

        uploader.bind('Error', function(up, err) {
	        $('#filelist').append("<div>Error: " + err.code +
	            ", Message: " + err.message +
	            (err.file ? ", File: " + err.file.name : "") +
	            "</div>"
	        );

            up.refresh(); // Reposition Flash/Silverlight
        });

        uploader.bind("FileUploaded",function(up, file) {
            if(file.status==plupload.DONE) {
                if(file.target_name) {
                    $("[name='video[tmpname]']").val(plupload.xmlEncode(file.target_name));
                    //$('#container').append('<input type="hidden" name="video[tmpname]" value="'+plupload.xmlEncode(file.target_name)+'" />')
                }
                $("[name='video[name]']").val(plupload.xmlEncode(file.name));
                //$('#container').append('<input type="hidden" name="video[name]" value="'+plupload.xmlEncode(file.name)+'" />')

                actionClass = 'done';
            }
            if (file.status == plupload.FAILED) {
                actionClass = 'failed';
            }
            if (file.status == plupload.QUEUED) {
                actionClass = 'delete';
            }
            if (file.status == plupload.UPLOADING) {
                actionClass = 'uploading';
            }

            $('#' + file.id + ' > .status').attr('class', 'status ' + actionClass);
        });

    /*    $('#uploadfiles').click(function(e) {
            uploader.start();
	    e.preventDefault();
        });*/


        // Client side form validation
        //$('form').submit(function(e) {
        $("[name='send']").click(function(e) {
            if (uploader.total.uploaded == 0) {
                if (uploader.files.length > 0) {
                    e.preventDefault();
                    alert('Musíte počkat na nahrání vybraného souboru.');
                }
                else {
                    e.preventDefault();
                    alert('Musíte vybrat video.');
                }
            }
            else {
                if (uploader.total.uploaded == uploader.files.length) {
                    $('form').submit();
                }
                else {
                    e.preventDefault();
                    alert('Musíte počkat na nahrání vybraného souboru.');
                }
            }
        });

});
});
</script>