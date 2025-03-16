<?php

function poh_fa_lpp_content_page_content() {

    // Get the current value of the options
    $fields = [
        'poh_fa_lpp_seo_title',
        'poh_fa_lpp_seo_description',
        'poh_fa_lpp_header_link_url',
        'poh_fa_lpp_header_img_url',
        'poh_fa_lpp_header_phone_number',
        'poh_fa_lpp_first_section_h1',
        'poh_fa_lpp_first_section_list',
        'poh_fa_lpp_first_section_cta_url',
        'poh_fa_lpp_first_section_cta',
        'poh_fa_lpp_first_section_footer_reviews',
        'poh_fa_lpp_first_section_footer_img_url',
        'poh_fa_lpp_first_section_footer_img_alt',
        'poh_fa_lpp_first_section_footer_second_img_url',
        'poh_fa_lpp_first_section_footer_second_img_alt',
        'poh_fa_lpp_first_section_footer_third_img_url',
        'poh_fa_lpp_first_section_footer_third_img_alt',
        'poh_fa_lpp_first_section_footer_text',
        'poh_fa_lpp_second_section_first_h2',
        'poh_fa_lpp_second_section_first_p',
        'poh_fa_lpp_second_section_second_h2',
        'poh_fa_lpp_second_section_second_p',
        'poh_fa_lpp_second_section_list',
        'poh_fa_lpp_second_section_third_p',
        'poh_fa_lpp_second_section_third_h2',
        'poh_fa_lpp_second_section_first_h3',
        'poh_fa_lpp_second_section_footer_img_url',
        'poh_fa_lpp_second_section_footer_img_alt',
        'poh_fa_lpp_second_section_second_h3',
        'poh_fa_lpp_second_section_footer_second_img_url',
        'poh_fa_lpp_second_section_footer_second_img_alt',
        'poh_fa_lpp_second_section_third_h3',
        'poh_fa_lpp_second_section_footer_third_img_url',
        'poh_fa_lpp_second_section_footer_third_img_alt',
        'poh_fa_lpp_third_section_first_h2',
        'poh_fa_lpp_third_section_first_p',
        'poh_fa_lpp_third_section_second_p',
        'poh_fa_lpp_third_section_third_p',
        'poh_fa_lpp_third_section_fourth_p',
        'poh_fa_lpp_third_section_fifth_p',
        'poh_fa_lpp_third_section_sixth_p',
        'poh_fa_lpp_third_section_seventh_p',
        'poh_fa_lpp_third_section_eighth_p',
        'poh_fa_lpp_fourth_section_first_h2',
        'poh_fa_lpp_fourth_section_first_p',
        'poh_fa_lpp_fourth_section_doctor_name_list',
        'poh_fa_lpp_fourth_section_doctor_img_list',
        'poh_fa_lpp_fourth_section_doctor_bio_list',
        'poh_fa_lpp_fifth_section_h2',
        'poh_fa_lpp_sixth_section_h2',
        'poh_fa_lpp_sixth_section_p',
        'poh_fa_lpp_seventh_section_h2',
        'poh_fa_lpp_seventh_section_button_text',
        'poh_fa_lpp_seventh_section_button_link',
        'poh_fa_lpp_seventh_section_first_p',
        'poh_fa_lpp_seventh_section_second_p',
        'poh_fa_lpp_seventh_section_first_list',
        'poh_fa_lpp_seventh_section_third_p',
        'poh_fa_lpp_seventh_section_second_list',
        'poh_fa_lpp_seventh_section_image_list',
        'poh_fa_lpp_faq_section_h2',
        'poh_fa_lpp_faq_section_title_list',
        'poh_fa_lpp_faq_section_description_list',
        'poh_fa_lpp_reviews_section_h2',
        'poh_fa_lpp_reviews_section_first_p',
        'poh_fa_lpp_reviews_section_first_name',
        'poh_fa_lpp_reviews_section_second_p',
        'poh_fa_lpp_reviews_section_second_name',
        'poh_fa_lpp_reviews_section_third_p',
        'poh_fa_lpp_reviews_section_third_name',
        'poh_fa_lpp_reviews_section_second_h2',
        'poh_fa_lpp_reviews_section_video_list',
        'poh_fa_lpp_contact_section_h2',
        'poh_fa_lpp_contact_section_name_list',
        'poh_fa_lpp_contact_section_phone_list',
        'poh_fa_lpp_contact_section_address_list',
        'poh_fa_lpp_contact_section_button_text',
        'poh_fa_lpp_contact_section_button_link',
        'poh_fa_lpp_contact_section_img_url',
        'poh_fa_lpp_contact_section_img_alt',
        'poh_fa_lpp_footer_section_p'
    ];

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $allowed_html = array(
                    'strong' => array(),
                    'em' => array(),
                    'br' => array()
                );
                
                $value = wp_unslash(wp_kses($_POST[$field], $allowed_html));
                
                update_option($field, $value);
            }
        }

        // Flush rewrite rules after updating the option
        flush_rewrite_rules();
    }

    $options = [];
    foreach ($fields as $field) {
        $options[$field] = get_option($field);
    }


