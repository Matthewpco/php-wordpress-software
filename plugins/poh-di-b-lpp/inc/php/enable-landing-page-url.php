<?php
// Redirect non logged in users to coming soon template
if (get_option('poh-di-b-lpp-enable-landing-page-url')) {
    add_filter( 'template_include', 'poh_di_b_lpp_custom_url_template_include' );
} else {
    remove_filter( 'template_include', 'poh_di_b_lpp_custom_url_template_include' );
}



function poh_di_b_lpp_custom_url_template_include( $template ) {
    global $wp_query;
    if (isset($wp_query->query_vars['poh_di_b_lpp_landing_page']) && $wp_query->query_vars['poh_di_b_lpp_landing_page']) {
        $landing_page = dirname(plugin_dir_path(__FILE__)) . '/template/landing-page.php';
        

        if ( file_exists( $landing_page ) ) {
            return $landing_page;
        }
    }

    return $template;
}