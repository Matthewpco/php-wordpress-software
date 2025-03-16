<?php
/**
 * The template for displaying forms
 */
?>
<!-- Begin form -->
<section id="template-contact-form-section" class="display-flex section-padding alice-blue">

    <div class="one-half-column contact-form-content-left">
        <h3>Get Connected</h3>
        <p>Interested in restoring your smile or need more information? Fill out our form or give us a call to schedule a consultation.</p>
        
        <a href="tel:+15555555555">
            <button>(555) 555-5555</button>
        </a>

        <h3>Office Hours</h3>
        <table>
            <tr>
                <td>Mon - Fri:</td>
                <td>8 AM - 4 PM</td>
            </tr>
            <tr>
                <td>Saturday:</td>
                <td>Closed</td>
            </tr>
            <tr>
                <td>Sunday:</td>
                <td>Closed</td>
            </tr>
        </table>
        <br>
        <address>90210 Beverly Hills Ave, Los Angeles, CA</address>
        <br>
        <a href="/contact"><span>Get Directions<i class="fa-solid fa-arrow-right" style="padding-left: 8px;"></i></span></a>
    </div>

    <div class="one-half-column contact-form-content-right">
        <?php echo do_shortcode('[paradigm_forms]'); ?>
    </div>

</section><!-- End form -->