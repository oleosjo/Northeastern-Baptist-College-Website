<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>

		<div id="footer-container">
			<footer id="footer" class="row align-center">
				<div class="small-12 shrink columns align-top">
					<img class="nebc-seal" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/NEBCSeal-01.svg" style="height:150px"  alt="">
				</div>
				<div class="small-12 shrink columns">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/NEBC_InitialLogo-01.svg" style="width:125px"  alt="">
					<p class="address">
						PO BOX 4600 <br>
						104 Kocher Drive <br>
						Bennington, VT <br>
						05201 <br>
						<br>
						(802) 753 - 7233
					</p>
				</div>
				<div class="small-12 large-offset-1 shrink columns">
					<h5>Quick Links</h5>
					<?php footer_menu_1(); ?>
				</div>
				<div class="small-12 large-offset-1 shrink columns">
					<h5>Information For</h5>
					<?php footer_menu_2(); ?>
				</div>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</div>

</body>
</html>
