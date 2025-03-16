<?php
$third_section_shortcode = get_option('poh_di_b_lpp_third_section_shortcode');
?>

<!-- Begin third section -->
<section id="poh-di-b-lpp-third-section" class="section-padding">
    <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/quiz-section-image.webp" alt="form section image" width="433">
    <?php
        if($third_section_shortcode) {
            echo do_shortcode("[$third_section_shortcode]");
        }
    ?>
</section>