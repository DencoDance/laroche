<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<?php
/*
wp_enqueue_style( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, string
$media = 'all' );*/
?>
<style>

  .form-title p{
     margin:0;
  }

  .contact-form select {

    -webkit-appearance: none;  /*Removes default chrome and safari style*/
    -moz-appearance: none;  /*Removes default style Firefox*/
    background: url("http://localhost/laroche/wp-content/uploads/2017/07/arrow.png") no-repeat;
    background-position: right 20px center;
    text-indent: 0.01px; /* Removes default arrow from firefox*/
    text-overflow: "";  /*Removes default arrow from firefox*/
    padding-right: 20px;
  }
  .contact-form .contact-submit-label{
     text-align:center;

  }
  .contact-form input[type="submit"]{
    border-radius: 0;
  }
  .contact-form input:not([type="submit"])::placeholder,
  .contact-form select option:first-child,
  .contact-form textarea::placeholder{
    color:           rgba(41, 41, 41, 0.6);
  }

  .contact-form input, .contact-form select{
     height: 60px;
  }

  .contact-form select,
  .contact-form input:not([type="submit"]),
  .contact-form textarea
  {
    border-radius:   3px;
    background-color:#FFFFFF;
    padding: 18px 20px;
   	width: 100% ;
    color:           rgba(41, 41, 41, 0.6);
  }
  .contact-form select,
  .contact-form input,
  .contact-form textarea
  {
    font-family:     "Century Gothic" !important;
    font-size:       16px !important;
  }
  .contact-form select option
  {
    display: inline-block;
    height: 60px;
    padding:         20px;
  }



  .flex-label
  {
    width:100%;
    display: flex;
  }

  @media screen and (min-width: 600px){

    .flex-label span:first-child{
      padding-right: 10px;
    }
    .flex-label span:last-child{
      padding-left: 10px;0px6
    }
    .flex-label span{width:50%;}
  }
  .middle-white-block{
    padding: 150px 0 150px 0;
    transition: all .4s linear;

  }
  @media screen and (max-width: 768px){
    .middle-white-block{
      padding: 50px 0 50px 0;
    }
  }

  .contact-submit{
    height: 60px;	width: 214px;
    background-color: #FE3939 !important; margin: 0 auto;
    border-radius: 0;

  }
  .contact-submit:hover{

    background-color:#232526 !important;
  }


  .wpcf7{
    max-width:700px;
    min-width:200px;
    margin: 0px auto!important;
  }
  .proud-text{
    max-width:865px;
    margin: 0px auto!important;
  }
  .office-location{
    padding: 50px 0 !important;
    max-width: 300px;
    color:white;


    margin: 0 auto 0 auto;
    font-family: "Century Gothic";
  }

  .office-location p{
    margin: 0;
  }

  @media screen and (min-width: 768px){
    .office-location{
      position: absolute;
      width:100%;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }

  }
  .location-fa-icon{
    opacity: 0.7;
    margin-bottom: 0!important;
  }
  .content-address a{
    font-size: 20px;
    opacity:   0.7;
    color: #ffffff;
  }

  .content-address a, .footer-address a{
    text-decoration: none;
  }

  /*******************************/
  /****  Director data block  ****/
  /*******************************/
  .director-data{
    font-family: "Century Gothic";
  }
  .director-data p{
    margin:0!important;
  }
  .director-wrapper{
    height:350px;
  }
  .director-name{
    text-align: center; font-size: 24px; color: #292929; font-weight:bold;padding-top:20px;
  }
  .contacts-email{
    font-family: "Century Gothic";
    font-size: 18px; color: #fe3939; text-decoration: underline;
  }
  /************************/
  /****  Footer block  ****/
  /************************/
  .footer{
    background-color:rgba(216, 216, 216, 0.15);
  }
  .footer-data-wrapper{

    max-width:865px;
    margin:0 auto;
    height: 253px;

    font-family: "Century Gothic";
  }
  .footer-data-wrapper p{
    margin:0;
  }

  .footer-address{
    text-align: center;
    font-size: 18px;
  }
  /*.phone-fax{
    margin:0;
  }*/

  @media screen and (max-width: 1100px){
    .office-location{
      margin: 0 auto 0 auto;
    }

  }
  @media screen and (max-width: 600px){
    label.flex-label
    {
      display:inherit;
    }
    label.flex-label span:first-child input
    {
      margin-bottom:15px;
    }

  }


</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="contacts-content">

    <?php the_content();?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->

