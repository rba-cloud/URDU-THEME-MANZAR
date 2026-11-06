<?php
/** Optional local demo importer: wp eval-file wp-content/themes/manzar-news/demo-content/import.php */
if ( ! defined( 'ABSPATH' ) || ! defined( 'WP_CLI' ) || ! WP_CLI ) { exit; }
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
$demo = json_decode( file_get_contents( __DIR__ . '/stories.json' ), true );
$terms = array();
foreach ( $demo['categories'] as $category ) {
	$term = get_category_by_slug( $category[0] );
	if ( ! $term ) {
		$created = wp_insert_term( $category[1], 'category', array( 'slug' => $category[0] ) );
		if ( is_wp_error( $created ) ) { WP_CLI::error( $created->get_error_message() ); }
		$terms[ $category[0] ] = $created['term_id'];
	} else { $terms[ $category[0] ] = $term->term_id; }
}
$images = array();
foreach ( $demo['posts'] as $story ) {
	$existing = get_page_by_path( $story['slug'], OBJECT, 'post' );
	if ( $existing ) { continue; }
	$id = wp_insert_post( array( 'post_title' => $story['title'], 'post_name' => $story['slug'], 'post_content' => $story['content'], 'post_excerpt' => 'ڈیمو مواد — فرضی خبر، صرف تھیم کی نمائش کے لیے۔', 'post_status' => 'publish', 'post_category' => array( $terms[ $story['category'] ] ), 'comment_status' => 'closed' ), true );
	if ( is_wp_error( $id ) ) { WP_CLI::error( $id->get_error_message() ); }
	$file = $story['image'];
	if ( empty( $images[ $file ] ) ) {
		$tmp = wp_tempnam( $file );
		copy( dirname( __DIR__ ) . '/assets/images/' . $file, $tmp );
		$attachment = media_handle_sideload( array( 'name' => $file, 'tmp_name' => $tmp ), $id, 'غیر حقیقی ڈیمو منظر — اصل واقعے کی تصویر نہیں' );
		if ( is_wp_error( $attachment ) ) { wp_delete_file( $tmp ); WP_CLI::warning( $attachment->get_error_message() ); }
		else { $images[ $file ] = $attachment; update_post_meta( $attachment, '_wp_attachment_image_alt', 'ڈیمو کے لیے تیار کردہ تجریدی شہری منظر' ); }
	}
	if ( ! empty( $images[ $file ] ) ) { set_post_thumbnail( $id, $images[ $file ] ); }
}
if ( ! get_page_by_path( 'manzar-demo-navigation', OBJECT, 'wp_navigation' ) ) {
	$links = '<!-- wp:home-link {"label":"صفحہ اول"} /-->';
	foreach ( $demo['categories'] as $category ) {
		$url = get_category_link( $terms[ $category[0] ] );
		$links .= '<!-- wp:navigation-link ' . wp_json_encode( array( 'label' => $category[1], 'type' => 'category', 'kind' => 'taxonomy', 'id' => $terms[ $category[0] ], 'url' => $url ) ) . ' /-->';
	}
	wp_insert_post( array( 'post_type' => 'wp_navigation', 'post_status' => 'publish', 'post_title' => 'منظر — ڈیمو مینو', 'post_name' => 'manzar-demo-navigation', 'post_content' => wp_slash( $links ) ) );
}
WP_CLI::success( 'Fictional demo stories imported. Select the demo navigation in the Site Editor if another menu already exists. No existing posts or settings were overwritten.' );
