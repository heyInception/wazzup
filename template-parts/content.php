<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php wazzup_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
