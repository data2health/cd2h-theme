<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wildern
 */

  $newsletter_url = get_option('newsletter_url');
?>
	</div><!-- container end -->
		<footer class="site-footer">
			<div class="newsletter-footer">
        <div class="container">
          <div class="row py-4 justify-content-md-center align-items-center">
  					<div class="col-lg-7 text-center align-self-center">
  						<p class="mb-3 mb-lg-0">Stay up to date with new research and programs through CD2H</p>
  					</div>
  					<div class="col-lg-4 text-center">
  						<a class="btn btn-block btn-primary btn-white" href="<?php echo $newsletter_url; ?>">Subscribe to Our Newsletter</a>
  					</div>
  				</div>
        </div>
			</div>

			<div class="site-footer-inner container">
				<div class="logo-footer row no-gutters justify-content-center py-3 py-md-5">
					<?php dynamic_sidebar('footer-logo'); ?>
				</div>
				<?php wp_nav_menu( array(
					'menu'    => 'footer menu',
					'depth'             => 1,
					'container'         => 'ul',
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => 'flex-column flex-sm-row nav pt-4 pb-3 justify-content-center',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) ); ?>

        <div class="social text-center pb-3">
          <a href="https://twitter.com/data2health?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow @data2health</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

				<div class="row">
					<div class="col-12 text-center pt-3 pb-3">
					<p>If you have problems viewing PDF files, download the latest version of Adobe Reader <a href="http://get.adobe.com/reader/" title="Visit to download Adobe Reader" target="_blank">Adobe Reader <i class="fa fa-external-link-alt" aria-hidden="true"></i></a></p>
					<p>For <a href="http://edi.nih.gov/consulting/language-access-program/about" target="_blank" title="Read the plan">language access <i class="fa fa-external-link-alt" aria-hidden="true"></i></a> assistance, contact the <a href="mailto:info@ncats.nih.gov" title="Email Public Information Officer">NCATS Public Information Officer <i class="far fa-envelope" aria-hidden="true"></i></a></p>

					<p class="copyright mt-5">National Center for Advancing Translational Sciences (NCATS), 6701 Democracy Boulevard, Bethesda MD 20892-4874 • 301-594-8966</p>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->

	</div><!-- #page we need this extra closing tag here -->

	<?php wp_footer(); ?>

	<?php //force external links to open in a new window ?>
	<script>jQuery(document.links).filter(function() { return this.hostname != window.location.hostname; }).attr('target', '_blank');</script>

	<?php //Scroll Sneak script ?>
	<script type="text/javascript"> jQuery(document).ready(function(){ var sneaky = new ScrollSneak(location.hostname); jQuery('#collapse-nav a, #collapse-archive a, #calendar a').each(function(){ this.onclick = sneaky.sneak; }); }); </script>

	<script>
		jQuery(document).ready(function(){
			jQuery('#calendar a div').show();
		  jQuery('#calendar').slick({
			centerMode: false,
			slidesToShow: 8,
		  slidesToScroll: 8,
			appendArrows:'#calendar-wrapper',
			prevArrow:'<div class="col-1 text-center pt-4 display-4"><i class="fas fa-caret-left"></i></div>',
			nextArrow:'<div class="col-1 text-center pt-4 display-4"><i class="fas fa-caret-right"></i></div>',
			responsive: [
				{ breakpoint: 576, settings: { slidesToShow: 3, slidesToScroll: 3 } },
				{ breakpoint: 768, settings: { slidesToShow: 4, slidesToScroll: 4 } },
				{ breakpoint: 992, settings: { slidesToShow: 6, slidesToScroll: 6 } },
				{ breakpoint: 1200, settings: { slidesToShow: 8, slidesToScroll: 8 } }
			]
		});
		<?php if (is_single()) : ?>
			var index = jQuery('.slick-slide').has("div#slide-post-<?php echo get_the_id(); ?>").data("slick-index");
			jQuery('#calendar').slick('slickGoTo', index, true);
			jQuery('.slick-slide').has("div#slide-post-<?php echo get_the_id(); ?>").addClass('current-page-slide');
		<?php endif; ?>
		});
		jQuery('.nav li.dropdown').hover(function() {
			jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
			}, function() {
			jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
</body>

</html>
