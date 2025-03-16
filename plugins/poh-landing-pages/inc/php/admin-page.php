<?php

function admin_page_content() {

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the 'enable landing page' option in the database
    $pohlp_enable_landing_page = isset($_POST['pohlp-enable-landing-page']) ? 1 : 0;
    update_option('pohlp-enable-landing-page', $pohlp_enable_landing_page);

    $pohlp_enable_landing_page_url = isset($_POST['pohlp-enable-landing-page-url']) ? 1 : 0;
    update_option('pohlp-enable-landing-page-url', $pohlp_enable_landing_page_url);

    // Update the custom landing page slug option
    $pohlp_landing_page_slug = sanitize_text_field($_POST['pohlp-landing-page-slug']);
    update_option('pohlp-landing-page-slug', $pohlp_landing_page_slug);
    
    // Flush rewrite rules after updating the option
    flush_rewrite_rules();
}

// Get the current value of the options
$pohlp_enable_landing_page = get_option('pohlp-enable-landing-page');
$pohlp_enable_landing_page_url = get_option('pohlp-enable-landing-page-url');
$pohlp_landing_page_slug = get_option('pohlp-landing-page-slug');

?>
<div class="wrap">
    <h1>Landing Page Settings</h1>
    <form method="post" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Enable landing page for non logged in users</th>
                <td><input type="checkbox" name="pohlp-enable-landing-page" value="1" <?php checked($pohlp_enable_landing_page, 1); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Enable landing page with the custom url added below</th>
                <td><input type="checkbox" name="pohlp-enable-landing-page-url" value="1" <?php checked($pohlp_enable_landing_page_url, 1); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Landing page url</th>
                <td><input type="text" name="pohlp-landing-page-slug" value="<?php echo esc_attr($pohlp_landing_page_slug); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
}