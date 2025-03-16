<?php

// Display the admin page
function paradigm_request_forms_admin_page() {
    
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    

    global $wpdb;
    $table_name = $wpdb->prefix . 'paradigm_request_forms';
    
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        $enable_forms_display = isset($_POST['prf_enable_forms_display']) ? 1 : 0;
        update_option('prf_enable_forms_display', $enable_forms_display);

        $paradigm_request_forms_email = isset($_POST['paradigm_request_forms_email']) ? $_POST['paradigm_request_forms_email'] : '';
        update_option('paradigm_request_forms_email', $paradigm_request_forms_email);
        
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
    $enable_forms_display = get_option('prf_enable_forms_display');
    $paradigm_request_forms_email = get_option('paradigm_request_forms_email');


    ?>
    <div class="wrap">
        <h1>Paradigm Forms Settings</h1>
        <form method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Enable forms display</th>
                    <td><input type="checkbox" name="prf_enable_forms_display" value="1" <?php checked($enable_forms_display, 1); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Set forms send to mail address</th>
                    <td><input type="email" id="paradigm_request_forms_email" name="paradigm_request_forms_email" value="<?php echo esc_attr($paradigm_request_forms_email); ?>"></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Download Form Submissions</th>
                    <td><a href="<?php echo admin_url('admin-post.php?action=prf_download_csv'); ?>" class="button">Download CSV</a></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>


    <?php
    // Conditional for enabling form display
    if (get_option('prf_enable_forms_display')) {
        ?>
        <style>
            .pf-table {
                border-collapse: collapse;
                width: 90%;
            }
            .pf-table th, .pf-table td {
                text-align: left;
                padding: 8px;
            }
            .pf-table tr:nth-child(even) {
                background-color: #e4e4e6;
            }
            .pf-table th {
                background-color: #1587d1;
                color: white;
            }
            </style>

            <table class="pf-table">
                <tr>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Site URL</th>
                    <th>Preferred Date</th>
                    <th>Additional Links</th>
                    <th>Message</th>
                    <th>Delete Entry</th>
                </tr>

                <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo esc_html($result->full_name); ?></td>
                    <td><?php echo esc_html($result->email); ?></td>
                    <td><?php echo esc_html($result->site_url); ?></td>
                    <td><?php echo esc_html($result->preferred_date); ?></td>
                    <td><?php echo esc_html($result->additional_links); ?></td>
                    <td><?php echo esc_html($result->form_message); ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete_entry" value="1">
                            <input type="hidden" name="entry_id" value="<?php echo esc_attr($result->id); ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </table>
            <br>
            <form method="post">
                <input type="hidden" name="delete_all" value="1">
                <input type="submit" value="Delete All Entries">
            </form>
            <?php
    }
}
?>
