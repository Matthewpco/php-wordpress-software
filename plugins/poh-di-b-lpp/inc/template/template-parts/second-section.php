<?php
$second_section_span = get_option('poh_di_b_lpp_second_section_span');
$second_section_first_h2 = get_option('poh_di_b_lpp_second_section_first_h2');
$second_section_p = get_option('poh_di_b_lpp_second_section_p');
?>

<!-- Begin second section -->
<section id="poh-di-b-lpp-second-section" class="section-padding">

        <span>     
            <?php
                if($second_section_span) {
                    echo $second_section_span;
                }
            ?>
        </span>

        <h2>            
            <?php
                if($second_section_first_h2) {
                    echo $second_section_first_h2;
                }
            ?>
        </h2>

        <p>            
            <?php
                if($second_section_p) {
                    echo $second_section_p;
                }
            ?>
        </p>

        <div>
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/before-after-1.webp" alt="before after image 1" width="600"/>
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/before-after-2.webp" alt="before after image 2" width="600" />
        </div>

</section>