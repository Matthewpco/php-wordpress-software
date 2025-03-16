<?php
$eighth_section_span = get_option('poh_di_b_lpp_eighth_section_span');
$eighth_section_first_h2 = get_option('poh_di_b_lpp_eighth_section_first_h2');
$eighth_section_first_p = get_option('poh_di_b_lpp_eighth_section_first_p');
?>

<!-- Begin eighth section -->
<section id="poh-di-b-lpp-eighth-section" class="section-padding">

    <span>            
        <?php
            if($eighth_section_span) {
                echo $eighth_section_span;
            }
        ?>
    </span>
    <h2>            
        <?php
            if($eighth_section_first_h2) {
                echo $eighth_section_first_h2;
            }
        ?>
    </h2>
    <p>            
        <?php
            if($eighth_section_first_p) {
                echo $eighth_section_first_p;
            }
        ?>
    </p>

    <?php echo do_shortcode("[poh_landing_page_a_doctor_switcher]"); ?>

</section>