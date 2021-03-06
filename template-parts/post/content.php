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
            echo '<p id="article-date" style="text-transform: uppercase;" >'.get_the_date( 'M j' ).'</p>';
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
            echo '<div id="margin-content">';
			the_content();
            echo '</div>';

        ?>
        <div class="sharify-container"><ul id="social-list"><div id="adap-soc"><div><li class="margines sharify-btn-twitter">
                <a title="Tweet on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title().':'.wp_get_shortlink();?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
                    <span class="sharify-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                </a>
            </li>
            <li class="margines sharify-btn-facebook">
                <a title="Share on Facebook" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo get_permalink(); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
                    <span class="sharify-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                </a>
            </li></div><div style="display: none" class="clearfix"></div><div><li class="margines sharify-btn-linkedin">
                <a title="Share on Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_shortlink().'title='.get_the_title()?>" onclick="if(!document.getElementById('td_social_networks_buttons')){window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;}">
                    <span class="sharify-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                </a>
            </li><li class="sharify-btn-email">
                <a title="Share via mail" href="mailto:?subject=<?php echo get_the_title().'&body='.get_the_title() ?>">
                    <span class="sharify-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span class="sharify-title">Email</span>
                </a>
            </li></div><div class="clearfix"></div></div></ul>
        </div>
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

</article><!-- #post-## -->
