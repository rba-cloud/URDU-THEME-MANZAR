<?php
/** Manzar News theme setup and small presentation blocks. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function manzar_news_setup() {
	load_theme_textdomain( 'manzar-news', get_template_directory() . '/languages' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'manzar_news_setup' );

function manzar_news_assets() {
	wp_enqueue_style( 'manzar-news', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'manzar_news_assets' );

function manzar_news_register() {
	register_block_pattern_category( 'manzar-news', array( 'label' => __( 'Manzar News — newspaper', 'manzar-news' ) ) );
	register_block_type( 'manzar-news/current-date', array(
		'api_version' => 3,
		'render_callback' => function () {
			return '<p ' . get_block_wrapper_attributes( array( 'class' => 'manzar-current-date' ) ) . '><time datetime="' . esc_attr( current_time( 'Y-m-d' ) ) . '">' . esc_html( wp_date( 'l، j F Y' ) ) . '</time></p>';
		},
	) );
	register_block_type( 'manzar-news/share-links', array(
		'api_version' => 3,
		'render_callback' => function () {
			if ( ! is_singular( 'post' ) ) { return ''; }
			$url = rawurlencode( get_permalink() );
			$title = rawurlencode( get_the_title() );
			return '<nav ' . get_block_wrapper_attributes( array( 'class' => 'manzar-share', 'aria-label' => __( 'خبر شیئر کریں', 'manzar-news' ) ) ) . '><span>' . esc_html__( 'خبر شیئر کریں', 'manzar-news' ) . '</span> <a rel="noopener noreferrer" target="_blank" href="' . esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . $url ) . '">Facebook</a> <a rel="noopener noreferrer" target="_blank" href="' . esc_url( 'https://wa.me/?text=' . $title . '%20' . $url ) . '">WhatsApp</a> <a href="' . esc_url( 'mailto:?subject=' . $title . '&body=' . $url ) . '">Email</a></nav>';
		},
	) );
}
add_action( 'init', 'manzar_news_register' );

function manzar_news_editor_blocks() {
	wp_enqueue_script( 'manzar-news-editor', get_theme_file_uri( '/assets/editor.js' ), array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-i18n' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'manzar_news_editor_blocks' );

/** Native queries retain editor selections; resolve only the untouched placeholder. */
function manzar_news_query_vars( $query, $block ) {
	$settings = $block->context['query'] ?? array();
	$slug = $settings['manzarCategory'] ?? '';
	$selected = $settings['taxQuery']['category'] ?? array();
	if ( in_array( $slug, array( 'pakistan', 'world', 'sports', 'business', 'technology' ), true ) && array( 0 ) === $selected ) {
		$category = get_category_by_slug( $slug );
		$query['tax_query'] = array( array( 'taxonomy' => 'category', 'field' => 'term_id', 'terms' => array( $category ? (int) $category->term_id : 0 ) ) );
	}
	if ( ! empty( $settings['manzarRelated'] ) && is_singular( 'post' ) ) {
		$post_id = get_queried_object_id();
		$categories = wp_get_post_categories( $post_id );
		$query['post__not_in'] = array( $post_id );
		$query['category__in'] = $categories ? $categories : array( 0 );
	}
	return $query;
}
add_filter( 'query_loop_block_query_vars', 'manzar_news_query_vars', 10, 2 );
