$(window).on("scroll", function() {
    jQ = jQuery.noConflict();
    // if(jQ("#portfolio-posts").visible()) {
    // // if($(window).scrollTop() >= ($('#portfolio-posts').position().top )) {
    //     $posts = $('.portfolio-post');
    //     var time = 500;
    //     $posts.each(function () {
    //         var self = this;
    //         setTimeout(function () {
    //             if (!$(self).hasClass('visible')){
    //                 $(self).addClass('visible');
    //             }
    //         }, time);
    //         time += 100;
    //     })
    // }
    $posts = $('.portfolio-post');
    var time = 500;
    $posts.each(function () {
        var self = this;
        if(jQ(self).visible(true)){
            if (!$(self).hasClass('visible')){
                $(self).addClass('visible');
            }
        }
    })

});