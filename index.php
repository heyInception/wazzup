<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

get_header();
?>

<main id="primary" class="site-main main">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')) { ?>
			<div class="breadcrumbs">
				<div class="breadcrumbs__row">
					<?php echo do_shortcode('[pretty_breadcrumb]'); ?>
				</div>
			</div>
		<?php } ?>
		<section class="tags">
			<div class="tags__container">
				<div class="tags__row">
					<div class="tags__wrap">
						<div class="tags__title"><?php _e('Поиск по тегам:', 'wazzup') ?></div>
						<?php echo do_shortcode('[wz-blog-tags number="5"]'); ?>
						<div id="wz-swap-button">
							<a href="#swap" class="tags__show" role="button">
								<span class="tags__wrapper">
									<span class="tags__icon-right">
										<svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
											<path d="M1 1L5.5 6L10 1" stroke="#4CAF50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg> </span>
									<span><span class="text-hide">Скрыть</span><span class="text-show">Показать</span></span>
								</span>
							</a>
						</div>
					</div>
					<div class="tags__row tags__row_gap">
						<div id="wz-swap-tags" class="tags__column wz-hide">
							<div class="tags__items">
								<?php echo do_shortcode("[wz-blog-tags number='0']"); ?>
							</div>
						</div>
						<script>
							window.onload = function() {
								if (window.jQuery) {
									// jQuery is loaded
									console.log("Yeah!");
									jQuery('#wz-swap-button').click(function() {
										jQuery(this).toggleClass('wz-hide');
										console.log('#wz-swap-button: ' + jQuery(this).attr("class"));
										jQuery('#wz-swap-tags').toggleClass('wz-hide');
										console.log('#wz-swap-tags: ' + jQuery('#wz-swap-tags').attr("class"));
										const mediaQuery = window.matchMedia('(max-width: 1199px)')
										if (mediaQuery.matches) {
											console.log('Media Query Matched!');
											jQuery('#wz-swap-tags-ordered').toggleClass('wz-show');
											console.log('#wz-swap-tags-ordered: ' + jQuery('#wz-swap-tags-ordered').attr("class"));
											jQuery('#wz-swap-tags-ordered-sidebar').toggleClass('wz-show');
											console.log('#wz-swap-tags-ordered-sidebar: ' + jQuery('#wz-swap-tags-ordered-sidebar').attr("class"));
										}
									});
								} else {
									// jQuery is not loaded
									console.log("Doesn't Work");
								}
							}
						</script>
					</div>
				</div>
			</div>
		</section>
		<section class="category">
			<div class="category__wrapper">
				<?php
				$args = array(
					'posts_per_page' => 3,
					'orderby' => 'DESC',
					'category_name' => 'changelog,changelog-en,changelog-es'
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) {
				?>
					<div class="category__row">
						<div class="category__title"><?php _e('Changelog', 'wazzup') ?></div>
						<div class="category__link">
							<a href="<?php echo do_shortcode('[wz-translate language="ru_RU"]/category/changelog/[/wz-translate]') ?><?php echo do_shortcode('[wz-translate language="en_US"]/category/changelog-en/[/wz-translate]') ?><?php echo do_shortcode('[wz-translate language="es_ES"]/category/changelog-es/[/wz-translate]') ?>">
								<span><?php _e('Перейти в раздел', 'wazzup') ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21.8779 12.2128L15.6279 6.11903C15.4651 5.96032 15.2015 5.96032 15.0387 6.11903C14.876 6.27773 14.876 6.53481 15.0387 6.69348L20.5775 12.0938H2.41668C2.18637 12.0938 2 12.2755 2 12.5C2 12.7246 2.18637 12.9063 2.41668 12.9063H20.5775L15.0387 18.3065C14.876 18.4652 14.876 18.7223 15.0387 18.881C15.1201 18.9603 15.2267 19 15.3334 19C15.44 19 15.5466 18.9603 15.628 18.881L21.878 12.7872C22.0407 12.6286 22.0407 12.3715 21.8779 12.2128Z" fill="#4CAF50"></path>
								</svg>
							</a>
						</div>
					</div>
					<div class="category__row">
						<?php
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content-single', 'card');
						}
						?>
					</div>
				<?php
				} else {
				}
				wp_reset_postdata(); ?>
			</div>

		</section>
		<section class="category">
			<div class="category__wrapper">
				<?php
				$args = array(
					'posts_per_page' => 3,
					'orderby' => 'DESC',
					'category_name' => 'article-ru,article-en,article-es'
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) {
				?>
					<div class="category__row">
						<div class="category__title"><?php _e('Статьи', 'wazzup') ?></div>
						<div class="category__link">
							<a href="<?php echo do_shortcode('[wz-translate language="ru_RU"]/category/article-ru/[/wz-translate]') ?><?php echo do_shortcode('[wz-translate language="en_US"]/category/article-en/[/wz-translate]') ?><?php echo do_shortcode('[wz-translate language="es_ES"]/category/article-es/[/wz-translate]') ?>">
								<span><?php _e('Перейти в раздел', 'wazzup') ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21.8779 12.2128L15.6279 6.11903C15.4651 5.96032 15.2015 5.96032 15.0387 6.11903C14.876 6.27773 14.876 6.53481 15.0387 6.69348L20.5775 12.0938H2.41668C2.18637 12.0938 2 12.2755 2 12.5C2 12.7246 2.18637 12.9063 2.41668 12.9063H20.5775L15.0387 18.3065C14.876 18.4652 14.876 18.7223 15.0387 18.881C15.1201 18.9603 15.2267 19 15.3334 19C15.44 19 15.5466 18.9603 15.628 18.881L21.878 12.7872C22.0407 12.6286 22.0407 12.3715 21.8779 12.2128Z" fill="#4CAF50"></path>
								</svg>
							</a>
						</div>
					</div>
					<div class="category__row">
						<?php
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content-single', 'card');
						}
						?>
					</div>
				<?php
				} else {
				}
				wp_reset_postdata(); ?>
			</div>

		</section>
		<section class="category">
			<div class="category__wrapper">
				<?php
				$args = array(
					'posts_per_page' => 3,
					'orderby' => 'DESC',
					'category_name' => 'cases,cases-es'
				);
				$query = new WP_Query($args);
				if ($query->have_posts()) {
				?>
					<div class="category__row">
						<div class="category__title"><?php _e('Кейсы', 'wazzup') ?></div>
						<div class="category__link">
							<a href="<?php echo do_shortcode('[wz-translate language="ru_RU"]/category/cases/[/wz-translate]') ?><?php echo do_shortcode('[wz-translate language="es_ES"]/category/cases-es/[/wz-translate]') ?>">
								<span><?php _e('Перейти в раздел', 'wazzup') ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21.8779 12.2128L15.6279 6.11903C15.4651 5.96032 15.2015 5.96032 15.0387 6.11903C14.876 6.27773 14.876 6.53481 15.0387 6.69348L20.5775 12.0938H2.41668C2.18637 12.0938 2 12.2755 2 12.5C2 12.7246 2.18637 12.9063 2.41668 12.9063H20.5775L15.0387 18.3065C14.876 18.4652 14.876 18.7223 15.0387 18.881C15.1201 18.9603 15.2267 19 15.3334 19C15.44 19 15.5466 18.9603 15.628 18.881L21.878 12.7872C22.0407 12.6286 22.0407 12.3715 21.8779 12.2128Z" fill="#4CAF50"></path>
								</svg>
							</a>
						</div>
					</div>
					<div class="category__row">
						<?php
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('template-parts/content-single', 'card');
						}
						?>
					</div>
				<?php
				} else {
				}
				wp_reset_postdata(); ?>
			</div>

		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();
