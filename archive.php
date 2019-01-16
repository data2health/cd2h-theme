<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CD2H_Website
 */

 $post_id = get_option( 'page_for_posts' );
 $title = get_the_title($post_id);
 $the_content = apply_filters('the_content', get_post_field('post_content', $post_id));
 $image = get_post_thumbnail_id($post_id);

 $archive_category = get_queried_object();


get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<header class="page-header sr-only">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php //echo do_shortcode( '[cd2h_hero_slide image="'.$image .'" title="'. $title . '" btn_text="" btn_url=""]'. $the_content .'[/cd2h_hero_slide]' ); ?>

			<div class="blog-container mb-4">
				<div class="blog-container-inner">

					<ul class="cat-list list-inline text-center mb-3 mb-md-5">
						<?php $parent_categories = get_categories( array(
							    'orderby' => 'name',
							    'order'   => 'ASC',
									'hide_empty' => false,
                  'parent' => 0,
							) );
							foreach( $parent_categories as $parent_category ) {
							    $category_link = sprintf(
							        '<a href="%1$s" alt="%2$s">%3$s</a>',
							        esc_url( get_category_link( $parent_category->term_id ) ),
							        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $parent_category->name ) ),
							        esc_html( $parent_category->name )
							    );
									if ($parent_category->term_id == $archive_category->term_id) { $activeClass= 'active'; } else { $activeClass = ''; }
							    echo '<li class="list-inline-item mx-3 my-2 my-md-0'.$activeClass.'">' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link );

                  $child_categories = get_categories( array(
      							    'orderby' => 'name',
      							    'order'   => 'ASC',
      									'hide_empty' => false,
                        'parent' => $parent_category->term_id,
      							) );
                  if(!empty($child_categories)){
                    echo '<ul class="cat-list child-cat-list>"';
                    foreach( $child_categories as $category ) {
                      $category_link = sprintf(
    							        '<a href="%1$s" alt="%2$s">%3$s</a>',
    							        esc_url( get_category_link( $category->term_id ) ),
    							        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
    							        esc_html( $category->name )
    							    );
    									if ($category->term_id == $archive_category->term_id) { $activeClass= 'active'; } else { $activeClass = ''; }
    							    echo '<li class="list-inline-item mx-3 my-2 my-md-0'.$activeClass.'">' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li>';
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
