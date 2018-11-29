<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CD2H_Website
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="blog-container mb-4">
				<div class="blog-container-inner">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="h3 page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'cd2h' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'media' );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
		</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
