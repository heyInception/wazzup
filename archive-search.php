<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * Template Name: SearchHelp
 * @package wazzup
 */

get_header();
?>
<?php
add_filter( 'the_content', 'kama_search_highlight' );
add_filter( 'get_the_excerpt', 'kama_search_highlight' );
add_filter( 'the_title', 'kama_search_highlight' );

/**
 * Highlight search words in specified text.
 *
 * @param string $text The text you want to highlight the words in.
 *
 * @return string
 *
 * @version 0.1
 */
function kama_search_highlight( $text ){

	// settings
	$styles = ['',
		'color: #000; background: #d2ebd3;',
		'color: #000; background: #d2ebd3;',
		'color: #000; background: #d2ebd3;',
		'color: #000; background: #d2ebd3;',
		'color: #000; background: #d2ebd3;',
	];

	// for the search pages and the main loop only.
	if( ! is_search() || ! in_the_loop() )
		return $text;

	$query_terms = get_query_var( 'search_terms' );

	if( empty( $query_terms ) )
		$query_terms = array_filter( (array) get_search_query() );

	if( empty( $query_terms ) )
		return $text;

	$n = 0;
	foreach( $query_terms as $term ){
		$n++;

		$term = preg_quote( $term, '/' );
		$text = preg_replace_callback( "/$term/iu", static function( $match ) use ( $styles, $n ){
			return '<span style="'. $styles[ $n ] .'">'. $match[0] .'</span>';
		}, $text );
	}

	return $text;
}
?>
<main class="main">
    <div class="main__row">
        <div id="kb_menu" class="main__aside wz-enabled">
            <aside class="wz-sidebar">
                <div class="wz-sidebar__row">
                    <nav class="wz-sidebar__menu">
                        <?php echo do_shortcode("[listmenu theme_location='kb-menu-main' depth='0']") ?>
                    </nav>
                </div>
            </aside>
        </div>
        <div id="kb_content" class="main__content wz-enabled">
            <div class="main__wrap">


                <?php if (have_posts()) : ?>

                    <h1>
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Результаты поиска для: %s', 'wazzup'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h1>
                    <div class="search__wrap">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'searchhelp');

                    endwhile;
                    $args = array(
                        'show_all'     => false, // показаны все страницы участвующие в пагинации
                        'end_size'     => 1,     // количество страниц на концах
                        'mid_size'     => 1,     // количество страниц вокруг текущей
                        'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                        'prev_text'    =>'<svg style="transform: rotate(180deg);" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 11.5C2 11.8988 2.31454 12.2221 2.70261 12.2221H19.6225L15.1904 16.7731C15.0556 16.9116 14.9861 17.0963 14.9861 17.281C14.9861 17.4658 15.0556 17.6505 15.1904 17.789C15.4641 18.0703 15.9093 18.0703 16.183 17.789L21.8039 12.008C22.0654 11.7393 22.0654 11.2607 21.8039 10.9878L16.1789 5.21096C15.9052 4.92968 15.46 4.92968 15.1863 5.21096C14.9126 5.49225 14.9126 5.94986 15.1863 6.23115L19.6144 10.7821H2.69853C2.31046 10.7779 2 11.1012 2 11.5Z" fill="#8C8C8C"></path></svg>',
                        'next_text'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 11.5C2 11.8988 2.31454 12.2221 2.70261 12.2221H19.6225L15.1904 16.7731C15.0556 16.9116 14.9861 17.0963 14.9861 17.281C14.9861 17.4658 15.0556 17.6505 15.1904 17.789C15.4641 18.0703 15.9093 18.0703 16.183 17.789L21.8039 12.008C22.0654 11.7393 22.0654 11.2607 21.8039 10.9878L16.1789 5.21096C15.9052 4.92968 15.46 4.92968 15.1863 5.21096C14.9126 5.49225 14.9126 5.94986 15.1863 6.23115L19.6144 10.7821H2.69853C2.31046 10.7779 2 11.1012 2 11.5Z" fill="#8C8C8C"></path></svg>',
                        'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                        'screen_reader_text' => __( 'Posts navigation' ),
                        'class'        => 'pagination-search', // CSS класс, добавлено в 5.5.0.
                    );
                    the_posts_pagination( $args );
                    

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                    ?>
                    </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
