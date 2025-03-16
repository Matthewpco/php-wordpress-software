<?php
$fourth_section_span = get_option('poh_di_b_lpp_fourth_section_span');
$fourth_section_first_h2 = get_option('poh_di_b_lpp_fourth_section_first_h2');
$fourth_section_first_p = get_option('poh_di_b_lpp_fourth_section_first_p');
?>

<!-- Begin fourth section -->
<section id="poh-di-b-lpp-fourth-section" class="section-padding">
    <div class="one-half-column">
        <span>            
            <?php
                if($fourth_section_span) {
                    echo $fourth_section_span;
                }
            ?>
        </span>
        <h2>            
            <?php
                if($fourth_section_first_h2) {
                    echo $fourth_section_first_h2;
                }
            ?>
        </h2>
        <p>            
            <?php
                if($fourth_section_first_p) {
                    echo $fourth_section_first_p;
                }
            ?>
        </p>
    </div>
    <div class="one-half-column">
        <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/dental-implants-image.webp" alt="dental implants section image" width="634">
    </div>
</section>