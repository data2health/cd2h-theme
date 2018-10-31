<?php
// 2 Column Table Container
vc_map(array(
    "name" => "2 Column Table",
    "description" => "2 Column Table Container",
    "base" => "cd2h_2_Col_Table",
    "category" => "Tables",
    "content_element" => true,
    "show_settings_on_create" => true,
    "is_container" => true,
    "js_view" => 'VcColumnView',
    "as_parent" => array('only' => 'cd2h_2_Col_Table_Row'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Column 1 Heading"),
            "param_name" => "heading_1",
            "value" => '',
        ),
        array(
            "type" => "textfield",
            "heading" => __("Column 2 Heading"),
            "param_name" => "heading_2",
            "value" => '',
        ),
    )
));
class WPBakeryShortCode_cd2h_2_Col_Table extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "heading_1" => '',
                "heading_2" => '',
            ), $atts
        ));
        $headings = [ $heading_1, $heading_2 ];
        ob_start();
        include(locate_template('inc/shortcodes/table_container.php'));
        $output = ob_get_clean();
        return $output;
    }
}
// 2 Column Table Row
vc_map(array(
    "name" => "Table Row",
    "description" => "2 Column Table Row",
    "base" => "cd2h_2_Col_Table_Row",
    "category" => "Tables",
    "show_settings_on_create" => false,
    "as_child" => array('only' => 'cd2h_2_Col_Table'),
    "params" => array(
        array(
            "admin_label" => true,
            "type" => "textfield",
            "heading" => __("Column 1 Value"),
            "param_name" => "value_1",
            "value" => '',
        ),
        array(
            "type" => "textfield",
            "heading" => __("Column 2 Value"),
            "param_name" => "value_2",
            "value" => '',
        ),
    )
));
class WPBakeryShortCode_cd2h_2_Col_Table_Row extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        extract(shortcode_atts(
            array(
                "value_1" => '',
                "value_2" => '',
            ), $atts
        ));
        $values = [$value_1, $value_2 ];
        ob_start();
        include(locate_template('inc/shortcodes/table_row.php'));
        $output = ob_get_clean();
        return $output;
    }
}
