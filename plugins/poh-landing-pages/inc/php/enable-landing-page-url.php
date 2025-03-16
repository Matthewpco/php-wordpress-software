<?php
// Redirect non logged in users to coming soon template
if (get_option('pohlp-enable-landing-page-url')) {
    add_filter( 'template_include', 'pohlp_custom_url_template_include' );
} else {
    remove_filter( 'template_include', 'pohlp_custom_url_template_include' );
}



function pohlp_custom_url_template_include( $template ) {
    global $wp_query;
    if (isset($wp_query->query_vars['landing_page']) && $wp_query->query_vars['landing_page']) {
        $landing_page = dirname(plugin_dir_path(__FILE__)) . '/template/landing-page.php';
        

        if ( file_exists( $landing_page ) ) {
            return $landing_page;
        }
    }

    return $template;
}