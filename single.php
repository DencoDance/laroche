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
get_header();

wp_enqueue_script('sss', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
//wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' )
?>

<div class="wrap">
    <div id="primary" class="article-prim content-area">
        <main id="main" class="site-main" role="main">

            <?php
            $post_type = get_post_type();
            $post_type_slug = null;
            if ($post_type) {
                $post_type_data = get_post_type_object($post_type);
                $post_type_slug = $post_type_data->rewrite['slug'];
            }
            if ($post_type_slug != 'case_study') :
                if (has_post_thumbnail() && (is_single() || (is_page()))) :
                    the_post_thumbnail('post-thumbnail', ['id' => 'article-img']);
                else:
                    echo '<img src="' . get_site_url() . '/wp-content/themes/laroche/assets/images/default.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" id="article-img">';
                endif;
                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('template-parts/post/content', get_post_format());

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
//						comments_template();
                    endif;
                endwhile; // End of the loop.
                ?>

                <div id="article-mobile-send"
                     style="display: none"><?php echo do_shortcode("[mc4wp_form id=\"162\"]"); ?></div>
                <?php echo do_shortcode("[yuzo_related]"); ?>
                <hr id="article-hr">
                <div id="article-laptop-send"><?php echo do_shortcode("[mc4wp_form id=\"162\"]"); ?></div>
            <?php else:
                while (have_posts()) : the_post();

                    get_template_part('template-parts/post/content', 'case_study');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
//						comments_template();
                    endif;
                endwhile; // End of the loop.
            ?>
            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
<script>
    if ($(window).width() <= '782') {
        $('.site-content-contain').css('background-color', '#D7D7D7');
    } else {
        $('.site-content-contain').css('background-color', 'white');
    }
    $(function () {
        $('#article-img').height(600);
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
        $(window).resize(function () {
            if ($(window).width() <= '782') {
                $('.site-content-contain').css('background-color', '#D7D7D7');
            } else {
                $('.site-content-contain').css('background-color', 'white');
            }
        });
    });
</script>

