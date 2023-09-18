<?php

/**
 * wazzup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wazzup
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wazzup_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wazzup, use a find and replace
		* to change 'wazzup' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('wazzup', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__('Header', 'wazzup'),
			'header-menu-help' => esc_html__('Header (Help)', 'wazzup'),
			'footer-menu' => esc_html__('Footer', 'wazzup'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wazzup_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'wazzup_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wazzup_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wazzup_content_width', 640);
}
add_action('after_setup_theme', 'wazzup_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wazzup_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wazzup'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wazzup'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wazzup_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wazzup_scripts()
{

	if (get_post_type() == "help" || is_search()) {
		wp_enqueue_style('wazzup-vendor', get_stylesheet_directory_uri() . '/css/help/vendor.css');
		wp_enqueue_style('wazzup-main', get_stylesheet_directory_uri() . '/css/help/main.css');
		wp_enqueue_style('wazzup-style', get_stylesheet_uri(), array(), _S_VERSION);
		wp_enqueue_script('wazzup-js-main', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.1, true);
		wp_enqueue_script('wazzup-js-custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), 1.1, true);
		wp_enqueue_script('wazzup-js-menu-mobile', get_stylesheet_directory_uri() . '/js/kb-menu-mobile.js', array(), 1.2, true);
	}

	if (is_singular('post') || is_home() || is_category() || is_tag()) {
		wp_enqueue_style('wazzup-blog-vendor', get_stylesheet_directory_uri() . '/css/blog/vendor.css');
		wp_enqueue_style('wazzup-blog-main', get_stylesheet_directory_uri() . '/css/blog/main.css');
		wp_enqueue_style('wazzup-blog-style', get_stylesheet_directory_uri() . '/css/blog/style.css');
		wp_enqueue_script('wazzup-js-blog-main', get_stylesheet_directory_uri() . '/js/blog/main.js', array(), 1.1, true);
	}
	wp_style_add_data('wazzup-style', 'rtl', 'replace');


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wazzup_scripts');
add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method()
{
	wp_enqueue_script('jquery');
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Post Type
 */
require get_template_directory() . '/inc/post-type.php';

require get_template_directory() . '/inc/kb-ajax.php';

require get_template_directory() . '/inc/kb-shortcode.php';

require get_template_directory() . '/inc/blog-shortcode.php';
require get_template_directory() . '/inc/yoast-breadcrumbs.php';


// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}

	return $data;
}

/*
 * Фильтр меню для отображения только одной указанной ветви, оформленный как шорткод
 * Параметр по умолчанию depth=1 регулирует глубину вывода
 * [listmenu menu=your-menu-slug depth=0] глубина не ограничена
 * Шорткод [listmenu] выведет первое по порядку меню полностью с заданной глубиной
 * [listmenu menu=your-menu-slug] В параметр menu нужно указать название меню, тогда будет выведено указанное меню полностью с заданной глубиной
 * [listmenu menu=your-menu-slug item-url='http://example.com/sample-page'] или
 * [listmenu menu=your-menu-slug item-url=1011] В параметр item-url=указывается либо полный url либо id страницы в указанном меню, потомков которой нужно вывести с заданной глубиной
 */
function submenu_limit($items, $args)
{
	if (empty($args->submenu)) {
		return $items;
	}
	//$ids = wp_filter_object_list( $items, array( 'url' => $args->submenu ), 'and', 'ID' );
	$ids = wp_filter_object_list($items, array('url' => $args->submenu, 'object_id' => $args->submenu), 'or', 'ID');
	$parent_id = array_pop($ids);
	$children  = submenu_get_children_ids($parent_id, $items);
	foreach ($items as $key => $item) {

		if (!in_array($item->ID, $children)) {
			unset($items[$key]);
		}
	}
	return $items;
}
function submenu_get_children_ids($id, $items)
{
	$ids = wp_filter_object_list($items, array('menu_item_parent' => $id), 'and', 'ID');
	foreach ($ids as $id) {

		$ids = array_merge($ids, submenu_get_children_ids($id, $items));
	}
	return $ids;
}
function list_menu($shortcode_args = null)
{
	$messages = array('<pre>');
	array_push($messages, 'list_menu');
	$args = array(
		'container_class' => 'wz-branch-menu',
		'echo' => 0,
	);
	$theme_location = '';
	if (array_key_exists('theme_location', $shortcode_args)) {
		$theme_location = $shortcode_args['theme_location'];
	}
	$args['theme_location'] = $theme_location;
	$depth = 1;
	if (array_key_exists('depth', $shortcode_args)) {
		$depth = $shortcode_args['depth'];
	}
	$args['depth'] = $depth;
	$menu = '';
	if (array_key_exists('menu', $shortcode_args)) {
		$menu = $shortcode_args['menu'];
	}
	$args['menu'] = $menu;
	$submenu = '';
	if (array_key_exists('item-url', $shortcode_args)) {
		$submenu = $shortcode_args['item-url'];
		add_filter('wp_nav_menu_objects', 'submenu_limit', 10, 2);
	}
	$args['submenu'] = $submenu;
	/*if (!empty($shortcode_args)) {
		if (!empty($shortcode_args['menu'])) {
			$args['menu'] = $shortcode_args['menu'];
		}
		if (!empty($shortcode_args['item-url'])) {
			$args['submenu'] = $shortcode_args['item-url'];
		}
		add_filter( 'wp_nav_menu_objects', 'submenu_limit', 10, 2 );
	}*/
	array_push($messages, 'args: ' . print_r($args, true));
	$menu = wp_nav_menu($args);
	//array_push($messages, 'menu: ' . print_r($menu, true));
	array_push($messages, '</pre>');
	//if( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $messages);
	//}
	return $menu;
}
add_shortcode('listmenu', 'list_menu');




