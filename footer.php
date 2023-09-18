<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wazzup
 */

?>

	
	<?php 
	if (get_post_type() == "help" || is_404() || is_single() || is_home() || is_category() || is_tag()) {
		get_template_part( 'template-parts/footers/footer', 'help');
	} elseif (is_post_type_archive('help') && is_search()) {
		get_template_part( 'template-parts/footers/footer', 'help');
	} else {
		get_template_part( 'template-parts/footers/footer');
	}
	?>
</div><!-- #page -->
<div id="wz-to-top" class="wz-to-top--visible"><img src="<?php echo get_template_directory_uri(); ?>/img/wz24-arrow-to-top.svg" width="24" height="24"></div>
<?php wp_footer(); ?>

</body>
</html>
