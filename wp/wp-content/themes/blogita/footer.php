<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogita
 */

?>

	<footer class="site-footer footer__area">
		<div class="fluid__outer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
						<div class="footer__logo">
							<?php
							if( has_custom_logo() ):
								the_custom_logo();
							else: ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
								<p><?php bloginfo( 'description' ); ?></p>
								<?php
							endif;
							
							if( get_theme_mod( 'blogita_footer_after_logo_text', true ) == true ) :
								?>
								<p><?php
								if( get_theme_mod( 'blogita_footer_after_logo_text' ) ) :
									echo esc_html( get_theme_mod( 'blogita_footer_after_logo_text' ) ); 
								endif;
								?></p>
								<?php
							endif;
							?>
						</div>
					</div>
				


				<?php
				if( get_theme_mod( 'blogita_footer_copyright_text' ) ) :
					?>
					<div class="row">
						<div class="xxl-12">
							<div class="copyright">
								<?php echo wp_kses_post( get_theme_mod( 'blogita_footer_copyright_text', true ) ); ?>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</footer>

	<!-- Go To Top -->
	<a href="#" id="scroll_top" class="scroll__top" title="Go to top"><i class="fa-solid fa-arrow-up"></i></a>
</div>

<?php wp_footer(); ?>

</body>
</html>
