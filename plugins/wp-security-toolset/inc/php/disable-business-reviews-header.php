<?php
// Disable file editor
if (get_option('wpst_disable_reviews_header')) {
    add_action('wp_print_styles', 'wpst_disable_reviews_header');
} else {
    remove_action('wp_print_styles', 'wpst_disable_reviews_header');
}

// Hook to enqueue the custom CSS
function wpst_disable_reviews_header() {
    echo '<style>
    .rpi .rpi-header {
        display: none;
    }
    </style>';
}