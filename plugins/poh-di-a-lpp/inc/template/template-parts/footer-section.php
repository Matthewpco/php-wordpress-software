<?php
$footer_image_url = get_option('poh_di_a_lpp_footer_image_url');
$footer_phone_number = get_option('poh_di_a_lpp_footer_phone_number');
$footer_phone_number_text = get_option('poh_di_a_lpp_footer_phone_number_text');
$footer_small_text = get_option('poh_di_a_lpp_footer_small_text');
$footer_facebook_url = get_option('poh_di_a_lpp_footer_facebook_url');
$footer_instagram_url = get_option('poh_di_a_lpp_footer_instagram_url');
$footer_youtube_url = get_option('poh_di_a_lpp_footer_youtube_url');
$footer_privacy_policy_text = get_option('poh_di_a_lpp_footer_privacy_policy_text');
$footer_privacy_policy_url = get_option('poh_di_a_lpp_footer_privacy_policy_url');
?>

<!-- Begin footer section -->
    <footer id="poh-di-a-lpp-footer-section">

        <div>
            <img src="<?php if($footer_image_url) {echo $footer_image_url;}?>" alt="landing page footer logo" width="100" />
        </div>

        <nav aria-label="Footer Navigation">
            <ul>
                <li><a href="#poh-di-a-lpp-third-section">Quiz</a></li>
                <li><a href="#poh-di-a-lpp-fourth-section">Dental Implants</a></li>
                <li><a href="#poh-di-a-lpp-fifth-section">Implant Types</a></li>
                <li><a href="#poh-di-a-lpp-sixth-section">Process</a></li>
                <li><a href="#poh-di-a-lpp-eighth-section">Surgeons</a></li>
                <li><a href="#poh-di-a-lpp-ninth-section">Testimonials</a></li>
                <li><a href="#poh-di-a-lpp-tenth-section">FAQs</a></li>
            </ul>
        </nav>

        <div>
            <a href="tel:<?php if($footer_phone_number) {echo $footer_phone_number;}?>">
                <?php if($footer_phone_number_text) {echo $footer_phone_number_text;}?>
            </a>
        </div>
        
        <ul>
            <?php if($footer_facebook_url) { ?>
                <li><a href="<?php echo $footer_facebook_url; ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($footer_instagram_url) { ?>
                <li><a href="<?php echo $footer_instagram_url; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <?php } ?>
            <?php if($footer_youtube_url) { ?>
                <li><a href="<?php echo $footer_youtube_url; ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
            <?php } ?>
        </ul>

        <p>
            <?php if($footer_small_text) {echo $footer_small_text;}?>
            <a href="<?php if($footer_privacy_policy_url) {echo $footer_privacy_policy_url;}?>" target="_blank"><?php if($footer_privacy_policy_text) {echo " / " . $footer_privacy_policy_text;}?></a>
        </p>

    </footer>

    <?php wp_footer(); ?>

	</body>
</html>