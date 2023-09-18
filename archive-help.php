<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package wazzup
 */

get_header();
?>

<main class="main">
	<div class="main__row">
		<div id="kb_menu" class="main__aside wz-enabled">
			<aside class="wz-sidebar">
				<div class="wz-sidebar__row">
					<nav class="wz-sidebar__menu">
						<?php echo do_shortcode("[listmenu theme_location='kb-menu-main' depth='0']") ?>
					</nav>
				</div>
			</aside>
		</div>
		<div id="kb_content" class="main__content wz-enabled">
			<div class="main__wrap">
				<div id="kb_back_main" class="wz-enabled">
					<?php echo do_shortcode("[post-link post_id='' link_title='".__('Назад к разделам', 'wazzup')."']") ?>
				</div>
				<?php
				?>
				<h1><?php echo get_the_title(get_post_id_by_slug('help')); ?></h1>
				<?php the_field('help_content', get_post_id_by_slug('help')) ?>



			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
