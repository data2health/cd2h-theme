<?php
/**
 * Template part for displaying post in a media stle format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CD2H_Website
 */

 $post_ID = get_the_ID();
 $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_ID), 'large');

 $classes = array(
   'media',
   'd-block',
   'd-md-flex',
 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
  <div class="media-image mr-md-4 mb-3">
    <img class="sr-only image-full" src="<?php echo $image[0]; ?>" alt="">
  </div>
  <div class="media-body">
  	<header class="entry-header">
  		<?php
  			the_title( '<h2 class="entry-title h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

  		if ( 'post' === get_post_type() ) :
  			?>
  			<div class="entry-meta">

  			</div><!-- .entry-meta -->
  		<?php endif; ?>
  	</header><!-- .entry-header -->


  	<div class="entry-content">
  		<?php the_excerpt(); ?>
  	</div><!-- .entry-content -->

  	<footer class="entry-footer">
  		<?php cd2h_entry_footer(); ?>
  	</footer><!-- .entry-footer -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
