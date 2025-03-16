<?php
    $second_section_first_h2 = get_option('poh_di_lpp_second_section_first_h2');
    $second_section_first_p = get_option('poh_di_lpp_second_section_first_p');
    $second_section_second_p = get_option('poh_di_lpp_second_section_second_p');
?>

<!-- Begin second station -->
<section id="poh-di-lpp-second-section" class="section-padding display-flex">
    <div class="two-thirds-column">

        <div id="poh-di-lpp-second-section-header">
            <h2>
                <?php
                    
                    if($second_section_first_h2) {
                        echo $second_section_first_h2;
                    }
                ?>
            </h2>

            <p>
                <?php
                    
                    if($second_section_first_p) {
                        echo $second_section_first_p;
                    }
                ?>
            </p>

            <div class="lightbox-trigger-container">
                <img src="/wp-content/plugins/poh-di-lpp/inc/media/ruthie-experience.webp" alt="ruthie-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-di-lpp/inc/media/dorothy-experience.webp" alt="dorothy-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-di-lpp/inc/media/terry-experience.webp" alt="terry-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-di-lpp/inc/media/kendra-experience.webp" alt="kendra-experience" class="lightbox-trigger">
            </div>

            <div id="lightbox" class="lightbox">
                <span id="close-lightbox">&times;</span>
                <video id="lightbox-video" controls>
                    <p>Your browser does not support the video tag.</p>
                </video>
            </div>


            <p>
                <?php
                    
                    if($second_section_second_p) {
                        echo $second_section_second_p;
                    }
                ?>
            </p>
        </div>

    </div>

    <div class="one-third-column">
            <?php echo do_shortcode("[paradigm_forms_landing]"); ?>
    </div>
    
</section>