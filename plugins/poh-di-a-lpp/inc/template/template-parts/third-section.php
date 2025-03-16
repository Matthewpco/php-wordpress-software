<?php
$third_section_shortcode = get_option('poh_di_a_lpp_third_section_shortcode');
?>

<!-- Begin third section -->
<section id="poh-di-a-lpp-third-section" class="section-padding">
    <img src="/wp-content/plugins/poh-di-a-lpp/inc/media/quiz-section-image.webp" alt="quiz section image" width="433">
    <?php if($third_section_shortcode) {echo do_shortcode("[$third_section_shortcode]");}?>
</section>