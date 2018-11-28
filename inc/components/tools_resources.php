<?php
// Tools & Resources is_container
vc_map(array(
    "name" => "Tools & Resources",
    "description" => "Tools & Resources Tabs Container",
    "base" => "cd2h_tools_resources",
    "category" => "Tools & Resources",
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView',
    "as_parent" => array('only' => 'cd2h_tools_tab'),
    "params" => array(
    )
));
class WPBakeryShortCode_cd2h_tools_resources extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
            ), $atts
        ));
        ob_start();
        include(locate_template('inc/shortcodes/tools_tabs_container.php'));
        $output = ob_get_clean();
        return $output;
    }
}
// Tools & Resources Tab
vc_map(array(
    "name" => "Tools & Resources Tab",
    "description" => "Tools & Resources Tab",
    "base" => "cd2h_tools_tab",
    "category" => "Tables",
    "show_settings_on_create" => true,
    "as_child" => array('only' => 'cd2h_tools_resources'),
    "params" => array(
        array(
            "admin_label" => true,
            "type" => "dropdown",
            "heading" => __("Category"),
            "param_name" => "category",
            "value" => get_tool_category_options(),
        ),
    )
));
class WPBakeryShortCode_cd2h_tools_tab extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "category" => '',
            ), $atts
        ));
        ob_start();
        include(locate_template('inc/shortcodes/tools_tab.php'));
        $output = ob_get_clean();
        return $output;
    }
}
