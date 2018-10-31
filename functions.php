<?

//Redirect rules for old site
// $type  = $_GET['type'];
// $date  = $_GET['date'];
// $title  = $_GET['title'];
//
// if ($type){
// 	if($date && $title){
// 		if ($type == 'newsletters' || $type == 'pi-calls' || $type == 'sc-calls'){
// 			header("HTTP/1.1 301 Moved Permanently");
// 			header('Location: '.get_home_url().'/'.$type.'/'.$title.'/');
// 			exit;
// 		}
// 		if ($type == 'governance' || $type == 'guidelines' || $type == 'policies'){
// 			header("HTTP/1.1 301 Moved Permanently");
// 			header('Location: '.get_home_url().'/governance-guildelines/'.$type.'/'.$title.'/');
// 			exit;
// 		}
// 	} else {
// 		if ($type == 'newsletters' || $type == 'pi-calls' || $type == 'sc-calls'){
// 			header("HTTP/1.1 301 Moved Permanently");
// 			header('Location: '.get_home_url().'/'.$type.'/');
// 			exit;
// 		}
// 		if ($type == 'governance' || $type == 'guidelines' || $type == 'policies'){
// 			header("HTTP/1.1 301 Moved Permanently");
// 			header('Location: '.get_home_url().'/governance-guildelines/');
// 			exit;
// 		}
// 	}
// }


//Enqueue CSS
function theme_styles() {
	//wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/bootstrap-4.1.0-dist/css/bootstrap.min.css' );
	//wp_enqueue_style( 'slick_js_css', get_template_directory_uri() . '/css/slick.min.css');
	//wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('main_css', get_template_directory_uri() . '/dist/css/site.css', array(), '5', 'screen');
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

//Enqueue JS
function theme_js() {
	//wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/bootstrap-4.1.0-dist/js/bootstrap.bundle.min.js',array('jquery'),'4.1.0',true);
	//wp_enqueue_script( 'fontawesome_js', get_template_directory_uri() . '/scripts/all.js',array(),'5.0.6',true);
	//wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/scripts/slick.min.js',array('jquery'),'1.8.0',true);
	//wp_enqueue_script( 'scroll_sneak_js', get_template_directory_uri() . '/scripts/scroll-sneak.js',array('jquery'),'',true);
	wp_enqueue_script('main_js', get_template_directory_uri() . '/dist/js/site.js', array('jquery'), '1', true);
}
add_action( 'wp_enqueue_scripts', 'theme_js');

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'ctsa-website' ),
	'footer' => __( 'Footer Menu', 'ctsa-website' ),
) );

//Activates featured image only on page selected as "static front page"
function ctsa_meta_init() {
		add_theme_support( 'post-thumbnails', array( 'page' ) );
}
add_action('admin_init', 'ctsa_meta_init');

/**
 * Get rid of tags on posts.
 */
function unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'unregister_tags' );

//Disable unrelated meta boxes from posts and pages
function my_remove_meta_boxes() {
		remove_meta_box( 'linktargetdiv', 'link', 'normal' );
		remove_meta_box( 'linkxfndiv', 'link', 'normal' );
		remove_meta_box( 'linkadvanceddiv', 'link', 'normal' );
		remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
		remove_meta_box( 'postcustom', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
		remove_meta_box( 'commentsdiv', 'post', 'normal' );
		remove_meta_box( 'authordiv', 'post', 'normal' );
		remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
		remove_meta_box( 'postexcerpt', 'page', 'normal' );
		remove_meta_box( 'postexcerpt', 'post', 'normal' );
		remove_meta_box( 'trackbacksdiv', 'page', 'normal' );
		remove_meta_box( 'postcustom', 'page', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
		remove_meta_box( 'commentsdiv', 'page', 'normal' );
		remove_meta_box( 'authordiv', 'page', 'normal' );
		remove_meta_box( 'sqpt-meta-tags', 'page', 'normal' );
}
add_action( 'admin_menu', 'my_remove_meta_boxes' );

//Disable unrelated dashboard widgets
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
	// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

// remove all actions related to emojis
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Filter the except length to 20 words.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Check if the Footer Menu exists
$menu_name = 'Footer Menu';
$menulocation = 'footer-menu';
$menu_exists = wp_get_nav_menu_object( $menu_name );

// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menu_name);

	// Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('NIH'),
        'menu-item-url' => 'https://www.nih.gov/',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('NCATS'),
        'menu-item-url' => 'https://ncats.nih.gov/',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('PRIVACY ACT'),
        'menu-item-url' => 'https://ncats.nih.gov/privacy',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('ACCESSIBILITY'),
        'menu-item-url' => 'https://ncats.nih.gov/accessibility',
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('DISCLAIMER'),
        'menu-item-url' => 'https://ncats.nih.gov/disclaimer',
        'menu-item-status' => 'publish'));
} else {
	$menu_id = wp_get_nav_menu_object( $menu_name );
}
// Grab the theme locations and assign our newly-created menu to the menu location
if( !has_nav_menu( $menulocation ) ){
		$locations = get_theme_mod('nav_menu_locations');
		$locations[$menulocation] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
}

