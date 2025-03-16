<?php

function form_shortcodes_csrf_token() {
    global $csrf_token;
    $csrf_token = generate_token(); // Generate the CSRF token
}
add_action('plugins_loaded', 'form_shortcodes_csrf_token');

// Create shortcode for full width section form
function paradigm_forms_shortcode() {
    
    ob_start();
    $enable_locations = get_option('pf_enable_forms_locations');
    global $csrf_token;
    ?>

    <div id="paradigm-forms-container">

        <form id="paradigm-form">

            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>

            <div class="form-field flex-basis-half">
                <label for="first-name">FIRST NAME *</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            <div class="form-field flex-basis-half">
                <label for="last-name">LAST NAME *</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>

            <div class="form-field flex-basis-half">
                <label for="email">EMAIL ADDRESS *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-field flex-basis-half">
                <label for="phone-number">PHONE NUMBER *</label>
                <input type="tel" id="phone-number" name="phone-number" required>
            </div>

            <div class="form-field">
                <label for="procedure-of-interest">PROCEDURE OF INTEREST *</label>
                <input type="text" id="procedure-of-interest" name="procedure-of-interest" required>
            </div>

            <?php if(!empty($enable_locations)) { ?> 
                <div class="form-field">
                    <label for="locations">PREFERRED LOCATION *</label>
                    <select id="locations" name="locations" required>
                        <option value="" disabled selected hidden></option>
                        <?php 
                        $iterator = 1;
                        while ($location = get_option('paradigm_forms_locations_' . $iterator)) {
                            echo '<option value="' . esc_attr($location) . '">' . esc_html($location) . '</option>';
                            $iterator++;
                        }
                        ?>
                    </select>
                </div>
            <?php } ?>

            <div class="form-field">
                <label for="referral">HOW DID YOU HEAR ABOUT US? *</label>
                <select id="referral" name="referral" required>
                        <option value="" disabled selected></option>
                        <option value="general-dentist">General Dentist</option>
                        <option value="dental-specialist">Dental Specialist (Orthodontist, Endodontist)</option>
                        <option value="insurance-company">Insurance Company</option>
                        <option value="online">Online (Google, Bing)</option>
                        <option value="social">Social Media (Facebook, Instagram)</option>
                        <option value="tv">TV</option>
                        <option value="print">Print Ad (Magazine, Newspaper)</option>
                        <option value="billboard">Billboard/Scoreboard</option>
                        <option value="email">Email</option>
                        <option value="driveby">Drive By</option>
                        <option value="friend">Patient/Friend/Family</option>
                </select>
            </div>

            <div class="form-field">
                <label for="form-message">MESSAGE</label>
                <textarea id="form-message" name="form-message" rows="5"></textarea>
            </div>

            <div id="paradigm-forms-button">
                <input type="submit" id="submit" value="SUBMIT" class="hidden">
            </div>

            <p>
                By submitting this form, you agree to be contacted by phone, email or text and that any associated call may be recorded for quality and training purposes.
            </p>

        </form>
        <p id="paradigm-form-received" class="hidden">Submission Received.</p>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('paradigm_forms', 'paradigm_forms_shortcode');


// Create shortcode for sidebar form
function paradigm_forms_sidebar_shortcode() {
    ob_start();
    $enable_locations = get_option('pf_enable_forms_locations');
    global $csrf_token;
    $data = get_option('paradigm_forms_locations');

    $locations = explode(',', $data);
    $iterator = 1;
    foreach ($locations as $location) {
        $location = trim($location);  // Remove whitespace
        $option_name = 'paradigm_forms_locations_' . $iterator;
        $option_name = get_option($option_name);
        $iterator = $iterator + 1;
    }
    ?>

    <div id="paradigm-forms-sidebar-container">
        <h3>
            <?php
            $paradigm_forms_sidebar_heading = wp_unslash(get_option('paradigm_forms_sidebar_heading'));
            if ($paradigm_forms_sidebar_heading) {
                echo esc_attr($paradigm_forms_sidebar_heading);
            }
            ?>
        </h3>
        <form id="paradigm-form">
            
            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>
            <div class="form-field">
                <input type="text" id="first-name" name="first-name" placeholder="First Name *" required>
            </div>
            <div class="form-field">
                <input type="text" id="last-name" name="last-name" placeholder="Last name *" required>
            </div>
            <div class="form-field">
                <input type="email" id="email" name="email" placeholder="Email Address *" required>
            </div>
            <div class="form-field">
                <input type="tel" id="phone-number" name="phone-number" placeholder="Phone Number *" required>
            </div>
            <div class="form-field">
                <input type="text" id="procedure-of-interest" name="procedure-of-interest" placeholder="Procedure of Interest *" required>
            </div>
            <?php if(!empty($enable_locations)) { ?> 
                <div class="form-field">
                    <select id="locations" name="locations" placeholder="Preferred Location *" required>
                        <option value="" disabled selected hidden >Select Location *</option>
                        <?php 
                        $iterator = 1;
                        while ($location = get_option('paradigm_forms_locations_' . $iterator)) {
                            echo '<option value="' . esc_attr($location) . '">' . esc_html($location) . '</option>';
                            $iterator++;
                        }
                        ?>
                    </select>
                </div>
                    <?php } ?>
            <div class="form-field">
                <select id="referral" name="referral" required>
                        <option value="" disabled selected>Select Referral *</option>
                        <option value="general-dentist">General Dentist</option>
                        <option value="dental-specialist">Dental Specialist (Orthodontist, Endodontist)</option>
                        <option value="insurance-company">Insurance Company</option>
                        <option value="online">Online (Google, Bing)</option>
                        <option value="social">Social Media (Facebook, Instagram)</option>
                        <option value="tv">TV</option>
                        <option value="print">Print Ad (Magazine, Newspaper)</option>
                        <option value="billboard">Billboard/Scoreboard</option>
                        <option value="email">Email</option>
                        <option value="driveby">Drive By</option>
                        <option value="friend">Patient/Friend/Family</option>
                </select>
            </div>
            <div class="form-field">
                <textarea id="form-message" name="form-message" placeholder="Message" rows="5"></textarea>
            </div>
            <div id="paradigm-forms-sidebar-button">
                <input type="submit" id="submit" value="SUBMIT" class="hidden">
            </div>
            <div>
                <p>
                    By submitting this form, you agree to be contacted by phone, email or text and that any associated call may be recorded for quality and training purposes.
                </p>
            </div>
        </form>
        <p id="paradigm-form-received" class="hidden">Submission Received.</p>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('paradigm_forms_sidebar', 'paradigm_forms_sidebar_shortcode');


// Create shortcode for original landing page form
function paradigm_forms_landing_shortcode() {
    ob_start();
    global $csrf_token;
    ?>

    <div id="paradigm-forms-landing-container">

        <h3 class="text-large">Request Consultation</h3>

        <form id="paradigm-form">
            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="text" id="landing" name="landing" value="landing">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>
            <div class="form-field">
                <input type="text" id="first-name" name="first-name" placeholder="First Name *" required>
            </div>
            <div class="form-field">
                <input type="text" id="last-name" name="last-name" placeholder="Last Name *" required>
            </div>
            <div class="form-field">
                <input type="email" id="email" name="email" placeholder="Email Address *" required>
            </div>
            <div class="form-field">
                <input type="tel" id="phone-number" name="phone-number" placeholder="Phone Number *" required>
            </div>
            <div class="form-field">
                <input type="text" id="procedure-of-interest" name="procedure-of-interest" placeholder="Procedure of Interest *" required>
            </div>
            <div class="form-field">
                <select id="referral" name="referral" required>
                        <option value="" disabled selected>Select Referral *</option>
                        <option value="general-dentist">General Dentist</option>
                        <option value="dental-specialist">Dental Specialist (Orthodontist, Endodontist)</option>
                        <option value="insurance-company">Insurance Company</option>
                        <option value="online">Online (Google, Bing)</option>
                        <option value="social">Social Media (Facebook, Instagram)</option>
                        <option value="tv">TV</option>
                        <option value="print">Print Ad (Magazine, Newspaper)</option>
                        <option value="billboard">Billboard/Scoreboard</option>
                        <option value="email">Email</option>
                        <option value="driveby">Drive By</option>
                        <option value="friend">Patient/Friend/Family</option>
                </select>
            </div>
            <div class="form-field">
                <textarea id="form-message" name="form-message" placeholder="Message" rows="5"></textarea>
            </div>
            <div id="paradigm-forms-sidebar-button">
                <input type="submit" id="submit" value="Submit" class="hidden">
            </div>
            <div>
                <p>By submitting this form, you agree to be contacted and that any calls may be recorded for quality and training purposes. Please do not send private health information on this form.</p>
            </div>
        </form>
        <p id="paradigm-form-received" class="hidden">Submission Received.</p>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('paradigm_forms_landing', 'paradigm_forms_landing_shortcode');


// Create shortcode for landing page b
function paradigm_forms_landing_b_shortcode() {
    ob_start();
    global $csrf_token;
    $paradigm_forms_landing_b_heading = get_option('paradigm_forms_landing_b_heading');
    ?>

    <div id="paradigm-forms-landing-b-container">

        <h2>
            <?php
            if ($paradigm_forms_landing_b_heading) {
                echo esc_attr($paradigm_forms_landing_b_heading);
            }
            ?>
        </h2>
      
        <form id="paradigm-form">
            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="text" id="landing_b" name="landing_b" value="landing_b">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>
            <div class="form-field">
                <input type="text" id="first-name" name="first-name" placeholder="First Name *" required>
            </div>
            <div class="form-field">
                <input type="text" id="last-name" name="last-name" placeholder="Last Name *" required>
            </div>
            <div class="form-field">
                <input type="email" id="email" name="email" placeholder="Address@email.com *" required>
            </div>
            <div class="form-field">
                <input type="tel" id="phone-number" name="phone-number" placeholder="(555)123-4567 *" required>
            </div>
            <div class="form-field">
                <input type="text" id="procedure-of-interest" name="procedure-of-interest" placeholder="Procedure of Interest *" required>
            </div>
            <div class="form-field">
                <select id="referral" name="referral" required>
                        <option value="" disabled selected>Select Referral *</option>
                        <option value="general-dentist">General Dentist</option>
                        <option value="dental-specialist">Dental Specialist (Orthodontist, Endodontist)</option>
                        <option value="insurance-company">Insurance Company</option>
                        <option value="online">Online (Google, Bing)</option>
                        <option value="social">Social Media (Facebook, Instagram)</option>
                        <option value="tv">TV</option>
                        <option value="print">Print Ad (Magazine, Newspaper)</option>
                        <option value="billboard">Billboard/Scoreboard</option>
                        <option value="email">Email</option>
                        <option value="driveby">Drive By</option>
                        <option value="friend">Patient/Friend/Family</option>
                </select>
            </div>
            <div class="form-field">
                <textarea id="form-message" name="form-message" placeholder="Message" rows="5"></textarea>
            </div>
            <div id="paradigm-forms-landing-b-submit">
                <input type="submit" id="submit" value="Submit Form" class="hidden">
            </div>
            <div id="paradigm-forms-landing-b-footer">
                <p>By submitting this form, you agree to be contacted and that any calls may be recorded for quality and training purposes. Please do not send private health information on this form.</p>
            </div>
        </form>
        <p id="paradigm-form-received" class="hidden">Submission Received.</p>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('paradigm_forms_landing_b', 'paradigm_forms_landing_b_shortcode');