/*
 *	Регистрируем новые локации меню и выводим их шорткодом 
 */
function wz_register_menus()
{
	register_nav_menus(
		array(
			'wz_blog_header' => __('Blog Header'),
			'wz_sidebar_main_navigation' => __('Main (wz_sidebar_main_navigation)'),
			'wz_sidebar_whatsapp_api_navigation' => __('Wazzup API (wz_sidebar_whatsapp_api_navigation)'),
			'wz_sidebar_all_about_wazzup_navigation' => __('All about Wazzup (wz_sidebar_all_about_wazzup_navigation)'),
			'wz_sidebar_amocrm_navigation' => __('amoCRM (wz_sidebar_amocrm_navigation)'),
			'wz_sidebar_bitrix24_navigation' => __('Bitrix24 (wz_sidebar_bitrix24_navigation)'),
			'wz_sidebar_other_crm_navigation' => __('other CRM (wz_sidebar_other_crm_navigation)'),
			'kb-menu-main' => __('KB меню Главная (kb-menu-main)'),
			'kb-menu-service-setup' => __('KB меню Настройка Сервиса (kb-menu-service-setup)'),
			'kb-menu-api' => __('KB меню API (kb-menu-api)'),
			'kb-menu-usage' => __('KB меню Как пользоваться (kb-menu-usage)'),
			'kb-menu-solving' => __('KB меню Решение проблем (kb-menu-solving)'),
		)
	);
}
add_action('init', 'wz_register_menus');


function template_chooser($template)
{
	global $wp_query;
	$post_type = get_query_var('post_type');
	if ($wp_query->is_search && $post_type == 'help') {
		return locate_template('archive-search.php');  //  redirect to archive-search.php
	}
	return $template;
}
add_filter('template_include', 'template_chooser');


add_filter('excerpt_more', fn () => '');
add_filter('excerpt_length', function () {
	return 20;
});



// Uploads
function wpse_147750_upload_dir($dirs)
{
	$dirs['baseurl'] = network_site_url('/wp-content/uploads');
	$dirs['basedir'] = ABSPATH . 'wp-content/uploads';
	$dirs['path'] = $dirs['basedir'] . $dirs['subdir'];
	$dirs['url'] = $dirs['baseurl'] . $dirs['subdir'];

	return $dirs;
}

add_filter('upload_dir', 'wpse_147750_upload_dir');



/**
 *  Function to get post ID By slug 
 */

function get_post_id_by_slug($slug)
{

	$post = get_page_by_path($slug);

	if ($post) {
		return $post->ID;
	} else {
		return null;
	}
}





function get_related_category_posts()
{
	// Check if we are on a single page, ift, return false
	if (!is_single())
		return false;

	// Get the current post id
	$post_id = get_queried_object_id();

	// Get the post categories
	$categories = get_the_category($post_id);

	// Lets build our array
	// If we don have categories, bail
	if (!$categories)
		return false;

	foreach ($categories as $category) {
		if ($category->parent == 0) {
			$term_ids[] = $category->term_id;
		} else {
			$term_ids[] = $category->parent;
			$term_ids[] = $category->term_id;
		}
	}

	// Remove duplicate values from the array
	$unique_array = array_unique($term_ids);

	// Lets build our query
	$args = [
		'post__not_in' => [$post_id],
		'posts_per_page' => 3, // Note: showposts is depreciated in favor of posts_per_page
		'ignore_sticky_posts' => 1, // Note: caller_get_posts is depreciated
		'orderby' => 'DESC',
		'no_found_rows' => true,
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'terms' => $unique_array,
				'include_children' => false,
			],
		],
	];
	$q = new WP_Query($args);
	return $q;
}
