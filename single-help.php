<?php
get_header();
?>

<main id="primary" class="site-main">


</main><!-- #main -->

<main class="main">
	<div class="main__row">
		<div id="kb_menu" class="main__aside wz-enabled">
			<aside class="wz-sidebar">
				<div class="wz-sidebar__row">
					<nav class="wz-sidebar__menu">
						<?php if (!is_single(array(14995, 16107, 14992,15542,15595,16109))) : ?>
							<div id="kb_back_main" class="wz-enabled">
								<?php echo do_shortcode("[post-link post_id='' link_title='".__('Назад к разделам', 'wazzup')."']") ?>
							</div>
						<?php endif; ?>
						<div id="wz24h-menu-wrapper">
						<?php dynamic_sidebar('sidebar-1'); ?>
						</div>
						
					</nav>
				</div>
			</aside>
		</div>
		<div id="kb_content" class="main__content wz-enabled">
			<div class="main__wrap">
				<?php if (get_post_type() == "help") : ?>
					<?php if (is_single(array(14995, 16107, 14992,15542,15595,16109))) : ?>
						<div id="kb_back_main" class="wz-enabled">
						<?php echo do_shortcode("[parent-link link_title='".__('Назад к разделам', 'wazzup')."']") ?>
						</div>
						<div class="wz-intermediate">
							<?php get_template_part('template-parts/content', 'help'); ?>
						</div>
						<div id="wz24h-content-wrapper-intermediate">
							<?php dynamic_sidebar('kb-mobile-intermediate'); ?>
						</div>
					<?php else : ?>
						<div id="kb_back_main" class="wz-enabled">
							<?php echo do_shortcode("[parent-link link_title='".__('Назад к разделам', 'wazzup')."']") ?>
						</div>
						<?php get_template_part('template-parts/content', 'help'); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
