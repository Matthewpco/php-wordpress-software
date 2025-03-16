<?php

function poh_doctor_switcher_landing_page_a_content_page() {
    // Check if the user has editor permissions
    if (!current_user_can('edit_pages')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }    

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $poh_di_a_lpp_doctor_switcher_image_urls = isset($_POST['poh_di_a_lpp_doctor_switcher_image_urls']) ? $_POST['poh_di_a_lpp_doctor_switcher_image_urls'] : '';
        update_option('poh_di_a_lpp_doctor_switcher_image_urls', $poh_di_a_lpp_doctor_switcher_image_urls);

        $poh_di_a_lpp_doctor_switcher_dr_names = wp_unslash(isset($_POST['poh_di_a_lpp_doctor_switcher_dr_names']) ? $_POST['poh_di_a_lpp_doctor_switcher_dr_names'] : '');
        update_option('poh_di_a_lpp_doctor_switcher_dr_names', $poh_di_a_lpp_doctor_switcher_dr_names);

        $poh_di_a_lpp_doctor_switcher_dr_descriptions = wp_unslash(isset($_POST['poh_di_a_lpp_doctor_switcher_dr_descriptions']) ? $_POST['poh_di_a_lpp_doctor_switcher_dr_descriptions'] : '');
        update_option('poh_di_a_lpp_doctor_switcher_dr_descriptions', $poh_di_a_lpp_doctor_switcher_dr_descriptions);
        
    }

    $poh_di_a_lpp_doctor_switcher_image_urls = get_option('poh_di_a_lpp_doctor_switcher_image_urls');
    $poh_di_a_lpp_doctor_switcher_dr_names = get_option('poh_di_a_lpp_doctor_switcher_dr_names');
    $poh_di_a_lpp_doctor_switcher_dr_descriptions = get_option('poh_di_a_lpp_doctor_switcher_dr_descriptions');

    ?>
    <div class="wrap">
        <h1>POH Doctor Switcher Landing Page A Content</h1>
        <h2>Enter the following lists of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3. The last item in a list does not have a semicolon following it.</h2>
        <form id="paradigm-content-form" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Doctor image urls</th>
                    <td><textarea name="poh_di_a_lpp_doctor_switcher_image_urls" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_di_a_lpp_doctor_switcher_image_urls) ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Doctor names</th>
                    <td><textarea name="poh_di_a_lpp_doctor_switcher_dr_names" rows="5" cols="80" spellcheck="false"><?php echo esc_attr($poh_di_a_lpp_doctor_switcher_dr_names) ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Doctor descriptions</th>
                    <td><textarea name="poh_di_a_lpp_doctor_switcher_dr_descriptions" rows="10" cols="80" spellcheck="false"><?php echo esc_attr($poh_di_a_lpp_doctor_switcher_dr_descriptions) ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php

}