<?php
/*
 * Добавление пересенной с адресом admin-ajax.php для файла javascript Ajax во фронтэнде
 */
add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){
	wp_localize_script( 'jquery', 'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
}

/*
 * Вывод post_title и post_content при получении на адрес admin-ajax.php параметра action = get_kb_single с дополнительным параметром url
 */
add_action( 'wp_ajax_get_kb_single', 'show_kb_single' );
add_action( 'wp_ajax_nopriv_get_kb_single', 'show_kb_single' );
function show_kb_single() {
	$message = array('<pre>');
	$message = array();
	//$result = array(
	//	'post_title' => 'Пост не найден',
	//	'post_content' => 'Сабж',
	//);
	$result = array();
	array_push($message, 'show_kb_single');
	$url = 'https://wz-ru-ru.ru/help/';
	array_push($message, 'url: ' . $url);
	if (array_key_exists('url', $_GET)) {
		$url = $_GET['url'];
		array_push($message, 'url: ' . $url);
	}
	$post_id = url_to_postid($url);
	array_push($message, 'post_id: ' . $post_id);
	$url_basename = basename($url);
	array_push($message, 'url_basename: ' . $url_basename);
	if (in_array($url_basename, array('ru', 'en'))) {
		//$url = pll_home_url();
		//array_push($message, 'url: ' . $url);
		$post_id = get_option('page_on_front');
		array_push($message, 'post_id: ' . $post_id);
	}
	if ($post_id) {
		$post = get_post($post_id);
		$post_title = $post->post_title;
		array_push($message, 'post_title: ' . $post_title);
		$post_content = do_shortcode(wpautop($post->post_content));
		array_push($message, 'post_content do_shortcode wpautop: ' . $post_content);
		/*if (class_exists("\\Elementor\\Plugin")) {
			$pluginElementor = \Elementor\Plugin::instance();
			$post_content_elementor = $pluginElementor->frontend->get_builder_content($post_id);
			array_push($message, 'post_content_elementor: ' . $post_content_elementor);
			if ($post_content_elementor) {
				$post_content = $post_content_elementor;
			}
		}*/
		array_push($result, $post_title);
		array_push($result, $post_content);
		$result['post_title'] = $post_title;
		$result['post_content'] = $post_content;
	}
	array_push($message, '</pre>');
	//if( current_user_can('administrator') ){
	//	echo implode('<br />', $message);
	//}
	$json = json_encode($result);
	$json = json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG);
	//array_push($message, 'json: ' . print_r($json, true));
	echo $json;
	wp_die();
}

/*
 * Вывод admin пользователь или нет при получении на адрес admin-ajax.php параметра action = get_adminbar
 */
add_action( 'wp_ajax_get_adminbar', 'wz_show_adminbar' );
add_action( 'wp_ajax_nopriv_get_adminbar', 'wz_show_adminbar' );
function wz_show_adminbar() {
	$message = array('<pre>');
	array_push($message, 'wz_show_adminbar');
	$adminbar = array('permission' => false);
	if( current_user_can('editor') || current_user_can('administrator') ) {
		$adminbar['permission'] = true;
	}
	$json = json_encode($adminbar);
	array_push($message, 'json: ' . print_r($json, true));
	array_push($message, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $message);
	//}
	echo $json;
	wp_die();
}

?>