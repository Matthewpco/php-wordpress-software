<?php
// Display the WPST page content
function wpst_theme_setup_page_content() {
    // Check if the user has the capability to manage options
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Display any error messages
    settings_errors( 'wpst' );

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Update the options in the database
        $disable_admin_url = isset($_POST['wpst_disable_admin_url']) ? 1 : 0;
        update_option('wpst_disable_admin_url', $disable_admin_url);

        $disable_comments = isset($_POST['wpst_disable_comments']) ? 1 : 0;
        update_option('wpst_disable_comments', $disable_comments);

        $disable_version_tags = isset($_POST['wpst_disable_version_tags']) ? 1 : 0;
        update_option('wpst_disable_version_tags', $disable_version_tags);

        $disable_theme_editor = isset($_POST['wpst_disable_theme_editor']) ? 1 : 0;
        update_option('wpst_disable_theme_editor', $disable_theme_editor);

        $disable_reviews_header = isset($_POST['wpst_disable_reviews_header']) ? 1 : 0;
        update_option('wpst_disable_reviews_header', $disable_reviews_header);

        $enable_security_headers = isset($_POST['wpst_enable_security_headers']) ? 1 : 0;
        update_option('wpst_enable_security_headers', $enable_security_headers);

        $enable_limit_login_attempts = isset($_POST['wpst_enable_limit_login_attempts']) ? 1 : 0;
        update_option('wpst_enable_limit_login_attempts', $enable_limit_login_attempts);

        $enable_coming_soon = isset($_POST['wpst_enable_coming_soon']) ? 1 : 0;
        update_option('wpst_enable_coming_soon', $enable_coming_soon);

        $enable_editor_button = isset($_POST['wpst_enable_editor_button']) ? 1 : 0;
        update_option('wpst_enable_editor_button', $enable_editor_button);

    }

    if (isset($_POST['clear_cache'])) {
        // Clear the cache
        wp_cache_flush();
        echo '<div class="notice notice-success is-dismissible"><p>Cache cleared successfully!</p></div>';
    }

    // Get the current values of the options from the database
    $disable_admin_url = get_option('wpst_disable_admin_url');
    $disable_comments = get_option('wpst_disable_comments');
    $disable_version_tags = get_option('wpst_disable_version_tags');
    $disable_theme_editor = get_option('wpst_disable_theme_editor');
    $disable_reviews_header = get_option('wpst_disable_reviews_header');
    $enable_security_headers = get_option('wpst_enable_security_headers');
    $enable_limit_login_attempts = get_option('wpst_enable_limit_login_attempts');
    $enable_coming_soon = get_option('wpst_enable_coming_soon');
    $enable_editor_button = get_option('wpst_enable_editor_button'); 

    // Display the form
    ?>
    <div class="wrap">
        <h2>WP Security Toolset</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Change default admin access</th>
                    <td><input type="checkbox" name="wpst_disable_admin_url" value="1" <?php checked($disable_admin_url, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Disable theme editor</th>
                    <td><input type="checkbox" name="wpst_disable_theme_editor" value="1" <?php checked($disable_theme_editor, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Disable all comments</th>
                    <td><input type="checkbox" name="wpst_disable_comments" value="1" <?php checked($disable_comments, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Disable version tags</th>
                    <td><input type="checkbox" name="wpst_disable_version_tags" value="1" <?php checked($disable_version_tags, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Disable reviews header</th>
                    <td><input type="checkbox" name="wpst_disable_reviews_header" value="1" <?php checked($disable_reviews_header, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable basic security headers</th>
                    <td><input type="checkbox" name="wpst_enable_security_headers" value="1" <?php checked($enable_security_headers, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable limit login attempts</th>
                    <td><input type="checkbox" name="wpst_enable_limit_login_attempts" value="1" <?php checked($enable_limit_login_attempts, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable coming soon page for logged out users</th>
                    <td><input type="checkbox" name="wpst_enable_coming_soon" value="1" <?php checked($enable_coming_soon, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable TinyMCE editor button</th>
                    <td><input type="checkbox" name="wpst_enable_editor_button" value="1" <?php checked($enable_editor_button, 1); ?> /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <hr style="border-top: 1px solid #000066; width: 20%; margin-left: 0; margin-bottom: 1%;">
            <input type="submit" name="clear_cache" class="button button-primary" value="Clear Cache" />
        </form>
    </div>
    <?php
}
