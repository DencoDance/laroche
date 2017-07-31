
$(function(){
    var

        circlesWrap     = $('#circles-wrap'),
        CSC				= $('#Middle-group #Combined-Shape-Copy'),
        grL 			= $('#Left-group'),
        grR 			= $('#Right-group');
        myWindow        = $(window);
        wasSeen         = false;

        var target          = $('#circles-wrap #Desktop');
    function isScrolledIntoView(elem)
    {

        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    var addActiveIsVisible = function(){

        var element         = target;
        var fullyInView     = true;
        var isElementInView = isScrolledIntoView(element);

        if (isElementInView && !wasSeen) {
            TweenLite.to(grL, 1, {ease: CustomEase.create("custom", "M0,0,C0.826,0.334,0.254,0.756,1,1"),x:0});
            TweenLite.to(grR, 1, {ease: CustomEase.create("custom", "M0,0,C0.826,0.334,0.254,0.756,1,1"),x:0});

            wasSeen = true;
        }
        if(isElementInView){
            TweenMax.to( CSC, 0.4, {css:{opacity:1}, ease: CustomEase.create("custom", "M0,0,C0.826,0.334,0.254,0.756,1,1")});
        }
    };
    myWindow.on("scroll",function() {
        addActiveIsVisible();
    });
    addActiveIsVisible();
});
