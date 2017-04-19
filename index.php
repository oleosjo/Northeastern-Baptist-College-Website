<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
 <div class="row align-middle page-header">
  <div class="large-offset-4 columns">
    <h3 class="entry-title uppercase no-margin">NEBC News</h3>
  </div>
 </div>
 <div class="page-divider">
  <div class="row">
    <div class="large-offset-4 columns breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
      <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
    </div>
  </div>
 </div>
<div id="page" role="main">
	<aside class="sidebar show-for-large">
		<?php do_action( 'foundationpress_before_sidebar' ); ?>
	  	<?php dynamic_sidebar( 'blog-sidebar-widgets' ); ?>
		<?php do_action( 'foundationpress_after_sidebar' ); ?>
	</aside>
	<article class="main-content">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php } ?>

	</article>

</div>

<?php get_footer(); ?>
