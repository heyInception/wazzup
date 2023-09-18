<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wazzup
 */

?>

<section class="no-results not-found">
	<h1>
		<?php
		/* translators: %s: search query. */
		printf(esc_html__('Результаты поиска для: %s', 'wazzup'), '<span>' . get_search_query() . '</span>');
		?>
	</h1>

	<div class="page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wazzup'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);
		elseif (is_search()) :
		?>
			<div class="search-content">
				<p><?php esc_html_e('Извините, но по вашему запросу ничего не найдено', 'wazzup'); ?></p>
				<ul>
					<li><?php _e('<b>Сформулируйте вопрос общими словами.</b> Составьте вопрос из ключевых слов, например, «Настроить интеграцию», «Добавить канал»', 'wazzup') ?></li>
					<li><?php _e('Обратитесь в поддержку. Ответим на любой вопрос за 5 минут:', 'wazzup') ?> <a href="mailto:support@wazzup24.com">support@wazzup24.com</a></li>
				</ul>
			</div><!-- .search-content -->
		<?php

		else :
		?>
		<?php

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->