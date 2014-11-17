<?php
add_action( 'after_setup_theme', 'ashdown_setup' );
function ashdown_setup()
{
load_theme_textdomain( 'ashdown', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'ashdown' ) )
);
}

// Register some javascript files, because otherwise the world will probably end. Using modernizr development version, remember to strip it out for a minified production version or just get rid of it. All js plugins and scripts are boiled down into the one file called scripts-min.js... codekit does it. 

function ashdown_load_javascript_files() {
	wp_register_script( 'modernizr', get_stylesheet_directory_uri().'/js/modernizr-latest.js', '2.8.3', false );
	wp_register_script( 'scripts', get_stylesheet_directory_uri().'/js/scripts-min.js', array('jquery'), '1.0.0', true );
	
		wp_enqueue_script('modernizr');
		wp_enqueue_script('scripts');

}
add_action( 'wp_enqueue_scripts', 'ashdown_load_javascript_files' );


add_filter( 'the_title', 'ashdown_title' );
function ashdown_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'ashdown_filter_wp_title' );
function ashdown_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}


// This add first and last classes to the menu which is fucking handy, but, if you dislike fucking handy stuff just remove it. Oh but, it only works on menus you build in the menu manager, just a default wordpress pages menu wont show a damn thing!
add_filter( 'wp_nav_menu_objects', 'tgm_filter_menu_class', 10, 2 );
/**
 * Filters the first and last nav menu objects in your menus
 * to add custom classes.
 *
 * This also supports nested menus.
 *
 * @since 1.0.0
 *
 * @param array $objects An array of nav menu objects
 * @param object $args Nav menu object args
 * @return object $objects Amended array of nav menu objects with new class
 */
function tgm_filter_menu_class( $objects, $args ) {
	
	// Only apply the classes to the primary navigation menu because it fucks up widget menus
    if ( isset( $args->theme_location ) )
        if ( 'main-menu' !== $args->theme_location )
            return $objects;
 
    // Add first/last classes to nested menu items
    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {
        // If there is no menu item parent, store the ID and skip over the object
        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        // Add first item class to nested menus
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        // If we have just added the first menu item class, skip over adding the ID
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        // Store the menu parent IDs in an array
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    // Remove any duplicate values and pull out the last menu item
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    // Loop through the IDs and add the last menu item class to the appropriate objects
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    // Finish it off by adding classes to the top level menu items
    $objects[1]->classes[] = 'first-menu-item'; // We can be assured 1 will be the first item in the menu :-)
    $key = array_keys( $top_ids );
	$end = end($key);
	$objects[$end]->classes[] = 'last-menu-item';
 
    // Return the menu objects
    return $objects;
 
}


add_action( 'widgets_init', 'ashdown_widgets_init' );
function ashdown_widgets_init()
{
// The two sidebar widgets
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'ashdown' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

register_sidebar( array (
'name' => __( 'Sidebar Widget Area Below', 'ashdown' ),
'id' => 'secondary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

// The four footer widgets
register_sidebar( array (
'name' => __( 'Footer One', 'ashdown' ),
'id' => 'footer-one',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h4 class="widget-title footer-widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array (
'name' => __( 'Footer Two', 'ashdown' ),
'id' => 'footer-two',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h4 class="widget-title footer-widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array (
'name' => __( 'Footer Three', 'ashdown' ),
'id' => 'footer-three',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h4 class="widget-title footer-widget-title">',
'after_title' => '</h4>',
) );
register_sidebar( array (
'name' => __( 'Footer Four', 'ashdown' ),
'id' => 'footer-four',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h4 class="widget-title footer-widget-title">',
'after_title' => '</h4>',
) );

}

/* added HTML5 placeholders for each default field */


// This function turns the comments form into a more HTML5 form. 
function my_update_fields($fields) {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields['author'] = 
		'<p class="comment-form-author">
			<label for="author" class="hide">Name <span class="required">*</span></label>
			<input required minlength="3" maxlength="30" placeholder="Your Name*" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' />
    	</p>';

    $fields['email'] = 
    	'<p class="comment-form-email">
    		<label for="email" class="hide">Email <span class="required">*</span></label>
    		<input required placeholder="Your Email*" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' />
    	</p>';

	$fields['url'] = 
		'<p class="comment-form-url">
			<label for="url" class="hide">Website</label>
			<input placeholder="Your URL" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" />
    	</p>';

	return $fields;
}

add_filter('comment_form_default_fields','my_update_fields');

function my_update_comment_field($comment_field) {

	$comment_field = 
		'<p class="comment-form-comment">
			<label for="comment" class="hide">Comment</label>
			<textarea required placeholder="Enter Your Comment…" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</p>';

	return $comment_field;
}
add_filter('comment_form_field_comment','my_update_comment_field');



// Enable HTML5 in the search form
add_theme_support( 'html5', array( 'search-form' ) );


// Advanced Custom Fields options page...useful if you use acf
/*
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Website Settings');

}
*/


/* Custome excerpt length */
function ashdown_excerpt_length( $length ) {
    return 47;
}
add_filter( 'excerpt_length', 'ashdown_excerpt_length', 999 );

// Changing the default [...] at the end of the excerpt to a read more link
function ashdown_excerpt_more( $more ) {
    return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'ashdown_excerpt_more' );


// Custom Image Sizes if needed
// add_image_size( 'slides', 1660, 230, true );