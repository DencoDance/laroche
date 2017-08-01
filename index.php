<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();
 
wp_enqueue_script('dotdotdot', get_theme_file_uri('/assets/js/jquery.dotdotdot.min.js'));
?>

    <div class="wrap">


        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                echo '<div id="heading-blog"><h1 id="header-blog">' . get_post_meta(178, 'main_headling')[0] . '</h1>';
                echo '<p id="subheader-blog">' . get_post_meta(178, 'sub_headling')[0] . '</p></div>';
                if (have_posts()) :
                    $i = 1;
                    $a = 1;
                    /* Start the Loop */
                    $query = new WP_Query([
                        'post_type' => 'post',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'hide_empty' => 1,
                        'depth' => 1,
                        'posts_per_page' => -1
                    ]);
                    echo '<div id="size-scr">';
                    while ($query->have_posts()) : $query->the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        
//                        if (get_post_type() != 'case_study') {

                            echo '<div id="animate' . $a . '">';
                            if ($a == 3) {
                                $a = 0;
                            }
                            get_template_part('template-parts/post-blog/post-content', get_post_format());
                            echo '</div>';
                            if ($i % 6 == 0) {
                                echo '<div class="clearfix article-tablet-fix"></div><div id="hide-mobile"><hr><div id="article-laptop-send">' . do_shortcode("[mc4wp_form id=\"162\"]") . '</div><hr></div>';
                            }
                            if ($i % 4 == 0) {
                                echo '<div class="clearfix article-other-fix"></div><div id="hide-tablet"><hr><div id="article-tablet-send">' . do_shortcode("[mc4wp_form id=\"162\"]") . '</div><hr></div>';
                            }
                            if ($i % 3 == 0) {
                                echo '<div class="clearfix article-tablet-fix"></div><div id="hide-laptop"><hr><div id="article-mobile-send">' . do_shortcode("[mc4wp_form id=\"162\"]") . '</div><hr></div>';
                            }
                            $i++;
                            $a++;

//                        }
                    endwhile;
                    echo '</div>';
                endif;

                ?>

            </main><!-- #main -->

        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->
    <script>
        (function ($) {
            var truncate = function (el) {
                var text = el.text(),
                    height = el.height(),
                    clone = el.clone();

                clone.css({
                    position: 'absolute',
                    visibility: 'hidden',
                    height: 'auto'
                });
                el.after(clone);

                var l = text.length - 1;
                for (; l >= 0 && clone.height() > height; --l) {
                    clone.text(text.substring(0, l) + '...');
                }

                el.text(clone.text());
                clone.remove();
            };

            $.fn.truncateText = function () {
                return this.each(function () {
                    truncate($(this));
                });
            };
        }($));
        $(function () {
            $('.box').truncateText();
        });
    </script>
<?php get_footer();
