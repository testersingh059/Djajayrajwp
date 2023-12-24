<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="blog__detail-title"><?php the_title(); ?></h2>
	<ul class="blog__detail-meta">
		<li class="blog__author"><i class="fa-solid fa-user"></i> <?php the_author_posts_link(); ?></li>
		<li class="blog__category"> <?php the_category(" , "); ?> </li>
		<li class="blog__date"><i class="fa-solid fa-calendar-days"></i> <?php the_date(); ?></li>

	</ul>
	

	<div class="blog__detail-thumb">
		<?php get_template_part( 'template-parts/post', get_post_format() ); ?>
	</div>

	<div class="blog__detail-content default__style">
		<?php the_content(); ?>
	</div>
	
	<section class="post-content--bottom">
  <div class="section-title">
  <p>Similar Stories</p>
  </div>
  <div class="related-posts">
    <?php
      $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
        if( $related ) foreach( $related as $post ) {
        setup_postdata($post); ?>
          <ul> 
            <li>
              <a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail(array(150,100)); ?>
              </a>
              <h3>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                  <?php the_title(); ?>
                </a>
              </h3>
            </li><!-- .related-posts--item -->
          </ul>   
        <?php }
    wp_reset_postdata(); ?>
  </div> <!--.related-posts-->
</section><!-- .post-content--bottom -->
	
	<div class="share_btns">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank" class="fb">Share on Facebook</a>
		<a href="https://twitter.com/share?url=<?php the_permalink();?>" target="_blank" class="tw">Share on <strong>X</strong></a>
	</div>
	<?php
$prev_post = get_adjacent_post(false, '', true);
if(!empty($prev_post)) { ?>
	        <script>function isNearBottom(){return window.innerHeight+window.scrollY>=document.body.offsetHeight-10}window.onscroll=function(){isNearBottom()&&(window.location.href="<?php echo get_permalink($prev_post->ID); ?>")};</script>
<?php } ?>
</article>
