<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 * Template Name: Faculty & Staff
 */

$type = 'faculty-staff';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => -1);

$faculty_staff = null;
$faculty_staff = new WP_Query($args);

 get_header(); ?>

 <div class="row align-middle page-header">
  <div class="large-offset-4 columns">
    <h3 class="entry-title uppercase no-margin"><?php the_title(); ?></h3>
  </div>
 </div>
 <div class="page-divider">
  <div class="row">
    <div class="large-offset-4 columns breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
      <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
    </div>
  </div>
 </div>

 <section id="page" role="main">
 <?php get_sidebar(); ?>

 <?php do_action( 'foundationpress_before_content' ); ?>
 <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
 <?php do_action( 'foundationpress_page_before_entry_content' ); ?>

 <div class="row">
   <div class="large-6 columns">
    <div class="button-group filter-button-group filter-options">
      VIEW:
      <button data-filter=".faculty">Faculty</button> |
      <button data-filter=".staff">Staff</button> |
      <button data-filter="*">ALL</button>
    </div>
    </div>
   <div class="large-6 columns">
    <input type="text" id="filter-faculty-staff" placeholder="Filter by name...">
   </div>
 </div>

 <div class="faculty-staff-boxes">
 <?php while ( $faculty_staff->have_posts() ) : $faculty_staff->the_post(); ?>
      <?php
        $posttags = get_the_tags();
        $tagnames = "";
        if ($posttags) {
          foreach($posttags as $tag) {
            $tagnames .= $tag->name . ' ';
          }
        }
      ?>
      <div class="contact-box <?php echo $tagnames ?>" data-order="<?php the_field('order'); ?>">
        <div class="inner">
          <div class="photo">
              <img src="<?php the_field('photo'); ?>">
          </div>
          <div class="info">
            <div class="uppercase name"><?php the_title(); ?></div>
            <p class="title"><?php the_field('title'); ?></p>
            <div class="email"><?php the_field('email'); ?></div>
            <p>&nbsp;</p>
            <a class="small secondary button pull-right" href="<?php echo get_permalink(); ?>">VIEW INFO</a>
          </div>
        </div>
    </div>
 <?php endwhile; wp_reset_query(); ?>
 </div>
   <footer>
       <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
       <p><?php the_tags(); ?></p>
   </footer>
 </article>

 <?php do_action( 'foundationpress_after_content' ); ?>

 </section>

 <?php get_footer(); ?>
