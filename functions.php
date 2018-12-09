<?php

// Set max content width 
if ( ! isset( $content_width ) ) $content_width = 1040;

// Enable support for <title> tag
add_theme_support( 'title-tag' );

// Enable support for Gutenberg wide images
add_theme_support( 'align-wide' );

// Set max srcset image width to 1800px
function remove_max_srcset_image_width( $max_width ) {
    $max_width = 2080;
    return $max_width;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

// Register Styles Sheets, Bootstrap, JQuery, & Javascript files 
add_action( 'wp_enqueue_scripts', 'script_enqueuer' );
function script_enqueuer() {
	wp_register_style( 'normalize', get_template_directory_uri().'/css/normalize.css', '', '', 'screen' );
	wp_register_style( 'fonts', get_template_directory_uri().'/css/font-awesome.min.css', '', '', 'screen' );
	wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' ); 
    wp_enqueue_style( 'normalize' );
    wp_enqueue_style( 'fonts' );
	wp_enqueue_style( 'screen' );
}	

//* Loading editor styles for the block editor (Gutenberg)
function site_block_editor_styles() {
    wp_enqueue_style( 'site-block-editor-styles', get_theme_file_uri( 'css/editor-style.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_styles' );		

// Remove WordPress crap links & Emoj 
remove_action('wp_head', 'rsd_link'); // Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writer
remove_action('wp_head', 'wp_generator'); // WordPress Generator
remove_action('wp_head', 'start_post_rel_link'); // Post Relational Links - Start
remove_action('wp_head', 'index_rel_link'); // Post Relational Links - Index
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // Post Relational Links - Next, Prev
remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1); // Disable Feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Remove Feed Icons
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Regiseter Primary Nav Menu
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'campanella-foto' ),
) );

// Add excerpt to Pages
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
	
// Add thumbnail support
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );  
	set_post_thumbnail_size( 640, 322, true ); // default Post Thumbnail dimensions
}

// Add span to post count 
add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
	$links = str_replace('</a> (', '</a> <span>(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

// Add class to WordPress single post navigation 
add_filter('next_post_link', 'post_link_attributes_1');
add_filter('previous_post_link', 'post_link_attributes_2');
function post_link_attributes_1($output) {
    $injection = 'class="next"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}
function post_link_attributes_2($output) {
    $injection = 'class="prev"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

// Custom WP login screen 
add_action('login_head', 'custom_login');
function custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/custom-login.css" />';
}
		
// Number Navigation
function wp_pagenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$args['total'] = $max;
	$args['current'] = $current;
 
	$total = 1;
	$args['mid_size'] = 3;
	$args['end_size'] = 1;
	$args['prev_text'] = '&laquo;';
	$args['next_text'] = '&raquo;';
 
	if ($max > 1) echo '<div class="page-navigation">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . ':</span>';
	echo $pages . paginate_links($args);
	if ($max > 1) echo '</div>';
}
	
// Inserting Google Analytics
add_action('wp_footer', 'ga');
function ga() {
	if ( !is_user_logged_in() ) include_once("inc/analytics.php");
}
	
?>