function ctsa_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Network Logo', 'theme_name' ),
			'id'            => 'network-logo',
			'before_widget' => '<div id="network-logo" class="d-none d-md-block col-md-4 px-5 site-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<!--',
			'after_title'   => '-->',
	) );
	register_sidebar( array(
			'name'          => __( 'Network Logo #2', 'theme_name' ),
			'id'            => 'network-logo-2',
			'before_widget' => '<div id="network-logo-2" class="d-none d-md-block col-md-4 px-4 site-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<!--',
			'after_title'   => '-->',
	) );
	register_sidebar( array(
			'name'          => __( 'Site Logo', 'theme_name' ),
			'id'            => 'site-logo',
			'before_widget' => '<div id="site-logo" class="col-md-4 pr-3 site-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<!--',
			'after_title'   => '-->',
	) );
	register_sidebar( array(
			'name'          => __( 'Footer Logo', 'theme_name' ),
			'id'            => 'footer-logo',
			'before_widget' => '<div id="footer-logo" class="col-md-3 pr-3 site-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<!--',
			'after_title'   => '-->',
	) );
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'theme_name' ),
        'id'            => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ctsa_widgets_init' );

//Test if current page has children
function has_children() {
	global $post;
	$children = get_pages( array( 'child_of' => $post->ID ) );
	if( count( $children ) == 0 ) {
		return false;
	} else {
		return true;
	}
}

if (class_exists('acf')){
	include_once('inc/acf.php' );
	if (!current_user_can('administrator')) {
		define( 'ACF_LITE' , true );
	}
}

//add site name to body_class
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    $classes[] = get_bloginfo( 'name' );
    return $classes;
}

// Helper Functions
require get_template_directory() . '/inc/util.php';

// Post types
require get_template_directory() . '/inc/post_type/post.php';
require get_template_directory() . '/inc/post_type/person.php';
require get_template_directory() . '/inc/post_type/workgroup.php';
require get_template_directory() . '/inc/post_type/lab_project.php';
require get_template_directory() . '/inc/post_type/dream_challenge.php';
require get_template_directory() . '/inc/post_type/liaison.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Theme settings
require get_template_directory() . '/inc/theme-settings.php';


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'cd2h_register_required_plugins' );

function cd2h_register_required_plugins() {
	$plugins = array(
		array(
			'name'                  => esc_html__('WPBakery Visual Composer', 'focuson'),
			'slug'                  => 'js_composer',
			'source'                => get_template_directory() . '/plugins/js_composer.zip',
			'required'              => true,
			'force_activation'      => false,
			'force_deactivation'    => false,
			'external_url'          => ''
		)

	);
}

/**
* Load Visual Composer Compatibility.
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	// Load Visual composer components
	require_once get_template_directory() . '/inc/vc_remove.php';
	require_once get_template_directory() . '/inc/vc_custom_param_types.php';
	require_once get_template_directory() . '/inc/vc_components.php';
	add_filter('vc_shortcodes_css_class', function ($class_string, $tag) {
		$tags_to_clean = [
			'vc_row',
			'vc_column',
			'vc_row_inner',
			'vc_column_inner',
			'vc_col-sm-6',
		];
		if (in_array($tag, $tags_to_clean)) {
			$class_string = str_replace(' wpb_row', '', $class_string);
			$class_string = str_replace(' vc_row-fluid', '', $class_string);
			$class_string = str_replace(' vc_column_container', '', $class_string);
			$class_string = str_replace('wpb_column', '', $class_string);
			// replace vc_, but exclude any custom css
			// attached via vc_custom_XXX (negative lookahead)
			$class_string = preg_replace('/vc_(?!custom)/i', '', $class_string);
			// replace all vc_
			$class_string = preg_replace('/vc_/i', '', $class_string);
		}
		if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
			$class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'vc_span$1', $class_string ); // This will replace "vc_col-sm-%" with "vc_span%"
		}
		$class_string = preg_replace('|col-sm|', 'col-md', $class_string);
		return $class_string;
	}, 10, 2);

	// REMOVE UPDATE NOTICE FOR VISUAL COMPOSER
	add_filter('site_transient_update_plugins', 'remove_update_notifications');
	function remove_update_notifications($value) {
		if ( isset( $value ) && is_object( $value ) ) {
			unset($value->response[ 'js_composer/js_composer.php' ]);
		}
	}
}
