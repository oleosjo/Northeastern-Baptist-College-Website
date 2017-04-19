<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
 <div class="row align-middle page-header">
  <div class="large-offset-4 columns">
    <h3 class="entry-title uppercase no-margin">Faculty &amp; Staff</h3>
  </div>
 </div>
 <div class="page-divider">
  <div class="row">
    <div class="large-offset-4 columns breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
      <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
    </div>
  </div>
 </div>
<div id="page" class="faculty-staff" role="main">

<aside class="sidebar show-for-large">
  <?php do_action( 'foundationpress_before_sidebar' ); ?>
    <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
  <?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php do_action( 'foundationpress_post_before_entry_content' ); ?>
    <div class="entry-content">
    <div class="row">
      <div class="medium-3 columns profile-pic">
          <img src="<?php the_field('photo'); ?>">
      </div>
      <div class="medium-9 columns">
        <div><strong><?php the_title(); ?></strong></div>
        <div><?php the_field('title'); ?></div>
        <p>&nbsp;</p>


        <div>
          <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a> &nbsp;

          <?php if(get_field('facebook_link')): ?>
            <a href="<?php the_field('facebook_link'); ?>"><i class="fa fa-facebook-official"></i></a>&nbsp;
          <?php endif; ?>
          <?php if(get_field('twitter_link')): ?>
            <a href="<?php the_field('twitter_link'); ?>"><i class="fa fa-twitter-square"></i></a>&nbsp;
          <?php endif; ?>
          <?php if(get_field('instagram_link')): ?>
            <a href="<?php the_field('instagram_link'); ?>"><i class="fa fa-instagram"></i></a>&nbsp;
          <?php endif; ?>
        </div>
        <p></p>
        <?php if(get_field('curriculum_vitae')): ?>
          <div>
            <a class="button uppercase" href="<?php the_field('curriculum_vitae'); ?>">curriculum vitae</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <p></p>
    <div class="row">
      <div class="small-12 columns">
        <?php the_content(); ?>
      </div>
    </div>

    </div>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer(); ?>
