<?php //netteCache[01]000363a:2:{s:4:"time";s:21:"0.68637800 1305203709";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:77:"/var/www/projekty/aero/app/components/MultiUpload/MultiUploadVideoThumb.phtml";i:2;i:1305203600;}i:1;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:10:"checkConst";}i:1;s:19:"Framework::REVISION";i:2;s:30:"9f535f9 released on 2011-01-10";}}}?><?php

// source file: /var/www/projekty/aero/app/components/MultiUpload/MultiUploadVideoThumb.phtml

?><?php
$_l = LatteMacros::initRuntime($template, NULL, '21ss544ptq'); unset($_extends);

if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
?>

<div id="containerth">
    <div id="messageth">Váš prohlížeč nepodporuje flash.</div>

    <div id="filelistth"><table></table></div>
    <div class="clear"></div>
    <a id="pickfile" href="#">Procházet</a>
        
</div>

<script type="text/javascript">
head.ready(function() {
   $('#pickfile')
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
                browse_button : 'pickfile',
	        container : 'containerth',
		url : <?php echo TemplateHelpers::escapeJs($control->link("upload")) ?>,
		max_file_size : '100mb',
		chunk_size : '1mb',
		unique_names : true,
                rename: true,
                multi_selection:false,

		filters : [
			{ title : "Image files", extensions : "jpg,JPG,gif,GIF,png,PNG"},
		],

		// Resize images on clientside if we can
		resize : { width : 1200, height : 900, quality : 90},

		// Flash settings
		flash_swf_url : '<?php echo $baseUri ?>/static/js/plupload.flash.swf'
	});

        uploader.bind('Init', function(up, params) {
		$('#messageth').remove();
	});

        uploader.init();

        uploader.bind('FilesAdded', function(up, files) {
            $.each(files, function(i, file) {

                if(file.size > uploader.settings.max_file_size) {
                    alert('Soubor je příliš veliký.');
                    uploader.removeFile(file);
                }
                else {
                    $(".thumb .image").remove();
                    $('#filelistth > table').append(
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
	        $('#filelistth').append("<div>Error: " + err.code +
	            ", Message: " + err.message +
	            (err.file ? ", File: " + err.file.name : "") +
	            "</div>"
	        );

            up.refresh(); // Reposition Flash/Silverlight
        });

        uploader.bind("FileUploaded",function(up, file) {
            if(file.status==plupload.DONE) {
                if(file.target_name) {
                    $("[name='thumb[tmpname]']").val(plupload.xmlEncode(file.target_name));
                    //$('#containerth').append('<input type="hidden" name="thumb[tmpname]" value="'+plupload.xmlEncode(file.target_name)+'" />')
                }
                $("[name='thumb[name]']").val(plupload.xmlEncode(file.name));
                //$('#containerth').append('<input type="hidden" name="thumb[name]" value="'+plupload.xmlEncode(file.name)+'" />')

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
        $('form').submit(function(e) {

            if (uploader.total.uploaded == 0) {
                if (uploader.files.length > 0) {
                    e.preventDefault();
                    alert('Musíte počkat na nahrání vybraného souboru.');
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