<?php

// Register the shortcode
function paradigm_request_forms_shortcode() {
    ob_start(); // Start output buffering

    ?>
    <div id="paradigm-request-form-container">
        <p>In order to serve you better please include as much information as possible to ensure timely completion of your request.
        </p>
        <div style="display: none;">
            <label for="fax">Fax (do not fill out)</label>
            <input type="text" id="fax" name="fax">
        </div>
        <form id="paradigm-request-form" action="" method="post">
            <label for="name">Your name: *</label>
            <input type="text" id="full-name" name="name" placeholder="example: John Smith" required>
            <label for="email">Your email: *</label>
            <input type="email" id="email" name="email" required placeholder="example: john.smith@paradigmoralhealth.com">
            <label for="newpage">Is this a new page or piece of content that needs to be written or just an edit of existing content with actionable steps? *</label>
                <select id="newpage" name="newpage" required>
                        <option value="" disabled selected>Please select one</option>
                        <option value="new-content">New content is required</option>
                        <option value="edit-content">Edit existing content</option>
                </select>
            <label for="site-url">The site or page URL that relates to your request: *</label>
            <input type="text" id="site-url" name="site-url" required placeholder="example: google.com/...">
            <label for="date">Select a preferred completion date, if this request is not urgent then please select a date that is a week from the current date: *</label>
            <input type="date" id="preferred-date" name="date" required>
            <label for="message">Please upload images to company drive at <a href="https://nofs.sharepoint.com/teams/Education/Images1/Forms/AllItems.aspx" target="_blank">https://nofs.sharepoint.com/teams/Education/Images1/Forms/AllItems.aspx</a><br> and paste the link here: </label>
            <textarea id="additional-links" name="links" placeholder="example: https://nofs.sharepoint.com/:i:/r/teams/Education/Shared%20Documents/Practice%20Photos"></textarea>
            <label for="message">Please describe your request in detail: *</label>
            <textarea id="form-message" name="message" required rows=8 placeholder="example: On the front page of the website, at the top of the screen, change the phone number from 555-1234-567 to 555-765-4321."></textarea>
            <input type="hidden" name="template_name" value="prf_template.php">
            <input type="submit" value="Submit">
        </form>

        <?php
			// Check if there's an error message
			if (isset($_SESSION['error_message'])) {
					// Display the error message
					echo '<p class="error">' . $_SESSION['error_message'] . '</p>';

					// Remove the error message from the session
					unset($_SESSION['error_message']);
			}
		?>

        <p id="paradigm-form-received" class="hidden">Submission Received</p>

        <p><strong>A general timeline for changes are as follows:</strong></p>
        <p>
            <br>Simple edits to existing content are are estimated to take 2-3 days for completion.
            <br>Changes that require content to be created are estimated to take 1-2 weeks for completion.
            <br>Creating a brand new page involving content creation, design, and development is estimated at 2-4 weeks for completion.
        </p>
                
        <p><strong>Example submission with screenshot</strong></p>
        <div class="paradigm-example-image"></div>
        <p>Here is an example of an image and a detailed description. 
            At the top change "referrals" to "referral", in the middle change "restoring the functionality of your smile." to "restoring the long-term functionality of your smile.",
            and at the bottom change the image to the one supplied in the form above.
        </p>
        <p>(To make a screenshot: on Windows press the "PrtScr" button and on Mac press Shift, Command, and 4)</p>
        
        
    </div>

    <?php


    return ob_get_clean(); // Return the form as a string
}
add_shortcode('paradigm_request_form', 'paradigm_request_forms_shortcode');