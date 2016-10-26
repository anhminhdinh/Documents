/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$().ready(function () {
    // the body of this function is in assets/material-kit.js
    // loadTexts();
    //TODO: read lang cookie
    $(window).load(function () {
        $(".youtube").each(function () {
            // Based on the YouTube ID, we can easily find the thumbnail image
            $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');

            // Overlay the Play icon to make it look like a video player
            $(this).append($('<div/>', {
                'class': 'play'
            }));

            $(document).delegate('#' + this.id, 'click', function () {
                // Create an iFrame with autoplay set to true
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
                if ($(this).data('params'))
                    iframe_url += '&' + $(this).data('params');

                // The height and width of the iFrame should be the same as parent
                // var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })
                var iframe = $('<iframe/>', {
                    'frameborder': '0',
                    'src': iframe_url,
                    'width': $(this).width()
                })

                // Replace the YouTube thumbnail with YouTube HTML5 Player
                $(this).replaceWith(iframe);
            });
        });
        var cookieLang = Cookies.get('curlang');
        if (cookieLang == 'undefined')
            curlang = "vi";
        else {
            curlang = cookieLang;
        }
        setLang(curlang);
        var clientHeight = document.getElementById('navbar-main').clientHeight;
        $('body').css('padding-top', clientHeight);
        $('.head-link').css('padding-top', parseInt(clientHeight) + 5);
        $('.tlt').textillate({in: {effect: 'fadeInRightBig'}});
        // clientHeight = document.getElementById('id_header_img').clientHeight;
        // $('#id_header_img_div').css('height', clientHeight);
    });
});
var windowWidth = $(window).width();
$(window).resize(function () {
    if (windowWidth != $(window).width()) {
        location.reload();
        return;
    }
});
