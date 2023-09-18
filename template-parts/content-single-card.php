<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

?>

<article id="post-<?php the_ID(); ?>" class="category__column">
	<div class="category__img"><?php wazzup_post_thumbnail(); ?></div>
	<div class="category__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
	<div class="category__subhead"><?php  the_excerpt(); ?></div>
	<div class="category__wrap">
		<div class="category__date"><?php echo get_the_date(); ?></div>
		<div class="category__time"><?php echo (get_post_meta($post->ID, 'wz-post-duration', true)); ?></div>
	</div>
</article>
