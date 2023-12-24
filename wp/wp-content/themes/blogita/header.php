<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogita
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	 <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
 <script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    googletag.defineSlot('/22961366005/ad_interstitial', [320, 480], 'div-gpt-ad-1702560319218-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script>
<div id="div-gpt-ad-1702560319218-0" style="min-width: 320px; min-height: 480px;">
<script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1702560319218-0'); });
  </script>
  </div>  
	
<script>window.googletag=window.googletag||{cmd:[]};var anchorSlot,staticSlot;googletag.cmd.push(function(){anchorSlot=googletag.defineOutOfPageSlot("/22961366005/BTM_ANCHOR",googletag.enums.OutOfPageFormat.BOTTOM_ANCHOR);if(anchorSlot){anchorSlot.setTargeting('typ',['g']).addService(googletag.pubads());googletag.pubads().addEventListener("slotOnload",function(event){});}googletag.enableServices();});googletag.cmd.push(function(){googletag.display(anchorSlot);});</script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blogita' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="fluid__outer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xxl-12">
						<div class="header__inner">
							<div class="site-branding">
								<?php
								if( has_custom_logo() ): ?>
									<div class="site-logo">
										<?php the_custom_logo(); ?>
									</div>
									<?php
								else:

									if ( is_front_page() && is_home() ) :
										?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php
									else :
										?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php
									endif;
									$blogita_description = get_bloginfo( 'description', 'display' );
									if ( $blogita_description || is_customize_preview() ) :
										?>
										<p class="site-description"><?php echo esc_html( $blogita_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
									<?php endif; ?>
								<?php endif; ?>
							</div><!-- .site-branding -->

							<nav class="main-menu">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'primary-menu',
											'menu_id'        => 'primary_menu',
											'fallback_cb'     => true,
										)
									);
								?>
							</nav>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="mobile-menu">
		<nav id="mobile_menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'menu_id'        => 'primary_menu',
						'fallback_cb'     => true,
					)
				);
			?>
		</nav>
	</div>


	<!-- Search Modal -->
	<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content modal__search">
				<div class="modal-header">
					<h5 class="modal-title" id="searchModalLabel"><?php _e( 'Search Here', 'blogita' ) ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" name="s" id="s" value="<?php echo esc_html( get_search_query() ); ?>" class="form-control">
					</form>
				</div>
			</div>
		</div>
	</div>