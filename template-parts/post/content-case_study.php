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
<style>
    .case-study-hero{
        background-color: <?php echo get_post_meta(get_the_ID(), 'background_main', true) ?> !important;
    }
    #margin-content{
        background-color: <?php echo get_post_meta(get_the_ID(), 'background_body', true) ?> !important;
    }
</style>
<article id="post-<?php the_ID(); ?> kek" <?php post_class(); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
	?>
	<div id="case-study-content" class="entry-content">
		<?php
			/* translators: %s: Name of current post */
            echo '<div id="margin-content">';
			the_content();
            echo '</div>';

        ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
