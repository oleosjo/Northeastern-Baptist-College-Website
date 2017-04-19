<?php
/*
Template Name: Front Page
*/
$options = get_option( 'nebc_settings' );

get_header(); ?>

<header id="slider" role="banner">
  <?php echo do_shortcode('[smartslider3 slider=1]'); ?>
</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="front-hero" class="intro" role="main">
  <div class="row large align-middle">
    <div class="small-12 large-expand large-6 columns">

      <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>

    </div>

    <div class="large-expand large-2 columns front-icon">
      <img class='icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Handbook-01.svg" alt="">
      <div class="icon-text">Academically<br> Strong</div>
    </div>

    <div class="large-expand large-2 columns front-icon">
      <img class='icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_WriteCent-01.svg" alt="">
      <div class="icon-text">Biblically<br> Sound</div>
    </div>

    <div class="large-expand large-2 columns front-icon">
      <img class='icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/WebsiteIcon_Library-01.svg" alt="">
      <div class="icon-text">Practically<br> Relevant</div>
    </div>
  </div>


</section>
<?php endwhile;?>
<section id="apply-give-buttons">
  <div class="row large align-middle front-buttons">
    <div class="small-12 columns large-expand text-center">
      <a class="large button uppercase" href="<?php echo $options['front_page_buttons_1']; ?>">Apply</a>
    </div>
    <div class="small-12 columns large-expand text-center">
      <a class="large button uppercase" href="<?php echo $options['front_page_buttons_0']; ?>">Give</a>
    </div>
  </div>
</section>

<!-- <div class="front-box"></div>
<div class="parallax-window">
  <img src="//nebcvt.org/wp/wp-content/uploads/2016/01/WritingArm.png" width="100%" alt="">
</div>

<div class="front-box"></div>
<div class="parallax-window">
  <img src="//nebcvt.org/wp/wp-content/uploads/2016/01/WritingArm.png" width="100%" alt="">
</div>

<div class="front-box"></div>
<div class="parallax-window">
  <img src="//nebcvt.org/wp/wp-content/uploads/2016/01/WritingArm.png" width="100%" alt="">
</div> -->

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer(); ?>
