<?php

function content_page_content() {

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pohlp_first_section_h1 = wp_unslash(sanitize_text_field($_POST['pohlp_first_section_h1']));
    update_option('pohlp_first_section_h1', $pohlp_first_section_h1);

    $pohlp_first_section_list = wp_unslash(sanitize_text_field($_POST['pohlp_first_section_list']));
    update_option('pohlp_first_section_list', $pohlp_first_section_list);

    $pohlp_first_section_cta = wp_unslash(sanitize_text_field($_POST['pohlp_first_section_cta']));
    update_option('pohlp_first_section_cta', $pohlp_first_section_cta);

    $pohlp_second_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_second_section_first_h2']));
    update_option('pohlp_second_section_first_h2', $pohlp_second_section_first_h2);

    $pohlp_second_section_second_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_second_section_second_h2']));
    update_option('pohlp_second_section_second_h2', $pohlp_second_section_second_h2);

    $pohlp_second_section_list = wp_unslash(sanitize_text_field($_POST['pohlp_second_section_list']));
    update_option('pohlp_second_section_list', $pohlp_second_section_list);

    $pohlp_second_section_third_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_second_section_third_h2']));
    update_option('pohlp_second_section_third_h2', $pohlp_second_section_third_h2);

    $pohlp_third_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_third_section_first_h2']));
    update_option('pohlp_third_section_first_h2', $pohlp_third_section_first_h2);

    $pohlp_fourth_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_fourth_section_first_h2']));
    update_option('pohlp_fourth_section_first_h2', $pohlp_fourth_section_first_h2);

    $pohlp_fourth_section_list = wp_unslash(sanitize_text_field($_POST['pohlp_fourth_section_list']));
    update_option('pohlp_fourth_section_list', $pohlp_fourth_section_list);

    $pohlp_fifth_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_fifth_section_first_h2']));
    update_option('pohlp_fifth_section_first_h2', $pohlp_fifth_section_first_h2);

    $pohlp_sixth_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_sixth_section_first_h2']));
    update_option('pohlp_sixth_section_first_h2', $pohlp_sixth_section_first_h2);

    $pohlp_seventh_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_seventh_section_first_h2']));
    update_option('pohlp_seventh_section_first_h2', $pohlp_seventh_section_first_h2);
    
    $pohlp_seventh_section_cta = wp_unslash(sanitize_text_field($_POST['pohlp_seventh_section_cta']));
    update_option('pohlp_seventh_section_cta', $pohlp_seventh_section_cta);

    $pohlp_reviews_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_reviews_section_first_h2']));
    update_option('pohlp_reviews_section_first_h2', $pohlp_reviews_section_first_h2);

    $pohlp_contact_us_section_first_h2 = wp_unslash(sanitize_text_field($_POST['pohlp_contact_us_section_first_h2']));
    update_option('pohlp_contact_us_section_first_h2', $pohlp_contact_us_section_first_h2);
    
    // Flush rewrite rules after updating the option
    flush_rewrite_rules();
}

// Get the current value of the options
$pohlp_first_section_h1 = get_option('pohlp_first_section_h1');
$pohlp_first_section_list = get_option('pohlp_first_section_list');
$pohlp_first_section_cta = get_option('pohlp_first_section_cta');
$pohlp_second_section_first_h2 = get_option('pohlp_second_section_first_h2');
$pohlp_second_section_second_h2 = get_option('pohlp_second_section_second_h2');
$pohlp_second_section_list = get_option('pohlp_second_section_list');
$pohlp_second_section_third_h2 = get_option('pohlp_second_section_third_h2');
$pohlp_third_section_first_h2 = get_option('pohlp_third_section_first_h2');
$pohlp_fourth_section_first_h2 = get_option('pohlp_fourth_section_first_h2');
$pohlp_fourth_section_list = get_option('pohlp_fourth_section_list');
$pohlp_fifth_section_first_h2 = get_option('pohlp_fifth_section_first_h2');
$pohlp_sixth_section_first_h2 = get_option('pohlp_sixth_section_first_h2');
$pohlp_seventh_section_first_h2 = get_option('pohlp_seventh_section_first_h2');
$pohlp_seventh_section_cta = get_option('pohlp_seventh_section_cta');
$pohlp_reviews_section_first_h2 = get_option('pohlp_reviews_section_first_h2');
$pohlp_contact_us_section_first_h2 = get_option('pohlp_contact_us_section_first_h2');

?>
<div class="wrap">
    <h1>Landing Page Content</h1>
    <form method="post" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">First section h1</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_first_section_h1"><?php echo $pohlp_first_section_h1?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">First section list. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                <td><textarea type="text" rows="6" cols="80" name="pohlp_first_section_list" spellcheck="false"><?php echo $pohlp_first_section_list?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">First section CTA button text</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_first_section_cta"><?php echo $pohlp_first_section_cta?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Second section, first h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_second_section_first_h2"><?php echo $pohlp_second_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Second section, second h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_second_section_second_h2"><?php echo $pohlp_second_section_second_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Second section list. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                <td><textarea type="text" rows="6" cols="80" name="pohlp_second_section_list" spellcheck="false"><?php echo $pohlp_second_section_list?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Second section, third h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_second_section_third_h2"><?php echo $pohlp_second_section_third_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Third section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_third_section_first_h2"><?php echo $pohlp_third_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Fourth section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_fourth_section_first_h2"><?php echo $pohlp_fourth_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Fourth section list. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                <td><textarea type="text" rows="6" cols="80" name="pohlp_fourth_section_list" spellcheck="false"><?php echo $pohlp_fourth_section_list?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Fifth section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_fifth_section_first_h2"><?php echo $pohlp_fifth_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Sixth section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_sixth_section_first_h2"><?php echo $pohlp_sixth_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Seventh section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_seventh_section_first_h2"><?php echo $pohlp_seventh_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Seventh section CTA button text</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_seventh_section_cta"><?php echo $pohlp_seventh_section_cta?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Reviews section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_reviews_section_first_h2"><?php echo $pohlp_reviews_section_first_h2?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row">Contact us section h2</th>
                <td><textarea type="text" rows="3" cols="80" name="pohlp_contact_us_section_first_h2"><?php echo $pohlp_contact_us_section_first_h2?></textarea></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
}