<?php
$eleventh_section_h2 = get_option('poh_di_a_lpp_eleventh_section_h2');
$eleventh_section_p = get_option('poh_di_a_lpp_eleventh_section_p');
$eleventh_section_button = get_option('poh_di_a_lpp_eleventh_section_button');
$eleventh_section_url = get_option('poh_di_a_lpp_eleventh_section_url');
?>

<!-- Begin eleventh section -->
<section id="poh-di-a-lpp-eleventh-section" class="section-padding">
    
    <h2>            
        <?php if($eleventh_section_h2) {echo $eleventh_section_h2;}?>
    </h2>
    <p>            
        <?php if($eleventh_section_p) {echo $eleventh_section_p;}?>
    </p>
    <a href="<?php if($eleventh_section_url) {echo $eleventh_section_url;}?>" class="button">
        <?php if($eleventh_section_button) {echo $eleventh_section_button;}?>
    </a>
    
</section>