<?php

function paradigm_forms_admin_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    

    global $wpdb;
    $table_name = $wpdb->prefix . 'paradigm_forms';
    
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        $enable_forms_display = isset($_POST['pf_enable_forms_display']) ? 1 : 0;
        update_option('pf_enable_forms_display', $enable_forms_display);

        if ($enable_forms_display == 0) {
            global $wpdb;
            $table_name = $wpdb->prefix . 'paradigm_forms';
            $wpdb->query("DELETE FROM $table_name");
        }

        $enable_forms_locations = isset($_POST['pf_enable_forms_locations']) ? 1 : 0;
        update_option('pf_enable_forms_locations', $enable_forms_locations);

        $paradigm_forms_email = isset($_POST['paradigm_forms_email']) ? $_POST['paradigm_forms_email'] : '';
        update_option('paradigm_forms_email', $paradigm_forms_email);

        $paradigm_forms_sidebar_heading = isset($_POST['paradigm_forms_sidebar_heading']) ? $_POST['paradigm_forms_sidebar_heading'] : '';
        update_option('paradigm_forms_sidebar_heading', $paradigm_forms_sidebar_heading);

        // Give user a notice of settings updated
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
        });

        if (isset($_POST['paradigm_forms_locations'])) {

            $paradigm_forms_locations = isset($_POST['paradigm_forms_locations']) ? $_POST['paradigm_forms_locations'] : '';
            update_option('paradigm_forms_locations', $paradigm_forms_locations);

            $locations = explode(',', $_POST['paradigm_forms_locations']);
            $iterator = 1;
            foreach ($locations as $location) {
                $location = trim($location);  // Remove whitespace
                $option_name = 'paradigm_forms_locations_' . $iterator;
                update_option($option_name, $location);
                $iterator = $iterator + 1;
            }
        } 

        if (isset($_POST['paradigm_forms_locations_emails'])) {

            $paradigm_forms_locations_emails = isset($_POST['paradigm_forms_locations_emails']) ? $_POST['paradigm_forms_locations_emails'] : '';
            update_option('paradigm_forms_locations_emails', $paradigm_forms_locations_emails);

            $emails = explode(',', $_POST['paradigm_forms_locations_emails']);
            $iterator = 1;
            foreach ($emails as $email) {
                $email = trim($email);  // Remove whitespace
                $option_name = 'paradigm_forms_locations_emails_' . $iterator;
                update_option($option_name, $email);
                $iterator = $iterator + 1;
            }
        } 
        
    }

    if (isset($_POST['delete_all'])) {
        // Delete all entries from the table
        $wpdb->query("TRUNCATE TABLE $table_name");
        
    } elseif (isset($_POST['delete_entry'])) {
        // Delete individual entry
        $entry_id = intval($_POST['entry_id']);
        $wpdb->delete($table_name, array('id' => $entry_id));
    }

    $results = $wpdb->get_results("SELECT * FROM $table_name");
    $enable_forms_display = get_option('pf_enable_forms_display');
    $enable_forms_locations = get_option('pf_enable_forms_locations');
    $paradigm_forms_locations = get_option('paradigm_forms_locations');
    $paradigm_forms_locations_emails = get_option('paradigm_forms_locations_emails');
    $paradigm_forms_email = get_option('paradigm_forms_email');
    $paradigm_forms_sidebar_heading = wp_unslash(get_option('paradigm_forms_sidebar_heading'));


    ?>
    <div class="wrap">
        <h1>Paradigm Forms Settings</h1>
        <form id="paradigm-admin-form" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable submission debugging <div >* <span style="font-weight: bold;">Turn off for HIPAA compliance</span> *</div></th>
                    <td><input type="checkbox" name="pf_enable_forms_display" value="1" <?php checked($enable_forms_display, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Enable multiple locations on website forms</th>
                    <td><input id="form-locations-checkbox" type="checkbox" name="pf_enable_forms_locations" value="1" <?php checked($enable_forms_locations, 1); ?> /></td>
                </tr>
                <tr id="form-locations-row" valign="top">
                    <th scope="row">Set forms location values separated by commas</th>
                    <td><textarea id="paradigm_forms_locations" name="paradigm_forms_locations" rows="5" cols="50"><?php echo esc_attr($paradigm_forms_locations); ?></textarea></td>
                </tr>
                <tr id="form-emails-row" valign="top">
                    <th scope="row">Set forms location email values separated by commas</th>
                    <td><textarea id="paradigm_forms_locations_emails" name="paradigm_forms_locations_emails" rows="5" cols="50"><?php echo esc_attr($paradigm_forms_locations_emails); ?></textarea></td>
                </tr>
                <tr id="form-email-row" valign="top">
                    <th scope="row">Set forms send to mail address for website single location</th>
                    <td><input type="email" id="paradigm_forms_email" name="paradigm_forms_email"
                     value="<?php echo esc_attr($paradigm_forms_email); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Set sidebar forms heading</th>
                    <td><input type="text" id="paradigm_forms_sidebar_heading" name="paradigm_forms_sidebar_heading" value="<?php echo esc_attr($paradigm_forms_sidebar_heading); ?>"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

    // Conditional for enabling form display
    if (get_option('pf_enable_forms_display')) {
        include 'admin-page-template.php';
    }
 
}