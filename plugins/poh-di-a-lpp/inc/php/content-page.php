<?php

function poh_di_a_lpp_content_page_content() {

    // Get the current value of the options
    $fields = [
        'poh_di_a_lpp_seo_title',
        'poh_di_a_lpp_seo_description',
        'poh_di_a_lpp_header_img_url',
        'poh_di_a_lpp_header_phone_number',
        'poh_di_a_lpp_first_section_h1',
        'poh_di_a_lpp_first_section_button',
        'poh_di_a_lpp_first_section_number_reviews',
        'poh_di_a_lpp_first_section_image_list',
        'poh_di_a_lpp_first_section_small_text',
        'poh_di_a_lpp_second_section_span',
        'poh_di_a_lpp_second_section_first_h2',
        'poh_di_a_lpp_second_section_p',
        'poh_di_a_lpp_third_section_shortcode',
        'poh_di_a_lpp_fourth_section_span',
        'poh_di_a_lpp_fourth_section_first_h2',
        'poh_di_a_lpp_fourth_section_first_p',
        'poh_di_a_lpp_fifth_section_span',
        'poh_di_a_lpp_fifth_section_h2',
        'poh_di_a_lpp_fifth_section_first_h3',
        'poh_di_a_lpp_fifth_section_first_p',
        'poh_di_a_lpp_fifth_section_second_h3',
        'poh_di_a_lpp_fifth_section_second_p',
        'poh_di_a_lpp_fifth_section_third_h3',
        'poh_di_a_lpp_fifth_section_third_p',
        'poh_di_a_lpp_sixth_section_span',
        'poh_di_a_lpp_sixth_section_first_h2',
        'poh_di_a_lpp_sixth_section_first_h3',
        'poh_di_a_lpp_sixth_section_first_p',
        'poh_di_a_lpp_sixth_section_second_h3',
        'poh_di_a_lpp_sixth_section_second_p',
        'poh_di_a_lpp_sixth_section_third_h3',
        'poh_di_a_lpp_sixth_section_third_p',
        'poh_di_a_lpp_sixth_section_image_list',
        'poh_di_a_lpp_seventh_section_h2',
        'poh_di_a_lpp_seventh_section_p',
        'poh_di_a_lpp_seventh_section_button',
        'poh_di_a_lpp_eighth_section_span',
        'poh_di_a_lpp_eighth_section_first_h2',
        'poh_di_a_lpp_eighth_section_first_p',
        'poh_di_a_lpp_ninth_section_span',
        'poh_di_a_lpp_ninth_section_first_h2',
        'poh_di_a_lpp_ninth_section_shortcode',
        'poh_di_a_lpp_tenth_section_span',
        'poh_di_a_lpp_tenth_section_first_h2',
        'poh_di_a_lpp_tenth_section_first_p',
        'poh_di_a_lpp_tenth_section_span',
        'poh_di_a_lpp_tenth_section_h2',
        'poh_di_a_lpp_tenth_section_first_p',
        'poh_di_a_lpp_tenth_section_first_h3',
        'poh_di_a_lpp_tenth_section_second_p',
        'poh_di_a_lpp_tenth_section_second_h3',
        'poh_di_a_lpp_tenth_section_third_p',
        'poh_di_a_lpp_tenth_section_third_h3',
        'poh_di_a_lpp_tenth_section_fourth_p',
        'poh_di_a_lpp_eleventh_section_h2',
        'poh_di_a_lpp_eleventh_section_p',
        'poh_di_a_lpp_eleventh_section_button',
        'poh_di_a_lpp_eleventh_section_url',
        'poh_di_a_lpp_footer_image_url',
        'poh_di_a_lpp_footer_phone_number',
        'poh_di_a_lpp_footer_phone_number_text',
        'poh_di_a_lpp_footer_small_text',
        'poh_di_a_lpp_footer_facebook_url',
        'poh_di_a_lpp_footer_instagram_url',
        'poh_di_a_lpp_footer_youtube_url',
        'poh_di_a_lpp_footer_privacy_policy_text',
        'poh_di_a_lpp_footer_privacy_policy_url',
    ];

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $allowed_html = array(
                    'strong' => array(),
                    'em' => array(),
                    'ul' => array(),
                    'li' => array(),
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
    <h1>DI A Landing Page Content</h1>
    <div class="tabs">
        <button id="start" class="tablink" onclick="openTab('Tab1', this)">Header</button>
        <button class="tablink" onclick="openTab('Tab2', this)">Section 1</button>
        <button class="tablink" onclick="openTab('Tab3', this)">Section 2</button>
        <button class="tablink" onclick="openTab('Tab4', this)">Section 3</button>
        <button class="tablink" onclick="openTab('Tab5', this)">Section 4</button>
        <button class="tablink" onclick="openTab('Tab6', this)">Section 5</button>
        <button class="tablink" onclick="openTab('Tab7', this)">Section 6</button>
        <button class="tablink" onclick="openTab('Tab8', this)">Section 7</button>
        <button class="tablink" onclick="openTab('Tab9', this)">Section 8</button>
        <button class="tablink" onclick="openTab('Tab10', this)">Section 9</button>
        <button class="tablink" onclick="openTab('Tab11', this)">Section 10</button>
        <button class="tablink" onclick="openTab('Tab12', this)">Section 11</button>
        <button class="tablink" onclick="openTab('Tab13', this)">Footer</button>
        <!-- Add more tabs as needed -->
    </div>

    <div id="Tab1" class="tabcontent">
        <!-- Tab 1 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">SEO Title</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_seo_title"><?php echo $options['poh_di_a_lpp_seo_title'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">SEO Description</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_seo_description"><?php echo $options['poh_di_a_lpp_seo_description'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header logo image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_header_img_url"><?php echo $options['poh_di_a_lpp_header_img_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Header CTA phone number</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_header_phone_number"><?php echo $options['poh_di_a_lpp_header_phone_number'] ?></textarea></td>
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
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_first_section_h1"><?php echo $options['poh_di_a_lpp_first_section_h1'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section button text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_first_section_button"><?php echo $options['poh_di_a_lpp_first_section_button'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section number of reviews</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_first_section_number_reviews"><?php echo $options['poh_di_a_lpp_first_section_number_reviews'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section list of image urls. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_first_section_image_list" spellcheck="false"><?php echo $options['poh_di_a_lpp_first_section_image_list'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">First section small text / financial disclaimer</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_first_section_small_text"><?php echo $options['poh_di_a_lpp_first_section_small_text'] ?></textarea></td>
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
                    <th scope="row">Second section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_second_section_span"><?php echo $options['poh_di_a_lpp_second_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_second_section_first_h2"><?php echo $options['poh_di_a_lpp_second_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Second section p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_second_section_p"><?php echo $options['poh_di_a_lpp_second_section_p'] ?></textarea></td>
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
                    <th scope="row">Third section shortcode</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_third_section_shortcode"><?php echo $options['poh_di_a_lpp_third_section_shortcode'] ?></textarea></td>
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
                    <th scope="row">Fourth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fourth_section_span"><?php echo $options['poh_di_a_lpp_fourth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fourth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fourth_section_first_h2"><?php echo $options['poh_di_a_lpp_fourth_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fourth section p</th>
                    <td><textarea type="text" rows="12" cols="80" name="poh_di_a_lpp_fourth_section_first_p"><?php echo $options['poh_di_a_lpp_fourth_section_first_p'] ?></textarea></td>
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
                    <th scope="row">Fifth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fifth_section_span"><?php echo $options['poh_di_a_lpp_fifth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fifth_section_h2"><?php echo $options['poh_di_a_lpp_fifth_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section first h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fifth_section_first_h3"><?php echo $options['poh_di_a_lpp_fifth_section_first_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section first p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_fifth_section_first_p"><?php echo $options['poh_di_a_lpp_fifth_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section second h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fifth_section_second_h3"><?php echo $options['poh_di_a_lpp_fifth_section_second_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section second p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_fifth_section_second_p"><?php echo $options['poh_di_a_lpp_fifth_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section third h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_fifth_section_third_h3"><?php echo $options['poh_di_a_lpp_fifth_section_third_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Fifth section third p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_fifth_section_third_p"><?php echo $options['poh_di_a_lpp_fifth_section_third_p'] ?></textarea></td>
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
                    <th scope="row">Sixth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_sixth_section_span"><?php echo $options['poh_di_a_lpp_sixth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section first h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_sixth_section_first_h2"><?php echo $options['poh_di_a_lpp_sixth_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section first h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_sixth_section_first_h3"><?php echo $options['poh_di_a_lpp_sixth_section_first_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section first p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_sixth_section_first_p" spellcheck="false"><?php echo $options['poh_di_a_lpp_sixth_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section second h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_sixth_section_second_h3"><?php echo $options['poh_di_a_lpp_sixth_section_second_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section second p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_sixth_section_second_p" spellcheck="false"><?php echo $options['poh_di_a_lpp_sixth_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section third h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_sixth_section_third_h3"><?php echo $options['poh_di_a_lpp_sixth_section_third_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section third p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_sixth_section_third_p" spellcheck="false"><?php echo $options['poh_di_a_lpp_sixth_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Sixth section list of image urls. Enter a list of items where each item that will appear in the HTML is separated by a semicolon. For example item1;item2;item3...</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_sixth_section_image_list" spellcheck="false"><?php echo $options['poh_di_a_lpp_sixth_section_image_list'] ?></textarea></td>
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
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_seventh_section_h2"><?php echo $options['poh_di_a_lpp_seventh_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_seventh_section_p"><?php echo $options['poh_di_a_lpp_seventh_section_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Seventh section button</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_seventh_section_button"><?php echo $options['poh_di_a_lpp_seventh_section_button'] ?></textarea></td>
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
                    <th scope="row">Eighth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_eighth_section_span"><?php echo $options['poh_di_a_lpp_eighth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Eighth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_eighth_section_first_h2"><?php echo $options['poh_di_a_lpp_eighth_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Eighth section p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_eighth_section_first_p"><?php echo $options['poh_di_a_lpp_eighth_section_first_p'] ?></textarea></td>
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
                    <th scope="row">Ninth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_ninth_section_span"><?php echo $options['poh_di_a_lpp_ninth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Ninth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_ninth_section_first_h2"><?php echo $options['poh_di_a_lpp_ninth_section_first_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Ninth section reviews plugin shortcode</th>
                    <td><textarea type="text" rows="2" cols="80" name='poh_di_a_lpp_ninth_section_shortcode'><?php echo $options['poh_di_a_lpp_ninth_section_shortcode'] ?></textarea></td>
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
                    <th scope="row">Tenth section span</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_tenth_section_span"><?php echo $options['poh_di_a_lpp_tenth_section_span'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_tenth_section_h2"><?php echo $options['poh_di_a_lpp_tenth_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section first p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_tenth_section_first_p"><?php echo $options['poh_di_a_lpp_tenth_section_first_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section first h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_tenth_section_first_h3"><?php echo $options['poh_di_a_lpp_tenth_section_first_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section second p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_tenth_section_second_p"><?php echo $options['poh_di_a_lpp_tenth_section_second_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section second h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_tenth_section_second_h3"><?php echo $options['poh_di_a_lpp_tenth_section_second_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section third p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_tenth_section_third_p"><?php echo $options['poh_di_a_lpp_tenth_section_third_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section third h3</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_tenth_section_third_h3"><?php echo $options['poh_di_a_lpp_tenth_section_third_h3'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tenth section fourth p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_tenth_section_fourth_p"><?php echo $options['poh_di_a_lpp_tenth_section_fourth_p'] ?></textarea></td>
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
                    <th scope="row">Eleventh section h2</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_eleventh_section_h2"><?php echo $options['poh_di_a_lpp_eleventh_section_h2'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Eleventh section p</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_eleventh_section_p"><?php echo $options['poh_di_a_lpp_eleventh_section_p'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Eleventh section button</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_eleventh_section_button"><?php echo $options['poh_di_a_lpp_eleventh_section_button'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Eleventh section contact page url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_eleventh_section_url"><?php echo $options['poh_di_a_lpp_eleventh_section_url'] ?></textarea></td>
                </tr>
            </table>

        <?php submit_button(); ?>
        </form>
    </div>

    <div id="Tab13" class="tabcontent">
        <!-- Tab 13 content goes here -->
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Footer image url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_image_url"><?php echo $options['poh_di_a_lpp_footer_image_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer phone number</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_phone_number"><?php echo $options['poh_di_a_lpp_footer_phone_number'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer phone number text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_phone_number_text"><?php echo $options['poh_di_a_lpp_footer_phone_number_text'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer small text / copyright text</th>
                    <td><textarea type="text" rows="6" cols="80" name="poh_di_a_lpp_footer_small_text"><?php echo $options['poh_di_a_lpp_footer_small_text'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer Facebook url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_facebook_url"><?php echo $options['poh_di_a_lpp_footer_facebook_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer Instagram url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_instagram_url"><?php echo $options['poh_di_a_lpp_footer_instagram_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer YouTube url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_youtube_url"><?php echo $options['poh_di_a_lpp_footer_youtube_url'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer privacy policy text</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_privacy_policy_text"><?php echo $options['poh_di_a_lpp_footer_privacy_policy_text'] ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Footer privacy policy url</th>
                    <td><textarea type="text" rows="2" cols="80" name="poh_di_a_lpp_footer_privacy_policy_url"><?php echo $options['poh_di_a_lpp_footer_privacy_policy_url'] ?></textarea></td>
                </tr>
            </table>

        <?php submit_button(); ?>
        </form>
    </div>

<!-- Add more tab content divs as needed -->
    
</div>
<?php
}