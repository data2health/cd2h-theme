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
 * @package CD2H_Website
 */

$post_id = get_option( 'page_for_posts' );

$title = get_the_title($post_id);
$the_content = apply_filters('the_content', get_post_field('post_content', $post_id));
$image = get_post_thumbnail_id($post_id);

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="blog-container mb-4">
				<?php echo do_shortcode( '[cd2h_headline title="'. $title . '" format="headline h1"  extra_classes="mb-5 text-center"]' ); ?>
				<div class="blog-container-inner">
          <ul class="cat-list list-unstyled text-left mb-3 mb-md-5 text-center row">
						<?php $parent_categories = get_categories( array(
							    'orderby' => 'term_order',
							    'order'   => 'ASC',
									'hide_empty' => false,
                  'parent' => 0,
							) );
							foreach( $parent_categories as $parent_category ) {
							    $category_link = sprintf(
							        '<a class="font-weight-bold px-md-3 pb-2" href="%1$s" alt="%2$s">%3$s</a>',
							        esc_url( get_category_link( $parent_category->term_id ) ),
							        esc_attr( sprintf( __( 'View all posts in %s', 'cd2h' ), $parent_category->name ) ),
							        esc_html( $parent_category->name )
							    );
							    echo '<li class="my-2 my-md-4 col-md-4">' . sprintf( esc_html__( '%s', 'cd2h' ), $category_link );

                  $child_categories = get_categories( array(
      							    'orderby' => 'term_order',
      							    'order'   => 'ASC',
      									'hide_empty' => false,
                        'parent' => $parent_category->term_id,
      							) );
                  if(!empty($child_categories)){
                    echo '<ul class="cat-list child-cat-list list-unstyled mt-3">';
                    foreach( $child_categories as $category ) {
                      $category_link = sprintf(
    							        '<a href="%1$s" alt="%2$s">%3$s</a>',
    							        esc_url( get_category_link( $category->term_id ) ),
    							        esc_attr( sprintf( __( 'View all posts in %s', 'cd2h' ), $category->name ) ),
    							        esc_html( $category->name )
    							    );
    							    echo '<li class="my-2 my-md-2">' . sprintf( esc_html__( '%s', 'cd2h' ), $category_link ) . '</li>';
                    }
                    echo '</ul>';
                  }

                  echo '</li> ';


							} ?>
					</ul>

					<?php if ( have_posts() ) : ?>
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'media' );
						endwhile;
						the_posts_navigation();
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