?>

<style>
    .horizontal-line {
        border-bottom: 1px solid lightgray;
    }

    .tabcontent {
        display: none;
    }

    .tablink {
        cursor: pointer;
    }

    .tablink.active {
        background-color: #ccc;
    }
</style>

<div class="wrap">
    <h1>DI Landing Page Content</h1>
    <div class="tabs">
        <button id="start" class="tablink" onclick="openTab('Tab1', this)">Header section</button>
        <button class="tablink" onclick="openTab('Tab2', this)">Section 1</button>
        <button class="tablink" onclick="openTab('Tab3', this)">Section 2</button>
        <button class="tablink" onclick="openTab('Tab4', this)">Section 3</button>
        <button class="tablink" onclick="openTab('Tab5', this)">Section 4</button>
        <button class="tablink" onclick="openTab('Tab6', this)">Section 5</button>
        <button class="tablink" onclick="openTab('Tab7', this)">Section 6</button>
        <button class="tablink" onclick="openTab('Tab8', this)">Section 7</button>
        <button class="tablink" onclick="openTab('Tab9', this)">FAQ Section</button>
        <button class="tablink" onclick="openTab('Tab10', this)">Reviews section</button>
        <button class="tablink" onclick="openTab('Tab11', this)">Contact section</button>
        <button class="tablink" onclick="openTab('Tab12', this)">Footer section</button>
        <!-- Add more tabs as needed -->
    </div>

    <div id="Tab1" class="tabcontent">
        <!-- Tab 1 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                    <tr valign="top">
                        <th scope="row">SEO Title</th>
                        <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_seo_title"><?php echo $options['poh_fa_lpp_seo_title'] ?></textarea></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">SEO Description</th>
                        <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_seo_description"><?php echo $options['poh_fa_lpp_seo_description'] ?></textarea></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Header logo url link</th>
                        <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_header_link_url"><?php echo $options['poh_fa_lpp_header_link_url'] ?></textarea></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Header logo image url</th>
                        <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_header_img_url"><?php echo $options['poh_fa_lpp_header_img_url'] ?></textarea></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Header phone number</th>
                        <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_header_phone_number"><?php echo $options['poh_fa_lpp_header_phone_number'] ?></textarea></td>
                    </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab2" class="tabcontent">
        <!-- Tab 2 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">First section h1</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_h1"><?php echo $options['poh_fa_lpp_first_section_h1'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section list. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_first_section_list" spellcheck="false"><?php echo $options['poh_fa_lpp_first_section_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section CTA button url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_cta_url"><?php echo $options['poh_fa_lpp_first_section_cta_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section CTA button text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_cta"><?php echo $options['poh_fa_lpp_first_section_cta'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer reviews text</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_first_section_footer_reviews"><?php echo $options['poh_fa_lpp_first_section_footer_reviews'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_img_url"><?php echo $options['poh_fa_lpp_first_section_footer_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer image alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_img_alt"><?php echo $options['poh_fa_lpp_first_section_footer_img_alt'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer second image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_second_img_url"><?php echo $options['poh_fa_lpp_first_section_footer_second_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer second image alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_second_img_alt"><?php echo $options['poh_fa_lpp_first_section_footer_second_img_alt'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer third image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_third_img_url"><?php echo $options['poh_fa_lpp_first_section_footer_third_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section footer third image alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_first_section_footer_third_img_alt"><?php echo $options['poh_fa_lpp_first_section_footer_third_img_alt'] ?></textarea></td>
                </tr>
                <tr valign="top" >
                    <th scope="row">First section footer text</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_first_section_footer_text"><?php echo $options['poh_fa_lpp_first_section_footer_text'] ?></textarea></td>
                </tr>  
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab3" class="tabcontent">
        <!-- Tab 3 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Second section, first h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_first_h2"><?php echo $options['poh_fa_lpp_second_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section, first p</th>
                    <td ><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_second_section_first_p"><?php echo $options['poh_fa_lpp_second_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section, second h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_second_h2"><?php echo $options['poh_fa_lpp_second_section_second_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section, second paragraph.</th>
                    <td ><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_second_section_second_p"><?php echo $options['poh_fa_lpp_second_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section list.</th>
                    <td ><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_second_section_list"><?php echo $options['poh_fa_lpp_second_section_list'] ?></textarea></td>
                </tr> 
                <tr valign="top">
                    <th scope="row">Second section third paragraph.</th>
                    <td ><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_second_section_third_p"><?php echo $options['poh_fa_lpp_second_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section third h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_third_h2"><?php echo $options['poh_fa_lpp_second_section_third_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section first h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_first_h3"><?php echo $options['poh_fa_lpp_second_section_first_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section first footer img url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_img_url"><?php echo $options['poh_fa_lpp_second_section_footer_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section first footer img alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_img_alt"><?php echo $options['poh_fa_lpp_second_section_footer_img_alt'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section second h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_second_h3"><?php echo $options['poh_fa_lpp_second_section_second_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section second footer img url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_second_img_url"><?php echo $options['poh_fa_lpp_second_section_footer_second_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section second footer img alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_second_img_alt"><?php echo $options['poh_fa_lpp_second_section_footer_second_img_alt'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section third h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_third_h3"><?php echo $options['poh_fa_lpp_second_section_third_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section third footer img url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_third_img_url"><?php echo $options['poh_fa_lpp_second_section_footer_third_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section third footer img alt</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_second_section_footer_third_img_alt"><?php echo $options['poh_fa_lpp_second_section_footer_third_img_alt'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab4" class="tabcontent">
        <!-- Tab 4 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Third section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_third_section_first_h2"><?php echo $options['poh_fa_lpp_third_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section first paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_first_p"><?php echo $options['poh_fa_lpp_third_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section second paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_second_p"><?php echo $options['poh_fa_lpp_third_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section third paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_third_p"><?php echo $options['poh_fa_lpp_third_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section fourth paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_fourth_p"><?php echo $options['poh_fa_lpp_third_section_fourth_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section fifth paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_fifth_p"><?php echo $options['poh_fa_lpp_third_section_fifth_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section sixth paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_sixth_p"><?php echo $options['poh_fa_lpp_third_section_sixth_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section seventh paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_seventh_p"><?php echo $options['poh_fa_lpp_third_section_seventh_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Third section eighth paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_third_section_eighth_p"><?php echo $options['poh_fa_lpp_third_section_eighth_p'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab5" class="tabcontent">
        <!-- Tab 5 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Fourth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_fourth_section_first_h2"><?php echo $options['poh_fa_lpp_fourth_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fourth section first p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_fourth_section_first_p" spellcheck="false"><?php echo $options['poh_fa_lpp_fourth_section_first_p'] ?></textarea></td>
                </tr> 
                <tr valign="top">
                    <th scope="row">Fourth section Doctor name list. Enter a list of items separated by a semicolon. Example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_fourth_section_doctor_name_list" spellcheck="false"><?php echo $options['poh_fa_lpp_fourth_section_doctor_name_list'] ?></textarea></td>
                </tr> 
                <tr valign="top">
                    <th scope="row">Fourth section Doctor image url list. Enter a list of items separated by a semicolon. Example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_fourth_section_doctor_img_list" spellcheck="false"><?php echo $options['poh_fa_lpp_fourth_section_doctor_img_list'] ?></textarea></td>
                </tr> 
                <tr valign="top">
                    <th scope="row">Fourth section Doctor biography list. Enter a list of items separated by a semicolon. Example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_fourth_section_doctor_bio_list" spellcheck="false"><?php echo $options['poh_fa_lpp_fourth_section_doctor_bio_list'] ?></textarea></td>
                </tr> 
            </table>
        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab6" class="tabcontent">
        <!-- Tab 6 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Fifth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_fifth_section_h2"><?php echo $options['poh_fa_lpp_fifth_section_h2'] ?></textarea></td>
                </tr>
            </table>
        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab7" class="tabcontent">
        <!-- Tab 7 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Sixth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_sixth_section_h2"><?php echo $options['poh_fa_lpp_sixth_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section paragraph</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_sixth_section_p"><?php echo $options['poh_fa_lpp_sixth_section_p'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab8" class="tabcontent">
        <!-- Tab 8 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Seventh section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_seventh_section_h2"><?php echo $options['poh_fa_lpp_seventh_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section button text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_seventh_section_button_text"><?php echo $options['poh_fa_lpp_seventh_section_button_text'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section button link</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_seventh_section_button_link"><?php echo $options['poh_fa_lpp_seventh_section_button_link'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section first p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_seventh_section_first_p"><?php echo $options['poh_fa_lpp_seventh_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section second p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_seventh_section_second_p"><?php echo $options['poh_fa_lpp_seventh_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section first list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_seventh_section_first_list"><?php echo $options['poh_fa_lpp_seventh_section_first_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section third p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_seventh_section_third_p"><?php echo $options['poh_fa_lpp_seventh_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section second list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_seventh_section_second_list"><?php echo $options['poh_fa_lpp_seventh_section_second_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section image list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_seventh_section_image_list"><?php echo $options['poh_fa_lpp_seventh_section_image_list'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    

    <div id="Tab9" class="tabcontent">
        <!-- Tab 9 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">FAQ section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_faq_section_h2"><?php echo $options['poh_fa_lpp_faq_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">FAQ Title list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_faq_section_title_list"><?php echo $options['poh_fa_lpp_faq_section_title_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">FAQ Description list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_faq_section_description_list"><?php echo $options['poh_fa_lpp_faq_section_description_list'] ?></textarea></td>
                </tr>
                
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab10" class="tabcontent">
        <!-- Tab 10 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Reviews section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_reviews_section_h2"><?php echo $options['poh_fa_lpp_reviews_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section first review</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_reviews_section_first_p"><?php echo $options['poh_fa_lpp_reviews_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section first reviewer name</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_reviews_section_first_name"><?php echo $options['poh_fa_lpp_reviews_section_first_name'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section second p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_reviews_section_second_p"><?php echo $options['poh_fa_lpp_reviews_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section second reviewer name</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_reviews_section_second_name"><?php echo $options['poh_fa_lpp_reviews_section_second_name'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section third p</th>
                    <td><textarea type="text" rows="4" cols="80" name="poh_fa_lpp_reviews_section_third_p"><?php echo $options['poh_fa_lpp_reviews_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section third reviewer name</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_reviews_section_third_name"><?php echo $options['poh_fa_lpp_reviews_section_third_name'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews section second h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_reviews_section_second_h2"><?php echo $options['poh_fa_lpp_reviews_section_second_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Reviews video list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_reviews_section_video_list"><?php echo $options['poh_fa_lpp_reviews_section_video_list'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab11" class="tabcontent">
        <!-- Tab 11 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Contact us section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_contact_section_h2"><?php echo $options['poh_fa_lpp_contact_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact office name list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_contact_section_name_list"><?php echo $options['poh_fa_lpp_contact_section_name_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact office phone list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_contact_section_phone_list"><?php echo $options['poh_fa_lpp_contact_section_phone_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact office address list</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_fa_lpp_contact_section_address_list"><?php echo $options['poh_fa_lpp_contact_section_address_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact us section button text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_contact_section_button_text"><?php echo $options['poh_fa_lpp_contact_section_button_text'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact us section button link</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_contact_section_button_link"><?php echo $options['poh_fa_lpp_contact_section_button_link'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact us section image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_contact_section_img_url"><?php echo $options['poh_fa_lpp_contact_section_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Contact us section image alt tag</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_fa_lpp_contact_section_img_alt"><?php echo $options['poh_fa_lpp_contact_section_img_alt'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab12" class="tabcontent">
        <!-- Tab 12 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Footer section h2</th>
                    <td><textarea type="text" rows="3" cols="80" name="poh_fa_lpp_footer_section_p"><?php echo $options['poh_fa_lpp_footer_section_p'] ?></textarea></td>
                </tr>
            </table>


        <?php submit_button(); ?>
        </form>
    </div>

<!-- Add more tab content divs as needed -->
    
</div>
<?php
}