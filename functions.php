<?php
add_action( 'after_setup_theme', 'ashdown_setup' );
function ashdown_setup()
{
load_theme_textdomain( 'ashdown', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'ashdown' ) )
);
}
// Load jQuery
// you can either load the local or google CDN version below by commenting out one or another wp_register_script line function


    function ashdown_jquery_method() {
        if (!is_admin()) {

            wp_deregister_script( 'jquery' );

            // local copy of jquery
            wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js"');

            // google CDN copy of jquery
            //wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
            
            wp_enqueue_script( 'jquery' );
        }
    } 
    add_action('init', 'ashdown_jquery_method');

add_action( 'wp_enqueue_scripts', 'ashdown_load_javascript_files' );
 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
 
function ashdown_load_javascript_files() {
	wp_register_script( 'modernizr', get_stylesheet_directory_uri().'/js/modernizr-2.6.2.min-ck.js', '2.6.2', false );
	wp_register_script( 'scripts', get_stylesheet_directory_uri().'/js/script-ck.js', array('jquery'), '1.0.0', true );
	
		wp_enqueue_script('modernizr');
		wp_enqueue_script('scripts');

}


add_action( 'comment_form_before', 'ashdown_enqueue_comment_reply_script' );
function ashdown_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
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
add_action( 'widgets_init', 'ashdown_widgets_init' );
function ashdown_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'ashdown' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function ashdown_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'ashdown_comments_number' );
function ashdown_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}