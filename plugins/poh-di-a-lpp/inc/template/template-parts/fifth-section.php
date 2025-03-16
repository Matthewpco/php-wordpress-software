<?php
$fifth_section_span = get_option('poh_di_a_lpp_fifth_section_span');
$fifth_section_h2 = get_option('poh_di_a_lpp_fifth_section_h2');
$fifth_section_first_h3 = get_option('poh_di_a_lpp_fifth_section_first_h3');
$fifth_section_first_p = get_option('poh_di_a_lpp_fifth_section_first_p');
$fifth_section_second_h3 = get_option('poh_di_a_lpp_fifth_section_second_h3');
$fifth_section_second_p = get_option('poh_di_a_lpp_fifth_section_second_p');
$fifth_section_third_h3 = get_option('poh_di_a_lpp_fifth_section_third_h3');
$fifth_section_third_p = get_option('poh_di_a_lpp_fifth_section_third_p');
?>

<!-- Begin fifth section -->
<section id="poh-di-a-lpp-fifth-section" class="section-padding">
    <span>            
        <?php if($fifth_section_span) {echo $fifth_section_span;}?>
    </span>
    <h2>            
        <?php if($fifth_section_h2) {echo $fifth_section_h2;}?>
    </h2>

    <div>
        <div>
            <img src="/wp-content/plugins/poh-di-a-lpp/inc/media/full-arch-dental-implant-model.webp" alt="full arch dental implant model" width="412">
            <h3>            
                <?php if($fifth_section_first_h3) {echo $fifth_section_first_h3;}?>
            </h3>
            <p>            
                <?php if($fifth_section_first_p) {echo $fifth_section_first_p;}?>
            </p>
        </div>
        <div>
            <img src="/wp-content/plugins/poh-di-a-lpp/inc/media/multiple-dental-implant-model.webp" alt="multiple dental implant model" width="412">
            <h3>            
                <?php if($fifth_section_second_h3) {echo $fifth_section_second_h3;}?>
            </h3>
            <p>            
                <?php if($fifth_section_second_p) {echo $fifth_section_second_p;}?>
            </p>
        </div>
        <div>
            <img src="/wp-content/plugins/poh-di-a-lpp/inc/media/single-dental-implant-model.webp" alt="single dental implant model" width="412">
            <h3>            
                <?php if($fifth_section_third_h3) {echo $fifth_section_third_h3;}?>
            </h3>
            <p>            
                <?php if($fifth_section_third_p) {echo $fifth_section_third_p;}?>
            </p>
        </div>
    </div>
</section>