<?php
add_shortcode('wz-header-tag', function ($atts) {
	$current_lang = get_locale();
	if (is_tag()) {
		$posttags = get_the_tags();
		switch ($current_lang) {
			case 'ru_RU':
				echo single_term_title('<h1>Статьи по тегу «', true) . '»</h1>';
				break;
			case 'en_US':
				echo single_term_title('<h1>Articles by tag «', true) . '»</h1>';
				break;
			case 'es_ES':
				echo single_term_title('<h1>Artículos por etiqueta «', true) . '»</h1>';
				break;
			default:
				break;
		}
	}

	if (is_single()) {
		echo the_title('<h1>', '</h1>');
	}

	if (is_category()) {
		echo single_cat_title('<h1>', true) . '</h1>';
	}

	/*if (is_archive()) {
		echo 'test';
	}*/
});

add_shortcode('wz-tag', function ($atts) {
	$current_lang = get_locale();
	if (is_tag()) {
		$posttags = get_the_tags();
		switch ($current_lang) {
			case 'ru_RU':
				echo single_term_title('Статьи по тегу «', true) . '»';
				break;
			case 'en_US':
				echo single_term_title('Articles by tag «', true) . '»';
				break;
			case 'es_ES':
				echo single_term_title('Artículos por etiqueta «', true) . '»';
				break;
			default:
				break;
		}
	}

	if (is_single()) {
		echo the_title('', '</h1>');
	}

	if (is_category()) {
		echo single_cat_title('', true) . '';
	}

	/*if (is_archive()) {
		echo 'test';
	}*/
});




/*
 * Шорткод [wz-blog-tags] выводит список тегов
 * [wz-blog-tags number='5']
 * [wz-blog-tags order='0']
 * [wz-blog-tags action='current']
 */
add_shortcode('wz-blog-tags', 'wz_blog_tags');
function wz_blog_tags($args)
{
	//echo '<pre>';
	//echo 'wz_blog_tags<br />';
	//echo 'args:<br />';
	//print_r($args);
	$body_class = get_body_class();
	//echo 'body_class:<br />';
	//print_r($body_class);
	//$tags = get_tags();
	$action = 'all';
	if (array_key_exists('action', $args)) {
		$action = $args['action'];
	}
	//echo 'action: ' . $action . '^<br />';
	$tags = array();
	if (in_array($action, array('all'))) {
		$terms_args = array(
			'orderby'     => 'date',
			//'orderby'     => array('meta_value', 'name'),
			'order'       => 'DESC',
			'taxonomy'    => 'post_tag',
		);
		if (array_key_exists('order', $args)) {
			$terms_args['meta_value'] = $args['order'];
		}
		if (array_key_exists('number', $args)) {
			$terms_args['number'] = $args['number'];
		}
		//echo 'terms_args:<br />';
		//print_r($terms_args);
		$tags = get_terms($terms_args);

		//echo 'tags:<br />';
		//print_r($tags);
	}
	if (in_array($action, array('current'))) {
		$post = get_post();
		//echo 'post->ID: ' . $post->ID . '^<br />';
		//echo 'post->post_title: ' . $post->post_title . '^<br />';
		$tags = wp_get_post_terms($post->ID);
		//$length  = null;
		//if (array_key_exists('number', $args)) {
		//	$length = $args['number'];
		//}
		//$tags = array_slice(wp_get_post_terms($post->ID), 0, $length);

	}
	$html = array();
	array_push($html, '<div class="tags__items tags__items_none">');
	if (!empty($tags)) {
		foreach ($tags as $tag) {
			$meta_value = get_term_meta($tag->term_id, 'wz-blog-tag-order', true);
			/*echo 'meta_value: ' . $meta_value . '^<br />';
			if (empty($meta_value)) {
				update_term_meta( $tag->term_id, 'wz-blog-tag-order', '0' );
			}*/
			$active = '';
			if (in_array('tag-' . $tag->term_id, $body_class)) {
				$active = ' wz-active-tag';
			}
			$tag_link = get_tag_link($tag->term_id);
			//echo 'tag_link: ' . $tag_link . '^<br />';
			$tag_html = '<a href="' . $tag_link
				. '" title="' . $tag->name
				. '" class="' . $tag->slug . $active
				. '">#' . $tag->name . '</a> ';
			//echo 'tag_html: ' . $tag_html . '^<br />';
			array_push($html, $tag_html);
		}
	} else {
		//$message = 'Tags not found';
		$message = _e('Tags not found', 'wazzup');
		if (array_key_exists('message', $args)) {
			$message = $args['message'];
		}
		array_push($html, $message);
	}
	array_push($html, '</div>');
	//echo '</pre>';
	return implode('', $html);
}



/*
 * [wz-translate-options en='https://t.me/WazzupSupportbot' ru='https://t.me/wazzup_support_bot']
 */

function wz_button_translate($attr, $content = null)
{
	extract(shortcode_atts(array(

		'language' => '',

	), $attr));
	$current_language = get_locale();
	$output = '';
	if ($current_language == $language) {
		$output = do_shortcode($content);
	}


	return $output;
}
add_shortcode('wz-translate', 'wz_button_translate');