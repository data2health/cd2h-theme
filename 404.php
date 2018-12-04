<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CD2H_Website
 */

 $title = 'Oops! That page can’t be found';
 $image = get_option('default_404_image');
 $btn_text = 'Back to Home';
 $btn_url = get_home_url();

get_header();
?>
	<?php if (!empty($image)) {?>
	<style type="text/css">
		.error-404 .hero-slide {
			background-image: url( <?php echo $image; ?>);
		}
	</style>
	<?php } ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found mb-4">
				<header class="page-header sr-only">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cd2h' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<?php echo do_shortcode( '[cd2h_hero_slide image="" title="'. $title . '" btn_text="'. $btn_text . '" btn_url="'. $btn_url . '"][/cd2h_hero_slide]' ); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
