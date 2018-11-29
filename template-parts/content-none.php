<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CD2H_Website
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title h3"><?php esc_html_e( 'Nothing Found', 'cd2h' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cd2h' ); ?></p>
			<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cd2h' ); ?></p>
			<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
