<?php

function poh_di_lpp_admin_page_content() {

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the 'enable landing page' option in the database
    $poh_di_lpp_enable_landing_page = isset($_POST['poh-di-lpp-enable-landing-page']) ? 1 : 0;
    update_option('poh-di-lpp-enable-landing-page', $poh_di_lpp_enable_landing_page);

    $poh_di_lpp_enable_landing_page_url = isset($_POST['poh-di-lpp-enable-landing-page-url']) ? 1 : 0;
    update_option('poh-di-lpp-enable-landing-page-url', $poh_di_lpp_enable_landing_page_url);

    // Update the custom landing page slug option
    $poh_di_lpp_landing_page_slug = sanitize_text_field($_POST['poh-di-lpp-landing-page-slug']);
    update_option('poh-di-lpp-landing-page-slug', $poh_di_lpp_landing_page_slug);
    
    // Flush rewrite rules after updating the option
    flush_rewrite_rules();
}

// Get the current value of the options
$poh_di_lpp_enable_landing_page = get_option('poh-di-lpp-enable-landing-page');
$poh_di_lpp_enable_landing_page_url = get_option('poh-di-lpp-enable-landing-page-url');
$poh_di_lpp_landing_page_slug = get_option('poh-di-lpp-landing-page-slug');

?>
<div class="wrap">
    <h1>DI Landing Page Settings</h1>
    <form method="post" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Enable landing page for non logged in users</th>
                <td><input type="checkbox" name="poh-di-lpp-enable-landing-page" value="1" <?php checked($poh_di_lpp_enable_landing_page, 1); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Enable landing page with the custom url added below</th>
                <td><input type="checkbox" name="poh-di-lpp-enable-landing-page-url" value="1" <?php checked($poh_di_lpp_enable_landing_page_url, 1); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Landing page url</th>
                <td><input type="text" name="poh-di-lpp-landing-page-slug" value="<?php echo esc_attr($poh_di_lpp_landing_page_slug); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
}