<?php
$ninth_section_span = get_option('poh_di_b_lpp_ninth_section_span');
$ninth_section_first_h2 = get_option('poh_di_b_lpp_ninth_section_first_h2');
$ninth_section_shortcode = get_option('poh_di_b_lpp_ninth_section_shortcode');
?>

<!-- Begin ninth section -->
<section id="poh-di-b-lpp-ninth-section" class="section-padding">

    <span>            
        <?php
            if($ninth_section_span) {
                echo $ninth_section_span;
            }
        ?>
    </span>
    <h2>            
        <?php
            if($ninth_section_first_h2) {
                echo $ninth_section_first_h2;
            }
        ?>
    </h2>

    <?php
        if($ninth_section_shortcode) {
            echo do_shortcode("[$ninth_section_shortcode]");
        }
    ?>
    <div class="display-flex">
        <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/before-after-3.webp" alt="before and after image" width="634"/>
        <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/before-after-4.webp" alt="before and after image" width="634" />
    </div>
</section>