<?php
$tenth_section_span = get_option('poh_di_b_lpp_tenth_section_span');
$tenth_section_h2 = get_option('poh_di_b_lpp_tenth_section_h2');
$tenth_section_first_p = get_option('poh_di_b_lpp_tenth_section_first_p');
$tenth_section_first_h3 = get_option('poh_di_b_lpp_tenth_section_first_h3');
$tenth_section_second_p = get_option('poh_di_b_lpp_tenth_section_second_p');
$tenth_section_second_h3 = get_option('poh_di_b_lpp_tenth_section_second_h3');
$tenth_section_third_p = get_option('poh_di_b_lpp_tenth_section_third_p');
$tenth_section_third_h3 = get_option('poh_di_b_lpp_tenth_section_third_h3');
$tenth_section_fourth_p = get_option('poh_di_b_lpp_tenth_section_fourth_p');
?>

<!-- Begin tenth section -->
<section id="poh-di-b-lpp-tenth-section" class="section-padding">        
    <span>            
        <?php
            if($tenth_section_span) {
                echo $tenth_section_span;
            }
        ?>
    </span>
    <h2>            
        <?php
            if($tenth_section_h2) {
                echo $tenth_section_h2;
            }
        ?>
    </h2>
    <p>            
        <?php
            if($tenth_section_first_p) {
                echo $tenth_section_first_p;
            }
        ?>
    </p>
    <div class="display-flex">
        <div class="one-half-column">
            <h3>            
                <?php
                    if($tenth_section_first_h3) {
                        echo $tenth_section_first_h3;
                    }
                ?>
            </h3>
            <p>            
                <?php
                    if($tenth_section_second_p) {
                        echo $tenth_section_second_p;
                    }
                ?>
            </p>
            <h3>            
                <?php
                    if($tenth_section_second_h3) {
                        echo $tenth_section_second_h3;
                    }
                ?>
            </h3>
            <p>            
                <?php
                    if($tenth_section_third_p) {
                        echo $tenth_section_third_p;
                    }
                ?>
            </p>
            <h3>            
                <?php
                    if($tenth_section_third_h3) {
                        echo $tenth_section_third_h3;
                    }
                ?>
            </h3>
            <p>            
                <?php
                    if($tenth_section_fourth_p) {
                        echo $tenth_section_fourth_p;
                    }
                ?>
            </p>
        </div>

        <div class="one-half-column">
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/faq-section-image.webp" alt="FAQ section image" width="634">
        </div>
        
    </div>
</section>