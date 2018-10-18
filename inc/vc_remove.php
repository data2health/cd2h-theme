<?php

// Remove Visual Composer CSS.
function cd2h_dequeue_vc() {
    wp_deregister_style('js_composer_front');
    wp_dequeue_style("js_composer_front");
}
add_action('wp_print_styles', 'cd2h_dequeue_vc', 100);

// Deregister Default shortcodes
add_action('init', 'cd2h_vc_remove_shortcodes');
function cd2h_vc_remove_shortcodes() {
    //vc_remove_element("vc_row");
    //vc_remove_element("vc_column");
    //vc_remove_element("vc_column_inner");
    vc_remove_element("vc_button");
    vc_remove_element("vc_button2");
    vc_remove_element("vc_posts_slider");
    vc_remove_element("vc_gmaps");
    vc_remove_element("vc_teaser_grid");
    vc_remove_element("vc_progress_bar");
    vc_remove_element("vc_facebook");
    vc_remove_element("vc_tweetmeme");
    vc_remove_element("vc_googleplus");
    vc_remove_element("vc_facebook");
    vc_remove_element("vc_pinterest");
    vc_remove_element("vc_message");
    vc_remove_element("vc_posts_grid");
    vc_remove_element("vc_carousel");
    vc_remove_element("vc_flickr");
    vc_remove_element("vc_tour");
    vc_remove_element("vc_separator");
    //vc_remove_element("vc_single_image");
    vc_remove_element("vc_cta_button");
    vc_remove_element("vc_cta_button2");
    vc_remove_element("vc_tta_tour");
    vc_remove_element("vc_btn");
    vc_remove_element("vc_basic_grid");
    vc_remove_element("vc_round_chart");
    vc_remove_element("vc_line_chart");
    vc_remove_element("vc_cta");
    vc_remove_element("vc_icon");
    vc_remove_element("vc_media_grid");
    vc_remove_element("vc_masonry_media_grid");
    vc_remove_element("vc_masonry_grid");
    vc_remove_element("vc_accordion");
    vc_remove_element("vc_accordion_tab");
    vc_remove_element("vc_toggle");
    vc_remove_element("vc_tabs");
    vc_remove_element("vc_tab");
    vc_remove_element("vc_tta_tabs");
    vc_remove_element("vc_tta_accordion");
    vc_remove_element("vc_tta_pageable");
    vc_remove_element("vc_empty_space");
    vc_remove_element("vc_custom_heading");
    vc_remove_element("vc_images_carousel");
    vc_remove_element("vc_wp_archives");
    vc_remove_element("vc_wp_calendar");
    vc_remove_element("vc_wp_categories");
    vc_remove_element("vc_wp_custommenu");
    vc_remove_element("vc_wp_links");
    vc_remove_element("vc_wp_meta");
    vc_remove_element("vc_wp_pages");
    vc_remove_element("vc_wp_posts");
    vc_remove_element("vc_wp_recentcomments");
    vc_remove_element("vc_wp_rss");
    vc_remove_element("vc_wp_search");
    vc_remove_element("vc_wp_tagcloud");
    vc_remove_element("vc_wp_text");
    vc_remove_element("vc_text_separator");
    vc_remove_element("vc_gallery");
    vc_remove_element("vc_video");
    vc_remove_element("vc_pie");
    vc_remove_element("vc_element-description");
    vc_remove_element("vc_widget_sidebar");

}

//remove WC elements
function cd2h_vc_remove_woocommerce() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        vc_remove_element("woocommerce_cart");
		vc_remove_element("woocommerce_checkout");
		vc_remove_element("woocommerce_order_tracking");
		vc_remove_element("woocommerce_my_account");
		vc_remove_element("recent_products");
		vc_remove_element("featured_products");
		vc_remove_element("product");
		//vc_remove_element("products");
		vc_remove_element("add_to_cart");
		vc_remove_element("add_to_cart_url");
		vc_remove_element("product_page");
		vc_remove_element("product_category");
		vc_remove_element("product_categories");
		vc_remove_element("sale_products");
		vc_remove_element("best_selling_products");
		vc_remove_element("top_rated_products");
		vc_remove_element("product_attribute");
    }
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'cd2h_vc_remove_woocommerce', 11 );
