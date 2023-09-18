<?php
/*
 * [post-link post_id=14878]
 * [post-link post_id=14872 link_title='Назад к разделам']
 * [post-link post_id=14872 link_title='Назад к разделам' inline='y']
 */
function post_link_shortcode($shortcode_args = null) {
	$messages = array('<pre>');
	array_push($messages, 'list_menu');
	array_push($messages, 'shortcode_args: ' . print_r($shortcode_args, true));
	$link = 'Пост не найлен';
	$url = get_post_type_archive_link('help');
	$inline_class = '';
	$post_id = false;
	$post_title = 'Заголовок не указан';
	if (array_key_exists('post_id', $shortcode_args)) {
		$post_id = $shortcode_args['post_id'];
		array_push($messages, 'post_id: ' . $post_id);
		$post = get_post($post_id);
		$url = get_post_type_archive_link('help');
		array_push($messages, 'url: ' . $url);
		$post_title = $post->post_title;
		array_push($messages, 'post_title: ' . $post_title);
		if (array_key_exists('link_title', $shortcode_args)) {
			$link_title = $shortcode_args['link_title'];
			array_push($messages, 'link_title: ' . $link_title);
			$post_title = __($link_title, 'wazzup');
			array_push($messages, 'post_title: ' . $post_title);
		}
		if (array_key_exists('inline', $shortcode_args)) {
			$inline = $shortcode_args['inline'];
			if ($inline == 'y') {
				$inline_class = 'wz24h-link-from-shortcode-inline';
			}
		}
	}
	$link = '<a class="wz24h-link-from-shortcode ' . $inline_class . '" href="' . $url . '">' . $post_title . '</a>';
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
	return $link;
}
add_shortcode('post-link', 'post_link_shortcode');

/*
 * [parent-link link_title='Назад к разделам']
 * [parent-link link_title='Назад к разделам' order='first']
 * [parent-link link_title='Назад к разделам' order='last']
 */
function parent_link_shortcode($shortcode_args = null) {
	$messages = array('<pre>');
	array_push($messages, 'list_menu');
	array_push($messages, 'shortcode_args: ' . print_r($shortcode_args, true));
	$link = 'Пост не найлен';
	$url = '/';
	$post_id = 14872;
	$post_title = 'Заголовок не указан';
	$current_post = get_post();
	$current_post_id = $current_post->ID;
	$parent_id = wp_get_post_parent_id($current_post_id);
	array_push($messages, 'parent_id: ' . $parent_id);
	$parents = get_ancestors($current_post_id, 'page');
	array_push($messages, 'parents: ' . print_r($parents, true));
	$parents_permission = false;
	$order = 'last';
	if (array_key_exists('order', $shortcode_args)) {
		$order = $shortcode_args['order'];
	}
	array_push($messages, 'parents не массив');
	if (is_array($parents)) {
		array_push($messages, 'parents массив');
		array_push($messages, 'parents пустой');
		if (!empty($parents)) {
			array_push($messages, 'parents не пустой');
			$parents_permission = true;
		}
	}
	if ($parents_permission) {
		if ($order == 'last') {
			array_push($messages, 'post_id array_pop');
			$parent_id = array_pop($parents);
		} else {
			array_push($messages, 'post_id array_shift');
			$parent_id = array_shift($parents);
		}
		$post_id = $parent_id;
	} else {
		array_push($messages, 'post_id page_on_front');
		$post_id = get_option('page_on_front');
	}
	array_push($messages, 'post_id: ' . $post_id);
	$post = get_post($post_id);
	$url = get_permalink( $post );
	$post_title = $post->post_title;
	$class = 'kb-parent';
	if (!$parent_id) {
		if (array_key_exists('link_title', $shortcode_args)) {
			$post_title = __($shortcode_args['link_title'], 'wazzup');
			$url = get_post_type_archive_link('help');
			$class .= ' kb-main';
		}
	}
	$link = '<a href="' . $url . '" class="' . $class . '">' . $post_title . '</a>';
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
	return $link;
}
add_shortcode('parent-link', 'parent_link_shortcode');


/*
* [parent-breadcrumbs link_title='Назад к разделам']
* 
*
*/

