<?php
/**
 * Register widget areas
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h5>',
	  'after_title' => '</h5>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;

if ( ! function_exists( 'register_blog_sidebar' ) ) :
function register_blog_sidebar() {
  register_sidebar(array(
    'id' => 'blog-sidebar-widgets',
    'name' => __( 'Blog Sidebar Widgets', 'foundationpress' ),
    'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
    'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
    'after_widget' => '</div></article>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
  ));
}

add_action( 'widgets_init', 'register_blog_sidebar' );
endif;
?>
