<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

?>

<div id="post-<?php the_ID(); ?>">
	<div id="wz24h-title-wrapper">
		<div class="wz-title-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<?php wazzup_post_thumbnail(); ?>

	<div id="wz24h-content-wrapper" class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->
</div><!-- #post-<?php the_ID(); ?> -->