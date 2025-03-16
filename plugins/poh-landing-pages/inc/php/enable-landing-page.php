<?php
// Redirect non logged in users to coming soon template
if (get_option('pohlp-enable-landing-page')) {
    add_filter('template_include', 'redirect_all_users_to_landing'); 

} else {
    remove_filter('template_include', 'redirect_all_users_to_landing'); 
}

function redirect_all_users_to_landing($template) {

    if (!is_user_logged_in()) {
        $landing_page = dirname(plugin_dir_path(__FILE__)) . '/template/landing-page.php';


        if (file_exists($landing_page)) {
            return $landing_page;
        }
        else {
            error_log($landing_page);
        }
    }

    return $template;
}