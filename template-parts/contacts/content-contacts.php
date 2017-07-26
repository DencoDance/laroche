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

<!--<style>-->
<!---->
<!--/*Form styles*/-->
<!---->
<!--  .form-title p{-->
<!--     margin:0;-->
<!--  }-->
<!--  -->
<!--  .p05{-->
<!--	  padding: 0px  15px 25px 15px;-->
<!--  }-->
<!--  -->
<!--  .start {-->
<!--	  margin-bottom: -10px;-->
<!--  }-->
<!--  -->
<!--  .messagel {-->
<!--	  padding: 0px  15px 8px 15px;-->
<!--  }-->
<!---->
<!--  .contact-form select {-->
<!---->
<!--    -webkit-appearance: none;  /*Removes default chrome and safari style*/-->
<!--    -moz-appearance: none;  /*Removes default style Firefox*/-->
<!--    background: url("/wp-content/uploads/2017/07/arrow.png") no-repeat;-->
<!--    background-position: right 20px center;-->
<!--    text-indent: 0.01px; /* Removes default arrow from firefox*/-->
<!--    text-overflow: "";  /*Removes default arrow from firefox*/-->
<!--    -->
<!--  }-->
<!--  .contact-form .contact-submit-label{-->
<!--     text-align:center;-->
<!--	 width:214px;-->
<!--	 margin-left: auto;-->
<!--	 margin-right: auto;-->
<!--	 -->
<!--  }-->
<!--  .contact-form input[type="submit"]{-->
<!--    border-radius: 0;-->
<!--  }-->
<!--  .contact-form input:not([type="submit"])::placeholder,-->
<!--  .contact-form select option:first-child,-->
<!--  .contact-form textarea::placeholder{-->
<!--    color:           rgba(41, 41, 41, 0.6);-->
<!--  }-->
<!---->
<!--  .contact-form input, .contact-form select{-->
<!--     height: 60px;-->
<!--  }-->
<!---->
<!--  .contact-form select,-->
<!--  .contact-form input:not([type="submit"]),-->
<!--  .contact-form textarea-->
<!--  {-->
<!--    border-radius:   3px;-->
<!--    background-color:#FFFFFF;-->
<!--    padding: 18px 20px;-->
<!--   	width: 100% ;-->
<!--    color: rgba(41, 41, 41, 0.6);-->
<!--  }-->
<!--  .contact-form select,-->
<!--  .contact-form input,-->
<!--  .contact-form textarea-->
<!--  {-->
<!--    font-family:     "Century Gothic" !important;-->
<!--    font-size:       16px !important;-->
<!--  }-->
<!--  .contact-form select option-->
<!--  {-->
<!--    display: inline-block;-->
<!--    height: 60px;-->
<!--    padding:         20px;-->
<!--  }-->
<!---->
<!--  .flex-label-->
<!--  {-->
<!--    width:100%;-->
<!--    display: flex;-->
<!--  }-->
<!--  -->
<!--  .loc, .hear {-->
<!--	  width:50%;-->
<!--  }-->
<!---->
<!--#wpcf7-f8-p4-o1 > form > div.wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok, div.wpcf7-mail-sent-ng, div.wpcf7-validation-errors {-->
<!--	font-size: 16px;-->
<!--    color: #d4d4d4;-->
<!--}-->
<!---->
<!--span.wpcf7-not-valid-tip {-->
<!--	font-size: 13px;-->
<!--    padding: 5px;-->
<!--	color:#fe3939;-->
<!--}-->
<!---->
<!--#wpcf7-f8-p4-o1 > form > div.wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok -->
<!---->
<!--/*End of Form styles*/-->
<!--  -->
<!--  .middle-white-block{-->
<!--    padding: 150px 0 150px 0;-->
<!--    transition: all .4s linear;-->
<!---->
<!--  }-->
<!--  -->
<!--@media screen and (max-width: 768px){-->
<!--    .middle-white-block{-->
<!--      padding: 50px 0 50px 0;-->
<!--    }-->
<!--	-->
<!--	.flex-label-->
<!--	{-->
<!--		width:100%;-->
<!--		display: block;-->
<!--	}-->
<!--	-->
<!--	.loc, .hear {-->
<!--	  width:100%;-->
<!--	}-->
<!--}-->
<!---->
<!--  .contact-submit{-->
<!--    height: 60px;	width: 214px;-->
<!--    background-color: #FE3939 !important; margin: 0 auto;-->
<!--    border-radius: 0;-->
<!---->
<!--  }-->
<!--  .contact-submit:hover{-->
<!---->
<!--    background-color:#232526 !important;-->
<!--  }-->
<!---->
<!--  .wpcf7{-->
<!--    max-width:700px;-->
<!--    min-width:200px;-->
<!--    margin: 0px auto!important;-->
<!--  }-->
<!--  .proud-text{-->
<!--    max-width:865px;-->
<!--    margin: 0px auto!important;-->
<!--  }-->
<!--  -->
<!--  .vertical {-->
<!--	  position:relative;-->
<!--  }-->
<!--  -->
<!--   -->
<!--  .office-location{-->
<!--    color:white;-->
<!--    font-family: "Century Gothic";-->
<!--	max-width:270px;-->
<!--	margin:0 auto !important;-->
<!--	position: absolute;-->
<!--    top: 0;-->
<!--    bottom: 0;-->
<!--    left: 0;-->
<!--    right: 0;-->
<!--  }-->
<!---->
<!--  .office-location p{-->
<!--    margin: 0;-->
<!--  }-->
<!---->
<!--  @media screen and (max-width: 768px){-->
<!--    -->
<!--	.textblock {-->
<!--	  padding-top: 83px !important;-->
<!--	  padding-bottom: 85px !important;-->
<!--	  -->
<!--	}-->
<!--	-->
<!--	-->
<!--	.office-location{-->
<!--   	-->
<!--		position: inherit;-->
<!--		-->
<!--	  }-->
<!--	}-->
<!--  -->
<!--  .location-fa-icon{-->
<!--    opacity: 0.7;-->
<!--    margin-bottom: 0!important;-->
<!--  }-->
<!--  -->
<!--  .content-address a{-->
<!--    font-size: 20px;-->
<!--    opacity:   0.7;-->
<!--    color: #ffffff;-->
<!--  }-->
<!---->
<!--  .content-address a, .footer-address a{-->
<!--    text-decoration: none;-->
<!--  }-->
<!---->
<!--  -->
<!--  -->
<!--  -->
<!--  /*******************************/-->
<!--  /****  Director data block  ****/-->
<!--  /*******************************/-->
<!--  .director-data{-->
<!--    font-family: "Century Gothic";-->
<!--  }-->
<!--  .director-data p{-->
<!--    margin:0!important;-->
<!--  }-->
<!--  .director-wrapper{-->
<!--    height:350px;-->
<!--  }-->
<!--  .director-name{-->
<!--  font-family: "Century Gothic";-->
<!--  text-align: center; -->
<!--	font-size: 24px; -->
<!--	color: #292929; -->
<!--	font-weight:bold;-->
<!--	padding-top:20px;-->
<!--  }-->
<!--  .contacts-email{-->
<!--    font-family:"Century Gothic";-->
<!--    font-size:  18px; color:rgba(254, 57, 57, 0.7);-->
<!---->
<!---->
<!--  }-->
<!--  /************************/-->
<!--  /****  Footer block  ****/-->
<!--  /************************/-->
<!--  .footer{-->
<!--    background-color:rgba(216, 216, 216, 0.15);-->
<!--  }-->
<!--  .footer-data-wrapper{-->
<!---->
<!--    max-width:865px;-->
<!--    margin:0 auto;-->
<!--    height: 253px;-->
<!---->
<!--    font-family: "Century Gothic";-->
<!--  }-->
<!--  .footer-data-wrapper p{-->
<!--    margin:0;-->
<!--  }-->
<!---->
<!--  .footer-address{-->
<!--    text-align: center;-->
<!--    font-size: 18px;-->
<!--  }-->
<!--  /*.phone-fax{-->
<!--    margin:0;-->
<!--  }*/-->
<!---->
<!--  -->
<!--  }-->
<!--  @media screen and (max-width: 600px){-->
<!--    label.flex-label-->
<!--    {-->
<!--      display:inherit;-->
<!--    }-->
<!--    label.flex-label span:first-child input-->
<!--    {-->
<!--      margin-bottom:15px;-->
<!--    }-->
<!---->
<!--  }-->
<!---->
<!---->
<!--</style>-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="contacts-content">
    <?php
    add_shortcode('address_google_link', function(){
      // returns url. string
      return do_shortcode(CFS()->get( 'address' )['url']);

    });
    add_shortcode('address_name', function(){
      // returns address name. string
      return do_shortcode(CFS()->get( 'address' )['text']);

    });
    add_shortcode('address_link_target', function(){
      // returns target of the link. string
      $target = CFS()->get( 'address' )['target'];
      $trg = '_self';
      if($target != 'none'){
        $trg = $target;
      }
      return $trg;
    });
    add_shortcode('director_name', function(){
      $str_director = CFS()->get( 'director_name' );
      return do_shortcode($str_director);
    });

    add_shortcode('email', function(){
      $str_email = CFS()->get( 'email' );
      return do_shortcode($str_email);
    });
    ?>
    <?php

    /*function contacts_email_shorttag( $atts ) {

      $cfs_email = CFS()->get( 'email' );

      $atts = shortcode_atts(
        array(
          'foo' => 'no foo',
          'bar' => 'default bar',
        ), $atts, 'bartag' );

      return 'bartag: ' . esc_html( $atts['foo'] ) . ' ' . esc_html( $atts['bar'] );
    }
    add_shortcode( 'email', 'contacts_email_shorttag' );*/


    ?>
    <?php the_content();?>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
