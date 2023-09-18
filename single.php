<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wazzup
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')) { ?>
			<div class="breadcrumbs">
				<div class="breadcrumbs__row">
					<?php echo do_shortcode('[pretty_breadcrumb]'); ?>
				</div>
			</div>
		<?php } ?>
		<div class="main__title">
			<?php echo do_shortcode('[wz-header-tag]'); ?>
		</div>
		<div class="category category_single">
			<div class="category__wrap category__wrap_single">
				<div class="category__date"><?php echo get_the_date(); ?></div>
				<div class="category__time"><?php echo (get_post_meta($post->ID, 'wz-blog-post-duration', true)); ?></div>
			</div>
		</div>
		<div class="wz-content">
			<div class="wz-content__wrap">
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());
				?>
					<nav class="navigation post-navigation" aria-label="Еще почитать">
						<h2 class="screen-reader-text">Еще почитать</h2>
						<div class="nav-links">
							<?php
							$post_id = get_queried_object_id();
							$categories = get_the_category($post_id);
							if (empty($categories[1])) {
								$termo = $categories[0];
							} else {
								$termo = $categories[1];
							}

							$unique_array = array_unique($termo);

							// get_posts in same custom taxonomy
							$postlist_args = array(
								'posts_per_page' => -1, // Note: showposts is depreciated in favor of posts_per_page
								'no_found_rows' => true,
								'tax_query' => [
									[
										'taxonomy' => 'category',
										'terms' => $termo,
										'include_children' => false,
									],
								],
							);
							$postlist = get_posts($postlist_args);

							// get ids of posts retrieved from get_posts
							$ids = array();
							foreach ($postlist as $thepost) {
								$ids[] = $thepost->ID;
							}

							// get and echo previous and next post in the same taxonomy        
							$thisindex = array_search($post->ID, $ids);
							$previd = $ids[$thisindex - 1];
							$nextid = $ids[$thisindex + 1];
							if (!empty($previd)) {
								echo '<div class="nav-previous"><a rel="prev" href="' . get_permalink($previd) . '">Следующая статья</a>';
								$my_query = new WP_Query('p=' . $previd . '');
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<article id="post-<?php the_ID(); ?>" class="category__column">
										<div class="category__img"><a href="<?php the_permalink(); ?>"><?php wazzup_post_thumbnail(); ?></a></div>
										<div class="category__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<div class="category__subhead"><?php the_excerpt(); ?></div>
										<div class="category__wrap">
											<div class="category__date"><?php echo get_the_date(); ?></div>
											<div class="category__time"><?php echo (get_post_meta($post->ID, 'wz-post-duration', true)); ?></div>
										</div>
									</article>
								<?php
								endwhile;
								echo '</div>';
							}
							if (!empty($nextid)) {
								echo '<div class="nav-nextious"><a rel="prev" href="' . get_permalink($nextid) . '">Предыдущая статья</a>';
								$my_query = new WP_Query('p=' . $nextid . '');
								while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<article id="post-<?php the_ID(); ?>" class="category__column">
										<div class="category__img"><a href="<?php the_permalink(); ?>"><?php wazzup_post_thumbnail(); ?></a></div>
										<div class="category__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<div class="category__subhead"><?php the_excerpt(); ?></div>
										<div class="category__wrap">
											<div class="category__date"><?php echo get_the_date(); ?></div>
											<div class="category__time"><?php echo (get_post_meta($post->ID, 'wz-post-duration', true)); ?></div>
										</div>
									</article>

							<?php
								endwhile;
								echo '</div>';
							}
							?>
						</div>
					</nav>

				<?php

				endwhile; // End of the loop.
				?>

			</div>
			<div class="wz-content__aside">
				<section class="tags">
					<div class="tags__container">
						<div class="tags__row">
							<div class="tags__wrap">
								<div class="tags__title"><?php _e('Поиск по тегам:', 'wazzup') ?></div>
								<div class="tags__items tags__items_none">
								</div>
								<div id="wz-swap-button">
									<a href="#swap" class="button__show" role="button">
										<span class="button__wrapper">
											<span class="button__icon-right">
												<!--?xml version="1.0" encoding="UTF-8"?--> <svg xmlns="http://www.w3.org/2000/svg" width="11" height="7" viewBox="0 0 11 7" fill="none">
													<path d="M1 1L5.5 6L10 1" stroke="#4CAF50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg> </span>
											<span><span class="text-hide">Скрыть</span><span class="text-show">Показать</span></span>
										</span>
									</a>
								</div>
							</div>
							<div class="tags__row tags__row_gap">
								<div id="wz-swap-tags-ordered-sidebar">
									<?php echo do_shortcode("[wz-blog-tags action='current']"); ?>
								</div>
								<div id="wz-swap-tags" class="wz-hide">
									<?php echo do_shortcode("[wz-blog-tags number='0']"); ?>
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
				<h2>Еще статьи по теме:</h2>
				<section class="wz-custom-post">
					<div class="wz-custom-post__column">
						<?php
						$q = get_related_category_posts();
						if ($q->have_posts()) {
							while ($q->have_posts()) {
								$q->the_post(); ?>

								<article id="post-<?php the_ID(); ?>" class="wz-custom-post__column">
									<a href="<?php the_permalink(); ?>">
										<div class="wz-custom-post__img"><?php wazzup_post_thumbnail(); ?></div>
										<div class="wz-custom-post__title"><?php the_title(); ?></div>
									</a>
								</article>
						<?php }
							wp_reset_postdata();
						}
						?>
					</div>
				</section>
			</div>
		</div>

	</div>



</main><!-- #main -->

<?php
get_footer();
