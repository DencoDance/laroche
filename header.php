<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <?php wp_head(); ?>
</head>
<style>
    .navigation-top{
        z-index: 10000;
        width: 100%;
        transition: all 0.3s ease-in-out;
        position: fixed;
        bottom: auto;
        background: none;
        border: none;
    }
    ul#top-menu li a:hover {
        text-decoration: underline;
    }
    ul#top-menu li:last-child:hover ul#top-menu li a {
        text-decoration: none;
    }
    body.light .navigation-top:not(.active) ul#top-menu li:last-child{
        border-color: rgba(0, 0, 0, 0.5);
    }


    ul#top-menu li:last-child:hover {
        background-color: #FF4747;
        border-color: #FF4747 !important;
        color: white !important;
    }
    ul#top-menu li:last-child:hover a{
        color: white !important;
        text-decoration: none;
    }

    body.light .navigation-top:not(.active) ul#top-menu li a{
        color: #000;
    }
    body.light .navigation-top:not(.active) .logo svg path, body.light .navigation-top:not(.active) .logo svg polygon{
        fill: black;
    }
    body.light .navigation-top:not(.active) .ham {
        background: black;
    }
    .navigation-top ul#top-menu{
        text-align: center;
        padding-top: 10px;
    }
    .navigation-top div.wrap{
        width: 100%;
        margin: 0;
        max-width: 100%;
    }
    .navigation-top ul#top-menu li a{
        color: #fff;
        transition: all 0.3s ease-in-out;
        font-family: "Century Gothic";
        font-size: 16px;
        line-height: 22px;
        font-weight: bold;
    }
    .navigation-top ul#top-menu li a.active{
        color: #000;
    }
    #wp-custom-header-video-button{
        display: none;
    }
    .navigation-top ul#top-menu li:last-child{
        transition: all 0.3s ease-in-out;
        float: right;
        margin-left: -25px;
        margin-right: 60px;
        /*padding: 0 15px 0 15px;*/
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    .navigation-top ul#top-menu li:last-child a{
        padding: 15px 40px 15px 40px;
    }
    .navigation-top ul#top-menu li.active:last-child{
        border-color: rgba(0, 0, 0, 0.5);
    }
    .navigation-top.active {
        background: #fff;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
    }
    nav#site-navigation.toggled-on{
        position: fixed;
        width: 100%;
        height: 100%;
        background: black;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container{
        top: 25%;
        position: relative;
        width: 55%;
        margin: 0 auto;
        text-align: center;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container ul{
        border: none;
        background: black;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container li{
        border: none;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container li:last-child{
        float: none;
        border: none;
        margin: auto;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container li:last-child a{
        padding: 0.5em 0;
    }
    nav#site-navigation.toggled-on .menu-main-menu-top-container li a{
        font-weight: normal;
        font-size: 24px;
        color: white !important;
    }
    .navigation-top button.menu-toggle:focus{
        outline: none;
    }
    .navigation-top button.menu-toggle{
        font-size: 18px;
        float: right;
    }
    .navigation-top .active button.menu-toggle, nav#site-navigation.toggled-on button.menu-toggle{
        border: none;
        color: white;
    }
    .navigation-top .logo svg path, .navigation-top .logo svg polygon{
        fill: white;
        transition: all 0.3s ease-in-out;
    }
    .navigation-top.active .logo svg path, .navigation-top.active .logo svg polygon{
        fill: black;
        transition: all 0.3s ease-in-out;
    }
    .navigation-top .icon-bars path{
        fill: white !important;
    }
    .navigation-top .logo{
        float: left;
        padding: 15px;
        margin-left: 60px;
    }
    .navigation-top #site-navigation.toggled-on .logo svg path, .navigation-top #site-navigation.toggled-on .logo svg polygon{
        fill: white;
    }
    @media (max-width: 991px) {
        .navigation-top .logo {
            margin-left: 5px;
        }
    }
    @media (max-width: 600px) {
        .navigation-top.active{
            top: 0;
        }
    }
    @media (max-width: 62em){
        .navigation-top .logo{
            padding: 15px 15px 0 15px;
        }
        .navigation-top .ham{
            margin-right: 15px;
        }
    }
    @media (max-width: 400px) {
        .navigation-top .logo{
            margin-left: 5px;
        }

    }
</style>
<script>
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".navigation-top").addClass("active");
            $(".navigation-top ul#top-menu li:last-child").addClass("active");
            $(".navigation-top ul#top-menu li a").addClass("active");
        } else {
            $(".navigation-top").removeClass("active");
            $(".navigation-top ul#top-menu li:last-child").removeClass("active");
            $(".navigation-top ul#top-menu li a").removeClass("active");
        }
    });
</script>
<?php
$classes = get_body_class();
if (is_home() && !is_front_page()){
    $classes[] = 'light';
}
?>
<body <?php body_class($classes); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

    <header id="masthead" class="site-header" role="banner">

        <?php if ( has_nav_menu( 'top' ) ) : ?>
            <div class="navigation-top">
                <div class="wrap">
                    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
                </div><!-- .wrap -->
            </div><!-- .navigation-top -->
        <?php endif; ?>

        <?php get_template_part( 'template-parts/header/header', 'image' ); ?>
        <?php if (is_front_page()){

            echo '<h1 id="home-hero">'.get_post_meta(169, 'header_text')[0].'</h1>';
        }?>

    </header><!-- #masthead -->

    <div class="site-content-contain">
        <div id="content" class="site-content">
