<?php

function poh_doctor_switcher_admin_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $selected_template = isset($_POST['poh_template_selection']) ? $_POST['poh_template_selection'] : "cboms";
        update_option('poh_selected_template', $selected_template);

    }

    $selected_template = get_option('poh_selected_template');

    ?>

    <style>
        #paradigm-admin-form {
            margin-top: 3%;
        }
        #paradigm-admin-form label {
            display: block;
            margin-bottom: 15%;
            font-size: 1.1rem;
        }
    </style>
    <div class="wrap">
        <h1>POH Doctor Switcher Settings</h1>
        <h2>Choose which template you would like to use for the doctor switcher plugin</h2>
        <form id="paradigm-admin-form" method="post">
            <table>
                <tr valign="top">
                    <td>
                        <label>
                            <input type="radio" name="poh_template_selection" value="omsa" <?php checked($selected_template, 'omsa'); ?>>
                            OMSA
                        </label>
                        <label>
                            <input type="radio" name="poh_template_selection" value="vasa" <?php checked($selected_template, 'vasa'); ?>>
                            VASA
                        </label>
                        <label>
                            <input type="radio" name="poh_template_selection" value="cboms" <?php checked($selected_template, 'cboms'); ?>>
                            CBOMS
                        </label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

}