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
<div id="page" role="main">

<aside class="sidebar show-for-large">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
  	<?php dynamic_sidebar( 'blog-sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content blogpost-entry') ?> id="post-<?php the_ID(); ?>">
		<header>
			<?php foundationpress_entry_meta(); ?>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">

		<?php if ( has_post_thumbnail() ) : ?>

					<?php the_post_thumbnail( '', array('class' => 'th') ); ?>

		<?php endif; ?>

		<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer(); ?>
