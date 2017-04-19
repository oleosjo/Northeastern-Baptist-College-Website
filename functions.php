<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

// disable the admin bar
show_admin_bar(false);


function inlineSVG($filename) {
  echo "<div class=\"inline-svg\">".file_get_contents(get_template_directory_uri().'/'.$filename)."</div>";
}

function getfile($filename) {
  echo file_get_contents(get_template_directory_uri().'/'.$filename);
}


/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function faculty_staff_init() {
    $labels = array(
        'name'                  => _x( 'Faculty & Staff', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Faculty or Staff', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Faculty & Staff', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Faculty or Staff', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Faculty or Staff', 'textdomain' ),
        'new_item'              => __( 'New Faculty or Staff', 'textdomain' ),
        'edit_item'             => __( 'Edit Faculty or Staff', 'textdomain' ),
        'view_item'             => __( 'View Faculty or Staff', 'textdomain' ),
        'all_items'             => __( 'All Faculty & Staff', 'textdomain' ),
        'search_items'          => __( 'Search Faculty & Staff', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Faculty & Staff:', 'textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faculty-staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'tags', 'editor' ),
        'taxonomies'         => array('post_tag')
    );

    register_post_type( 'faculty-staff', $args );
}

add_action( 'init', 'faculty_staff_init' );


// Register Options Page


add_action( 'admin_menu', 'nebc_add_admin_menu' );
add_action( 'admin_init', 'nebc_settings_init' );


function nebc_add_admin_menu(  ) {

    add_options_page( 'NEBC', 'NEBC', 'manage_options', 'nebc', 'nebc_options_page' );

}


function nebc_settings_init(  ) {

    register_setting( 'pluginPage', 'nebc_settings' );

    add_settings_section(
        'nebc_pluginPage_section',
        __( 'Links', 'wordpress' ),
        'nebc_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'student_portal_link_0',
        __( 'Populi', 'wordpress' ),
        'student_portal_link_0_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'student_portal_link_1',
        __( 'Calendar', 'wordpress' ),
        'student_portal_link_1_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'student_portal_link_2',
        __( 'Online Payments', 'wordpress' ),
        'student_portal_link_2_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'student_portal_link_3',
        __( 'Library', 'wordpress' ),
        'student_portal_link_3_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'student_portal_link_4',
        __( 'Writing Center', 'wordpress' ),
        'student_portal_link_4_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'student_portal_link_5',
        __( 'Student Handbook', 'wordpress' ),
        'student_portal_link_5_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'front_page_buttons_0',
        __( 'Give Button', 'wordpress' ),
        'front_page_buttons_0_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );

    add_settings_field(
        'front_page_buttons_1',
        __( 'Apply Button', 'wordpress' ),
        'front_page_buttons_1_render',
        'pluginPage',
        'nebc_pluginPage_section'
    );


}


function student_portal_link_0_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_0]' value='<?php echo $options['student_portal_link_0']; ?>'>
    <?php

}


function student_portal_link_1_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_1]' value='<?php echo $options['student_portal_link_1']; ?>'>
    <?php

}


function student_portal_link_2_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_2]' value='<?php echo $options['student_portal_link_2']; ?>'>
    <?php

}


function student_portal_link_3_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_3]' value='<?php echo $options['student_portal_link_3']; ?>'>
    <?php

}


function student_portal_link_4_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_4]' value='<?php echo $options['student_portal_link_4']; ?>'>
    <?php

}


function student_portal_link_5_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[student_portal_link_5]' value='<?php echo $options['student_portal_link_5']; ?>'>
    <?php

}

function front_page_buttons_0_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[front_page_buttons_0]' value='<?php echo $options['front_page_buttons_0']; ?>'>
    <?php

}

function front_page_buttons_1_render(  ) {

    $options = get_option( 'nebc_settings' );
    ?>
    <input type='text' name='nebc_settings[front_page_buttons_1]' value='<?php echo $options['front_page_buttons_1']; ?>'>
    <?php

}

function nebc_settings_section_callback(  ) {

    echo __( '', 'wordpress' );

}


function nebc_options_page(  ) {

    ?>
    <form action='options.php' method='post'>

        <h2>NEBC</h2>

        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>

    </form>
    <?php

}