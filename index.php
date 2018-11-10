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
			<?php echo do_shortcode( '[cd2h_hero_slide image="'.$image .'" title="'. $title . '" btn_text="" btn_url=""]'. $the_content .'[/cd2h_hero_slide]' ); ?>
			<?php echo do_shortcode( '[cd2h_padding_block]' ); ?>

			<div class="posts-container">
				<div class="posts-container-inner">

				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
