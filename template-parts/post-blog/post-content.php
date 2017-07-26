<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <!-- .entry-header -->
    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php else: ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img src="http://82.196.13.127/wp-content/themes/laroche/assets/images/coffee.jpg" alt="">
            </a>
        </div>
    <?php endif; ?>
    <header class="entry-header">
        <?php
        echo '<p id="article-date" style="text-transform: uppercase;" >'.get_the_date( 'M j' ).'</p>';

        if ( is_single() ) {
            the_title( '<div class="box"><div><p id="article-header" class="entry-title">', '</p></div></div>' );
        } else {
            the_title( '<div class="box"><div class="box__in"><p id="article-header" class="entry-title">', '</p></div></div>' );
        }
        $count = count(get_the_category());
        $i = 1;
        echo '<p id="article-category" style="text-transform: uppercase;">';
        foreach (get_the_category() as $k) {
            echo ($k->name);
            if ($count != $i) {
                echo ' | ';
            }
            $i++;
        }
        echo '</p>';
        ?>
    </header>

    <?php if ( is_single() ) : ?>
        <?php twentyseventeen_entry_footer(); ?>
    <?php endif; ?>

</article><!-- #post-## -->
