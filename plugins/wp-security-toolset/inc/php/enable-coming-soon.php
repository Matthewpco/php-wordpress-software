<?php
// Redirect non logged in users to coming soon template
if (get_option('wpst_enable_coming_soon')) {
    add_filter('template_include', 'redirect_non_logged_users_to_coming_soon'); 
} else {
    remove_filter('template_include', 'redirect_non_logged_users_to_coming_soon'); 
}

function redirect_non_logged_users_to_coming_soon($template) {

    if (!is_user_logged_in()) {
        $coming_soon = dirname(plugin_dir_path(__FILE__)) . '/templates/coming-soon.php';


        if (file_exists($coming_soon)) {
            return $coming_soon;
        }
        else {
            error_log($coming_soon);
        }
    }

    return $template;
}