function parent_breadcrumbs_shortcode($shortcode_args = null) {
	$messages = array('<pre>');
	array_push($messages, 'list_menu');
	array_push($messages, 'shortcode_args: ' . print_r($shortcode_args, true));
	$html = 'Пост не найлен';
	$url = '/';
	$post_id = 14872;
	$post_title = 'Заголовок не указан';
	$current_post = get_post();
	$current_post_id = $current_post->ID;
	$parent_id = wp_get_post_parent_id($current_post_id);
	array_push($messages, 'parent_id: ' . $parent_id);
	$parents = get_ancestors($current_post_id, 'page');
	array_push($messages, 'parents: ' . print_r($parents, true));
	$parents_permission = false;
	$order = 'last';
	if (array_key_exists('order', $shortcode_args)) {
		$order = $shortcode_args['order'];
	}
	array_push($messages, 'parents не массив');
	if (is_array($parents)) {
		array_push($messages, 'parents массив');
		array_push($messages, 'parents пустой');
		if (!empty($parents)) {
			array_push($messages, 'parents не пустой');
			$parents_permission = true;
		}
	}
	if ($parents_permission) {
		if ($order == 'last') {
			array_push($messages, 'post_id array_pop');
			$parent_id = array_pop($parents);
		} else {
			array_push($messages, 'post_id array_shift');
			$parent_id = array_shift($parents);
		}
		$post_id = $parent_id;
	} else {
		array_push($messages, 'post_id page_on_front');
		$post_id = get_option('page_on_front');
	}
	array_push($messages, 'post_id: ' . $post_id);
	$post = get_post($post_id);
	$url = get_permalink( $post );
	$post_title = $post->post_title;
	$class = 'ee-breadcrumbs__crumb';
	if (!$parent_id) {
		if (array_key_exists('link_title', $shortcode_args)) {
			$post_title = __($shortcode_args['link_title'], 'wazzup');
			$url = get_post_type_archive_link('help');
			$class .= ' breadcrumbs__crumb_none';
		}
	}
	$html = '
	<ul class="breadcrumbs ' . $class . '">
		<li class="breadcrumbs__item">
			<a href="' . $url . '" class="' . $class . '"><span class="breadcrumbs__text">' . $post_title . '</span></a>
			<meta content="0">
		</li>
		<li class="breadcrumbs__separator"><span class="breadcrumbs__separator__text">/</span></li>
	</ul>
	';
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
	return $html;
}
add_shortcode('parent-breadcrumbs', 'parent_breadcrumbs_shortcode');

/*
 * [wz-detect-crm]
 */
add_shortcode( 'wz-detect-crm', 'wz_detect_crm_shortcode' );
function wz_detect_crm_shortcode( $atts ) {
	$message = array('<pre>');
	$crms = array(
	    'techpartner' => 'wz-empty wz-techpartner',
	    'business' => 'wz-business',
	    'main' => 'wz-empty',
		'whatsapp' => 'wz-whatsapp',
		'instagram' => 'wz-instagram',
		'telegram' => 'wz-telegram',
		'vk' => 'wz-vk',
		'-crm' => 'wz-crm',
		'pricing' => 'wz-empty',
		'contact' => 'wz-empty',
		'affiliate' => 'wz-empty wz-partner',
		'partnership' => 'wz-empty wz-partner',
		'privacy' => 'wz-empty',
		'agreement' => 'wz-empty',
		'elementor' => 'wz-empty',
	);
	$result = array();
	$url = get_permalink(get_the_ID());
	foreach ($crms as $crm_key => $crm_value) {
		if (strpos($url, $crm_key) !== false) {
			array_push($result, $crm_value);
		}
	}
	if (empty($result)) {
		//if (is_front_page()) {
		//	array_push($result, 'wz-whatsapp');
		//	array_push($result, 'wz-crm');
		//} else {
			array_push($result, 'wz-empty');
		//}
	}
	if (is_front_page()) {
		array_push($result, 'wz-main');
	}
	array_push($message, implode('<br />', $result));
	array_push($message, 'url: ' . $url . '^');
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return implode(' ', $result);
}


/*
 * Шорткод [wz-cookie-get name="__ref"]
 */
add_shortcode('wz-cookie-get', 'wz_cookie_get_shortcode');
function wz_cookie_get_shortcode($args) {
	$message = array('<pre>');
	array_push($message, 'wz_cookie_get_shortcode:');
	$result = '';
	if (array_key_exists('name', $args)) {
		if (array_key_exists($args['name'], $_COOKIE))
		$result = '?' . $args['name']  . '=' . $_COOKIE[$args['name']];
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	return $result;
}

?>