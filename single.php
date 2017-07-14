<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="article-prim content-area">
		<main id="main" class="site-main" role="main">

			<?php

                if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) ) :
                    the_post_thumbnail('post-thumbnail', ['id' => 'article-img']);
                endif;
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
//						comments_template();
					endif;

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					) );

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer(); ?>
<script>
    $(function () {
        $('#article-coments').click(function () {
            var comments = $('#comments');
            if (comments.is(':visible')) {
                comments.hide(300);
                $('#cicon').removeClass('fa-caret-up');
                $('#cicon').addClass('fa-caret-down');
            }
            if (comments.is(':hidden')) {
                comments.show(300);
                $('#cicon').removeClass('fa-caret-down');
                $('#cicon').addClass('fa-caret-up');
            }
        });
        $(window).resize(function() {
            if ($(window).width() <= '782'){
                $('.site-content-contain').css('background-color', '#D7D7D7');
            } else {
                $('.site-content-contain').css('background-color', 'white');
            }
        });
    });
</script>
