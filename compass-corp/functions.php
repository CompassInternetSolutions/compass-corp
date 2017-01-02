<?php
/**
 * Run Theme Setup after 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'compass_setup' );

if ( !function_exists( 'compass_setup' ) ) {
	function compass_setup() {
	
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
	
		// This theme uses wp_nav_menu()
		register_nav_menus( array(
			'primary' => 'Primary Navigation',
			'leftsidebar' => 'Sidebar Services Navigation',
			'footersitemap' => 'Footer Sitemap Navigation',
		) );
	}
}

/**
 * Compass Options Page
 */
/* Initialize the options page */
	require_once ( get_template_directory() . '/include/theme-options.php' );
	
/* Make Compass Options available through the theme */
function get_compass($field) {
	
	$options = get_option('compass_theme_options');
	
	$get_option = $options["$field"];
	
	return $get_option;
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function compass_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'compass_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 */
function compass_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'compass_excerpt_length' );

/* custom excerpt length */
function excerpt($excerpt_length) {
	global $post;
		$content = $post->post_content;
		$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '');
		$content = implode(' ', $words);
	endif;

	$content = strip_tags($content);

	echo $content;
}

/**
 * Returns a "Continue Reading" link for excerpts
 */
function compass_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . 'Read more' . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
 */
function compass_auto_excerpt_more( $more ) {
	return ' &hellip;' . compass_continue_reading_link();
}
add_filter( 'excerpt_more', 'compass_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function compass_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= compass_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'compass_custom_excerpt_more' );

/**
 * Register widgetized areas
 */
function compass_widgets_init() {
	// Left Sidebar Contact Us Area.
	register_sidebar( array(
		'name' => 'Left Widget Area',
		'id' => 'left-widget-area',
		'description' => 'The Left widget area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
	// Left Sidebar Contact Us Area.
	register_sidebar( array(
		'name' => 'Left Widget Area Spain',
		'id' => 'left-widget-area-spain',
		'description' => 'The Left widget area spain',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
// Left Sidebar Contact Us Area.
	register_sidebar( array(
		'name' => 'Left Widget Area Houston',
		'id' => 'left-widget-area-houston',
		'description' => 'The Left widget area houston',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
	// Left Sidebar Locations Area
	register_sidebar( array(
		'name' => 'Locations Widget Area',
		'id' => 'locations-widget-area',
		'description' => 'The locations widget area',
		'before_widget' => '',
		'after_widget' => '</div><!-- #locations -->',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p><div id="locations">',
	) );
	// Footer - Links Area.
	register_sidebar( array(
		'name' => 'Footer Links Widget Area',
		'id' => 'footer-links',
		'description' => 'The footer links widget area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<p class="f-title">',
		'after_title' => '</p>',
	) );
	// Footer - Social Area.
	register_sidebar( array(
		'name' => 'Social Links Widget Area',
		'id' => 'footer-social',
		'description' => 'The footer social media widget area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );	
	register_sidebar( array(		'name' => 'Footer Cities Dallas',		'id' => 'footer-links-dallas',		'description' => 'Footer Cities Dallas',		'before_widget' => '',		'after_widget' => '',		'before_title' => '<p class="f-title">',		'after_title' => '</p>',	) );	
	register_sidebar( array(		'name' => 'Footer Cities Houston',		'id' => 'footer-links-houston',		'description' => 'Footer Cities Houston',		'before_widget' => '',		'after_widget' => '',		'before_title' => '<p class="f-title">',		'after_title' => '</p>',	) );
	register_sidebar( array(		'name' => 'Footer Cities Fort Worth ',	'id' => 'footer-links-fortworth',		'description' => 'Footer Cities Fort Worth',		'before_widget' => '',		'after_widget' => '',		'before_title' => '<p class="f-title">',		'after_title' => '</p>',	) );
}
// Register sidebars by running twentyten_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'compass_widgets_init' );

// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

function twitterCard(){
    //this returns the post dynamic description or a default value
    $my_excerpt = apply_filters(remove_filter('the_excerpt', 'wpautop'), get_post_field('post_excerpt', $post_id));
    if(!empty ($my_excerpt)) : //if the excerpt is not empty it'll return what ever we wrote in it
    else : $my_excerpt = get_bloginfo('description');//else it'll return this default value
    endif;
    //this returns the post dynamic thumbnil or a default value
    $my_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
    //check if thumbnail is empty - if yes it'll return a default value
    if(empty($my_thumbnail)) : $url = $my_thumbnail = 'http://dlocksmith.com/wp-content/uploads/slide-pic-2.jpg';
    // if we do have thumnale, this is the value that will out come
    else : $url = $my_thumbnail['0'];
    endif;
    
   
    $twitter = array(
    "twitterCard"           => "summary_large_image",//type of twitter card
    "twitterUsername"       => "@deltalocksmith",//twitter user name   
    "twitterTitle"          =>  get_the_title(), //twitt title (take from page)
    "twitterDescription"    => $my_excerpt, //twitt desc -> the excerpt   
    "twitterImageSrc"       => $url//img src
    );
    return $twitter;
}/* end twitter card*/