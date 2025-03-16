<?php 
// Disable all deprecated plugins
if (get_option('wpst_enable_header_banner')) {
    add_action('wp_head', 'add_banner_above_header');
} else {
    remove_action('wp_head', 'add_banner_above_header');
}

function add_banner_above_header() {
    $banner_text = get_option('wpst_header_banner_content');
    $banner_font_color = get_option('wpst_header_banner_color');
    $banner_bg_color = get_option('wpst_header_banner_bg_color');
    $banner_content = "
        <style>
            .wpst-banner {
                text-align: center;
                font-size: .75rem;
                padding: 8px;
            }
        </style>
        <div class='wpst-banner' style='color: {$banner_font_color}; background-color: {$banner_bg_color}'>{$banner_text}</div>
    ";
    echo $banner_content;
}

