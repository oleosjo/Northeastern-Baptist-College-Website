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
 * Template Name: Page with Box
 */

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
 <?php while ( have_posts() ) : the_post(); ?>
   <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
       <?php get_template_part( 'parts/featured-image' ); ?>
       <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
       <div class="row">
         <div class="entry-content medium-9 columns">
             <?php the_content(); ?>
         </div>
         <div class="medium-expand columns grey-box">
            <?php the_field('box_content'); ?>
         </div>
       </div>
       <footer>
         <p>
            <?php echo '<time class="updated pull-right" datetime="'. get_the_time( 'c' ) .'"><small class="muted">'. sprintf( __( 'Last updated on %s', 'foundationpress' ), get_the_date() ) .'</small></time>'; ?>
          </p>
       </footer>
       <?php do_action( 'foundationpress_page_before_comments' ); ?>
       <?php comments_template(); ?>
       <?php do_action( 'foundationpress_page_after_comments' ); ?>
   </article>
 <?php endwhile;?>

 <?php do_action( 'foundationpress_after_content' ); ?>

 </section>


 <?php get_footer(); ?>
