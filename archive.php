<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		<section class="category">
			<div class="category__wrapper">
				<div class="category__row category__row_gap">
					<?php
					if (is_category()) {
						while ( have_posts() ) :
							the_post();
				
							get_template_part( 'template-parts/content-single', 'card' );
				
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
				
						endwhile; // End of the loop.
						the_posts_pagination(array(
							'show_all'     => false, // показаны все страницы участвующие в пагинации
							'end_size'     => 1,     // количество страниц на концах
							'mid_size'     => 1,     // количество страниц вокруг текущей
							'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
							'prev_text'    => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.7" d="M2.12208 11.7872L8.37208 17.881C8.53485 18.0397 8.79852 18.0397 8.96126 17.881C9.12403 17.7223 9.12403 17.4652 8.96126 17.3065L3.42251 11.9062L21.5833 11.9062C21.8136 11.9062 22 11.7245 22 11.5C22 11.2754 21.8136 11.0937 21.5833 11.0937L3.42251 11.0937L8.96126 5.69347C9.12403 5.53476 9.12403 5.27769 8.96126 5.11902C8.87989 5.03969 8.77325 5 8.66665 5C8.56005 5 8.45345 5.03969 8.37204 5.11902L2.12204 11.2128C1.95931 11.3714 1.95931 11.6285 2.12208 11.7872Z" fill="#757575"></path> </svg>'),
							'next_text'    => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.7" d="M21.8779 12.2128L15.6279 6.11903C15.4651 5.96032 15.2015 5.96032 15.0387 6.11903C14.876 6.27773 14.876 6.53481 15.0387 6.69348L20.5775 12.0938H2.41668C2.18637 12.0938 2 12.2755 2 12.5C2 12.7246 2.18637 12.9063 2.41668 12.9063H20.5775L15.0387 18.3065C14.876 18.4652 14.876 18.7223 15.0387 18.881C15.1201 18.9603 15.2267 19 15.3334 19C15.44 19 15.5466 18.9603 15.628 18.881L21.878 12.7872C22.0407 12.6286 22.0407 12.3715 21.8779 12.2128Z" fill="#757575"></path> </svg>'),
							'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
							'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
							'screen_reader_text' => __('Posts navigation'),
							'class'        => 'wz-blog-pagination', // CSS класс, добавлено в 5.5.0.
						));
					}
					if (is_tag()) {
						global $post;
						$args = array(
							'numberposts' => -1,
							'tag' => basename($_SERVER['REQUEST_URI']),
							'showposts' => 9,
							'order' => 'ASC'
						);
						$tags = get_posts($args);
						if ($tags) {
							foreach ($tags as $post) : setup_postdata($post); ?>
								<article id="post-<?php the_ID(); ?>" class="category__column">
									<div class="category__img"><?php wazzup_post_thumbnail(); ?></div>
									<div class="category__head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="category__subhead"><?php the_excerpt(); ?></div>
									<div class="category__wrap">
										<div class="category__date"><?php echo get_the_date(); ?></div>
										<div class="category__time"><?php echo (get_post_meta($post->ID, 'wz-post-duration', true)); ?></div>
									</div>
								</article>
						<?php endforeach;
						} ?>
					<?php
						the_posts_pagination(array(
							'show_all'     => false, // показаны все страницы участвующие в пагинации
							'end_size'     => 1,     // количество страниц на концах
							'mid_size'     => 1,     // количество страниц вокруг текущей
							'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
							'prev_text'    => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.7" d="M2.12208 11.7872L8.37208 17.881C8.53485 18.0397 8.79852 18.0397 8.96126 17.881C9.12403 17.7223 9.12403 17.4652 8.96126 17.3065L3.42251 11.9062L21.5833 11.9062C21.8136 11.9062 22 11.7245 22 11.5C22 11.2754 21.8136 11.0937 21.5833 11.0937L3.42251 11.0937L8.96126 5.69347C9.12403 5.53476 9.12403 5.27769 8.96126 5.11902C8.87989 5.03969 8.77325 5 8.66665 5C8.56005 5 8.45345 5.03969 8.37204 5.11902L2.12204 11.2128C1.95931 11.3714 1.95931 11.6285 2.12208 11.7872Z" fill="#757575"></path> </svg>'),
							'next_text'    => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.7" d="M21.8779 12.2128L15.6279 6.11903C15.4651 5.96032 15.2015 5.96032 15.0387 6.11903C14.876 6.27773 14.876 6.53481 15.0387 6.69348L20.5775 12.0938H2.41668C2.18637 12.0938 2 12.2755 2 12.5C2 12.7246 2.18637 12.9063 2.41668 12.9063H20.5775L15.0387 18.3065C14.876 18.4652 14.876 18.7223 15.0387 18.881C15.1201 18.9603 15.2267 19 15.3334 19C15.44 19 15.5466 18.9603 15.628 18.881L21.878 12.7872C22.0407 12.6286 22.0407 12.3715 21.8779 12.2128Z" fill="#757575"></path> </svg>'),
							'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
							'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
							'screen_reader_text' => __('Posts navigation'),
							'class'        => 'wz-blog-pagination', // CSS класс, добавлено в 5.5.0.
						));
					}

					?>
				</div>
			</div>

		</section>
	</div>



</main><!-- #main -->

<?php
get_footer();
