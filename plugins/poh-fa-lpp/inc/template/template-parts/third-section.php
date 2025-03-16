<?php 
    $third_section_first_h2 = get_option('poh_fa_lpp_third_section_first_h2');
    $third_section_first_p = get_option('poh_fa_lpp_third_section_first_p');
    $third_section_second_p = get_option('poh_fa_lpp_third_section_second_p');
    $third_section_third_p = get_option('poh_fa_lpp_third_section_third_p');
    $third_section_fourth_p = get_option('poh_fa_lpp_third_section_fourth_p');
    $third_section_fifth_p = get_option('poh_fa_lpp_third_section_fifth_p');
    $third_section_sixth_p = get_option('poh_fa_lpp_third_section_sixth_p');
    $third_section_seventh_p = get_option('poh_fa_lpp_third_section_seventh_p');
    $third_section_eighth_p = get_option('poh_fa_lpp_third_section_eighth_p');

?>
<!-- Begin third section -->
<section id="poh-fa-lpp-third-section" class="section-padding">
    <h2>
        <?php
            if($third_section_first_h2) {
                echo $third_section_first_h2;
            }
        ?>
    </h2>
    <div class="two-thirds-column display-flex">
    
        <div class="one-half-column">
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/cutting-edge-icon.webp" alt="" width="40px">
            <p><strong>
                <?php
                    if($third_section_first_p) {
                        echo $third_section_first_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($third_section_second_p) {
                        echo $third_section_second_p;
                    }
                ?>
            </p>
            
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/well-being-icon.webp" alt="" width="40px">
            <p><strong>
                <?php
                    if($third_section_third_p) {
                        echo $third_section_third_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($third_section_fourth_p) {
                        echo $third_section_fourth_p;
                    }
                ?>
            </p>
        </div>

        <div class="one-half-column">
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/success-icon.webp" alt="" width="40px">
            <p><strong>
                <?php
                    if($third_section_fifth_p) {
                        echo $third_section_fifth_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($third_section_sixth_p) {
                        echo $third_section_sixth_p;
                    }
                ?>
            </p>
            
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/constant-improvement-icon.webp" alt="" width="40px">
            <p><strong>
                <?php
                    if($third_section_seventh_p) {
                        echo $third_section_seventh_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($third_section_eighth_p) {
                        echo $third_section_eighth_p;
                    }
                ?>
            </p>
        </div>
    </div>

</section>