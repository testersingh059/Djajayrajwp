<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

get_header();
?>

	<main id="primary" class="site-main">
    
    <?php
    if ( true == get_theme_mod( 'blogita_hero_slider_switch', 'on' ) ) :

      $blogita_featured_posts = new WP_Query( array(
        'post_type'      => 'post',
        'meta_key'       => 'featured',
        'meta_value'     => 1,
        'post__not_in'    => get_option( 'sticky_posts' ),
      ));

      if( $blogita_featured_posts->have_posts() ):
        ?>
        <section class="hero__area">
          <div class="swiper hero__slider">
            <div class="swiper-wrapper">
              <?php
              while( $blogita_featured_posts->have_posts() ): $blogita_featured_posts->the_post(); 
                ?>
                <div class="swiper-slide">
                  <?php the_post_thumbnail(); ?>
                  <div class="hero__slider-content">
                    <?php the_category(); ?>
                    <h2 class="hero__slider-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <ul class="hero__slider-meta">
                      <li class="blog__author"><?php the_author_posts_link(); ?></li>
                      <li class="date"><?php echo esc_html( get_the_date( 'jS M, Y' ) ); ?></li>
                    </ul>
                  </div>
                </div>
                <?php
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </section>
        <?php
      endif;

    endif;
    ?>


    <?php
    if( true == get_theme_mod( 'blogita_popular_post_switch', 'on' ) ) :
    
      $blogita_popular_posts = new WP_Query( array(
        'post_type'      => 'post',
        'meta_key'       => 'popular',
        'meta_value'     => 1,
        'post__not_in'   => get_option( 'sticky_posts' ),
      ));

      if( $blogita_popular_posts->have_posts() ):
        ?>
        <section class="popular__area">
          <div class="fluid-outer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xxl-12">
                  <h2 class="section__title">
                    <?php echo esc_html( get_theme_mod( 'blogita_popular_post_section_title', 'Popular Posts' ) ); ?>
                  </h2>
                </div>
                <div class="col-xxl-12">
                  <div class="swiper popular__slider">
                    <div class="swiper-wrapper">
                      <?php
                      while( $blogita_popular_posts->have_posts() ):
                        $blogita_popular_posts->the_post();
                        ?>
                        <div class="swiper-slide">
                          <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                        </div>
                        <?php
                      endwhile;
                      wp_reset_postdata();
                      ?>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php
      endif;
    endif;
    ?>

    <!-- Blog area start -->
    <?php
    if( true == get_theme_mod( 'blogita_recent_post_switch', 'on' ) ) :
      if ( have_posts() ) :
        if ( is_home() && !is_front_page() ):
          ?>
          <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
          </header>
          <?php
        endif;
        ?>
        <section class="blog__area">
          <div class="fluid__outer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-xxl-12">
                  <h2 class="section__title">
                    <?php
                    if( get_theme_mod( 'blogita_recent_post_section_title' ) ) :
                      echo esc_html( get_theme_mod( 'blogita_recent_post_section_title' ) );
                    endif
                    ?>
                  </h2>
                </div>
              </div>
              <div class="row">
                <?php
                while ( have_posts() ) :
                  the_post();
                  ?>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                  </div>
                  <?php
                endwhile;
                ?>
              </div>

              <div class="blog__pagination">
                <?php  
                  the_posts_pagination();
                ?>
              </div>
            </div>
          </div>
        </section>
        <?php 
      else :
        ?>
        <section class="blog__none">
          <div class="container">
            <div class="row">
              <div class="col-xxl-12">
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
              </div>
            </div>
          </div>
        </section>
        <?php
      endif;
    endif;
    ?>
    <!-- Blog area end -->

	</main><!-- #main -->

  
<?php get_footer(); ?>
