$(document).ready(function() {

    /*$(".video_link").fancybox({
        'frameWidth': 640,
        'frameHeight': 480,
        'overlayShow': true,
        'overlayOpacity': 0.7,
        'onStart' : function(link) {
            $($(link).attr('href')).css("display: block;");
        }

    });*/

    $(".video_link").fancybox({
        'hideOnContentClick':false,
        'overlayOpacity' :.6,
        'zoomSpeedIn'    :400,
        'zoomSpeedOut'   :400,
        'easingIn'       : 'easeOutBack',
        'easingOut'	 : 'easeInBack',
        'autoDimensions' : true,
        'type' : 'swf',
        'onStart' : function(link) {
             $f("fancybox-content", staticuri+"js/flowplayer-3.2.6-0.swf", {
                clip: {
                    url: staticuri+$(link).attr('name'),
                    autoPlay: true,
                    autoBuffering: false,
                    onStart:function(clip){
                        var content=jQuery(this.getParent());
                        var clipwidth = clip.metaData.width;
                        var clipheight= clip.metaData.height;
                        if ((clipwidth==undefined) ||  (clipheight==undefined)) {
                            clipwidth = 640;
                            clipheight = 480;
                        }
                        $("#fancybox-wrap").css({
                            width:clipwidth+40,
                            height:clipheight+40
                        });
                        content.css({
                            width:clipwidth+20,
                            height:clipheight+20
                        });
                        $("#fancybox-wrap").css('left', ((clipwidth + 36) > $(window).width() ? $(document).scrollLeft() : $(document).scrollLeft() + Math.round(($(window).width() - clipwidth	- 36)	/ 2)));
                        $("#fancybox-wrap").css('top',  ((clipheight + 50) > $(window).height() ? $(document).scrollTop() : $(document).scrollTop() + Math.round(($(window).height() - clipheight - 50)	/ 2)));
                        $("#fancybox-right, #fancybox-left").css({
                            height:clipheight-60,
                            bottom: '70px'
                        });

                    },
                    onFinish:function(){
                        $('#fancybox-close').trigger('click');
                    }
                }
             })
         },
         'onClosed' : function() {
             $f().unload();
             
         }
    });
});


