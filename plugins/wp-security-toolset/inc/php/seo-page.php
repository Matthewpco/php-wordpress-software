<?php
// Display the WPST page content
function wpst_seo_page_content() {
    // Check if the user has the capability to manage options
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    // Display any error messages
    settings_errors( 'wpst' );

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Update the options in the database
        
        $enable_custom_sitemap = isset($_POST['wpst_enable_custom_sitemap']) ? 1 : 0;
        update_option('wpst_enable_custom_sitemap', $enable_custom_sitemap);

        $enable_blog_prefix = isset($_POST['wpst_enable_blog_prefix']) ? 1 : 0;
        update_option('wpst_enable_blog_prefix', $enable_blog_prefix);

        $enable_seo_metadata = isset($_POST['wpst_enable_seo_metadata']) ? 1 : 0;
        update_option('wpst_enable_seo_metadata', $enable_seo_metadata);

        $front_page_title = sanitize_text_field($_POST['wpst_front_page_title']);
        update_option('wpst_front_page_title', $front_page_title);

        $front_page_description = sanitize_text_field($_POST['wpst_front_page_description']);
        update_option('wpst_front_page_description', $front_page_description);

    }

    // Get the current values of the options from the database
    
    $enable_custom_sitemap = get_option('wpst_enable_custom_sitemap');
    $enable_blog_prefix = get_option('wpst_enable_blog_prefix');
    $enable_seo_metadata = get_option('wpst_enable_seo_metadata');
    $front_page_title = get_option('wpst_front_page_title');
    $front_page_description = get_option('wpst_front_page_description');

    // Display the form
    ?>
    <div class="wrap">
        <h2>SEO Settings</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable custom sitemap.</th>
                    <td><input type="checkbox" name="wpst_enable_custom_sitemap" value="1" <?php checked($enable_custom_sitemap, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable /blog/ prefix for posts.</th>
                    <td><input type="checkbox" name="wpst_enable_blog_prefix" value="1" <?php checked($enable_blog_prefix, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable SEO Metadata for front page, posts, & pages.</th>
                    <td><input type="checkbox" name="wpst_enable_seo_metadata" value="1" <?php checked($enable_seo_metadata, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Front Page Meta Title.</th>
                    <td><input type="text" name="wpst_front_page_title" value="<?php echo wp_unslash($front_page_title); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Front Page Meta Description.</th>
                    <td><textarea type="text" rows="6" cols="80" name="wpst_front_page_description"><?php echo wp_unslash($front_page_description); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
