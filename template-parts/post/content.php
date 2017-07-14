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
	<header class="entry-header">
		<?php
            echo '<p id="article-date">'.mb_strtoupper(get_the_date( 'M j' )).'</p>';
//			if ( 'post' === get_post_type() ) :
//				echo '<div class="entry-meta">';
//					if ( is_single() ) :
//						twentyseventeen_posted_on();
//					else :
//						echo twentyseventeen_time_link();
//						twentyseventeen_edit_link();
//					endif;
//				echo '</div><!-- .entry-meta -->';
//			endif;

			if ( is_single() ) {
//			    print_r($post);
//			    echo strtoupper($post->post_date);
				the_title( '<h1 id="article-header" class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 id="article-header" class="entry-title"> </h2>' );
			}
			$count = count(get_the_category());
			$i = 1;
            echo '<p id="article-category">';
            foreach (get_the_category() as $k) {
			    echo mb_strtoupper($k->name);
			    if ($count != $i) {
			        echo ' | ';
                }
                $i++;
            }
            echo '</p>';
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div id="article-content" class="entry-content">
		<?php
			/* translators: %s: Name of current post */
            the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
        ?>
        <?php
			echo '<hr>';
			echo '<div id="article-user">';
			echo '<img id="article-avatar" src="' . get_avatar_url($post) . '" alt="">';
			echo '<div id="article-utext">';
                echo '<p id="article-uname">';
                    the_author();
                echo'</p>';
                echo '<p id="article-udes">'. get_the_author_meta('description') .'</p>';
            echo '</div>';
			echo '</div>';
            echo '<hr>';
		?>
        <div id="article-coments">
            <p><?php comments_number('0', '1', '%'); ?> comments <i id="cicon" class="fa fa-caret-down" aria-hidden="true"></i></p>
        </div>
        <div style="display: none" id="comments"><?php comments_template(); ?></div>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<?php twentyseventeen_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
