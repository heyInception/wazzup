<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php echo do_shortcode("[parent-breadcrumbs link_title='".__('Назад к разделам', 'wazzup')."']") ?>
	<?php the_title(sprintf('<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>'); ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>"><?php _e('Перейти', 'wazzup') ?></a>
	</div><!-- .entry-summary -->
</section><!-- #post-<?php the_ID(); ?> -->