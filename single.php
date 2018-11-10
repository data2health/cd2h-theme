<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CD2H_Website
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="breadcrumb my-5 px-0 py-0">
			  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Back to All Posts</a>
			</div>
		<div class="row">
			<div class="col-md-8">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div>
			<div class="col-md-4">
			  <div class="entry-sidebar mx-2 ml-md-4 mr-md-0">
			    <?php dynamic_sidebar('sidebar'); ?>
			  </div>
			</div>

		</div>

		<?php the_post_navigation( array( 'prev_text' => __( 'previous' ), 'next_text' => __( 'next' ), )); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
