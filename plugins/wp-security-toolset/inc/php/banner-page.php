<?php
// Display the WPST page content
function wpst_banner_page_content() {
    // Check if the user has the capability to manage options
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Display any error messages
    settings_errors( 'wpst' );

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Update the options in the database
        
        $enable_header_banner = isset($_POST['wpst_enable_header_banner']) ? 1 : 0;
        update_option('wpst_enable_header_banner', $enable_header_banner);

        $header_banner_content = sanitize_text_field($_POST['wpst_header_banner_content']);
        update_option('wpst_header_banner_content', $header_banner_content);

        $header_banner_color = sanitize_text_field($_POST['wpst_header_banner_color']);
        update_option('wpst_header_banner_color', $header_banner_color);

        $header_banner_bg_color = sanitize_text_field($_POST['wpst_header_banner_bg_color']);
        update_option('wpst_header_banner_bg_color', $header_banner_bg_color);

    }

    // Get the current values of the options from the database
    
    $enable_header_banner = get_option('wpst_enable_header_banner');
    $header_banner_content = get_option('wpst_header_banner_content');
    $header_banner_color = get_option('wpst_header_banner_color');
    $header_banner_bg_color = get_option('wpst_header_banner_bg_color');

    // Display the form
    ?>
    <div class="wrap">
        <h2>Header Banner Settings</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable Banner on Header</th>
                    <td><input type="checkbox" name="wpst_enable_header_banner" value="1" <?php checked($enable_header_banner, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header Banner Content</th>
                    <td><textarea name="wpst_header_banner_content" cols="100" rows="4"><?php echo($header_banner_content); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header Banner Font Color</th>
                    <td><input type="text" name="wpst_header_banner_color" value="<?php echo wp_unslash($header_banner_color); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header Banner Background Color</th>
                    <td><input type="text" name="wpst_header_banner_bg_color" value="<?php echo wp_unslash($header_banner_bg_color); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
