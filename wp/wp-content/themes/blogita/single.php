<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blogita
 */

get_header();
?>

	<?php 
		if( !is_active_sidebar( 'blog-sidebar' ) ):
			$blogita_layout = "col-xxl-12";
			$blogita_container = "container";
		else:
			$blogita_layout = "col-xxl-8 col-xl-8 col-lg-8";
			$blogita_container = "container-fulid";
		endif;
	?>

	<main id="primary" class="site-main">

		<section class="blog__detail">
			<div class="fluid__outer">
				<div class="<?php echo esc_html( $blogita_container ); ?>">
					<div class="row">
						<div class="<?php echo esc_html( $blogita_layout ); ?>">
							<?php
								while ( have_posts() ) :
									the_post(); ?>
										<div class="blog__detail-wrapper">
											<?php get_template_part( 'template-parts/content', 'single' ); ?>
										</div>
										<?php
									
								endwhile; // End of the loop.
							?>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- Blog detail end -->

	</main><!-- #main -->
