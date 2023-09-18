<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wazzup
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<?php 
	if (get_post_type() == "help"  || is_404()) {
		get_template_part( 'template-parts/headers/header', 'help');
	} elseif (is_post_type_archive('help') && is_search()) {
		get_template_part( 'template-parts/headers/header', 'help');
	} elseif (is_singular( 'post' ) || is_home() || is_category() || is_tag()) {
		get_template_part( 'template-parts/headers/header', 'blog');
	} else {
		get_template_part( 'template-parts/headers/header');
	} 

	?>
	<?php ?>

	