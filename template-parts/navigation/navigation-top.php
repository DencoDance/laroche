<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
    <div class="logo"><a href="<?=get_home_url()?>"><img src="<?=get_template_directory_uri()?>/assets/images/logo.svg" class="style-svg"/></a></div>
<!--	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">--><?php //echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); ?><!--</button>-->
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
        <div id="hamCont">
            <div class="ham" id="ham-top"></div>
            <br/>
            <div class="ham" id="ham-bottom"></div>
        </div>
    </button>
    <div id="ham-clearfix"></div>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
<!--		<a href="#content" class="menu-scroll-down">--><?php //echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><!--<span class="screen-reader-text">--><?php //_e( 'Scroll down to content', 'twentyseventeen' ); ?><!--</span></a>-->
	<?php endif; ?>
</nav><!-- #site-navigation -->
<style>
    .ham {
        /*display:inline-block;*/
        margin-right:60px;
        height:4px;
        width:40px;
        background:white;
        border-radius:5px;
        transition:transform .5s, top .5s;
    }
    .navigation-top.active .ham{
        background: black;
    }
    .navigation-top .ham.active{
        background: white !important;
    }
    #ham-bottom.active{
        -webkit-transform:rotate(-45deg);
        -moz-transform:rotate(-45deg);
        -ms-transform:rotate(-45deg);
        transform:rotate(-45deg);
        top: -10px;
    }
    #ham-top.active{
        -webkit-transform:rotate(45deg);
        -moz-transform:rotate(45deg);
        -ms-transform:rotate(45deg);
        transform:rotate(45deg);
    }
    #hamCont {
        padding-top: 25px;
        line-height: 6px;
        display:inline-block;
        height:60px;
        position:relative;
        top:3px;
    }
    #hamCont:hover {
        cursor:pointer;
    }
    #ham-bottom {
        position:relative;
    }
    .navigation-top .menu-toggle{
        padding: 0 !important;
    }
</style>
<script>
    $(function () {
        var x = true;
        $('#hamCont').click(function () {
            if(x){
                $('#ham-top').addClass("active");
                $('#ham-bottom').addClass("active");
                $('#ham-clearfix').addClass("clearfix");
                x = false;
            }else{
                $('#ham-top').removeClass("active");
                $('#ham-bottom').removeClass("active");
                $('#ham-clearfix').removeClass("clearfix");
                x = true;
            }
        })
    })    
</script>