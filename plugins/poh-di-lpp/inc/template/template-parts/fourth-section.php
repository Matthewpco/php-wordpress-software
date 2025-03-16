<?php 
    $fourth_section_first_h2 = get_option('poh_di_lpp_fourth_section_first_h2');
    $fourth_section_first_p = get_option('poh_di_lpp_fourth_section_first_p');
    $fourth_section_second_p = get_option('poh_di_lpp_fourth_section_second_p');
    $fourth_section_third_p = get_option('poh_di_lpp_fourth_section_third_p');
    $fourth_section_fourth_p = get_option('poh_di_lpp_fourth_section_fourth_p');
    $fourth_section_fifth_p = get_option('poh_di_lpp_fourth_section_fifth_p');
    $fourth_section_sixth_p = get_option('poh_di_lpp_fourth_section_sixth_p');
    $fourth_section_seventh_p = get_option('poh_di_lpp_fourth_section_seventh_p');
    $fourth_section_eighth_p = get_option('poh_di_lpp_fourth_section_eighth_p');

?>
<!-- Begin fourth section -->
<section id="poh-di-lpp-fourth-section" class="section-padding">
    <h2>
        <?php
            if($fourth_section_first_h2) {
                echo $fourth_section_first_h2;
            }
        ?>
    </h2>
    <div class="two-thirds-column display-flex">
    
        <div class="one-half-column">
            <img src="/wp-content/plugins/poh-di-lpp/inc/media/well-being-icon.webp" alt="" width="50px">
            <p><strong>
                <?php
                    if($fourth_section_first_p) {
                        echo $fourth_section_first_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($fourth_section_second_p) {
                        echo $fourth_section_second_p;
                    }
                ?>
            </p>
            
            <img src="/wp-content/plugins/poh-di-lpp/inc/media/comforting-icon.webp" alt="" width="50px">
            <p><strong>
                <?php
                    if($fourth_section_third_p) {
                        echo $fourth_section_third_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($fourth_section_fourth_p) {
                        echo $fourth_section_fourth_p;
                    }
                ?>
            </p>
        </div>

        <div class="one-half-column">
            <img src="/wp-content/plugins/poh-di-lpp/inc/media/cutting-edge-icon.webp" alt="" width="50px">
            <p><strong>
                <?php
                    if($fourth_section_fifth_p) {
                        echo $fourth_section_fifth_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($fourth_section_sixth_p) {
                        echo $fourth_section_sixth_p;
                    }
                ?>
            </p>
            
            <img src="/wp-content/plugins/poh-di-lpp/inc/media/success-icon.webp" alt="" width="50px">
            <p><strong>
                <?php
                    if($fourth_section_seventh_p) {
                        echo $fourth_section_seventh_p;
                    }
                ?>
            </strong></p>
            <p>
                <?php
                    if($fourth_section_eighth_p) {
                        echo $fourth_section_eighth_p;
                    }
                ?>
            </p>
        </div>
    </div>

</section>