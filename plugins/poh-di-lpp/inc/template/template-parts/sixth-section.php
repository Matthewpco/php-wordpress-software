<?php 
    $sixth_section_first_h3 = get_option('poh_di_lpp_sixth_section_first_h3');
    $sixth_section_img_url = get_option('poh_di_lpp_sixth_section_img_url');
    $sixth_section_img_alt = get_option('poh_di_lpp_sixth_section_img_alt');
    $sixth_section_list = get_option('poh_di_lpp_sixth_section_list');
?>
<!-- Begin sixth station -->
<section id="poh-di-lpp-sixth-section" class="section-padding">
    <div class="two-thirds-column">
        <h3>
            <?php
                if($sixth_section_first_h3) {
                    echo $sixth_section_first_h3;
                }
            ?>
        </h3>

        <img src="
            <?php
                if($sixth_section_img_url) {
                    echo $sixth_section_img_url;
                }
            ?>
            " alt="
                <?php
                    if($sixth_section_img_alt) {
                        echo $sixth_section_img_alt;
                    }
                ?>
            " width="600px" 
        />

        <ul>
            <?php
                
                if($sixth_section_list) {
                    $items = explode(';', $sixth_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
    </div>
</section>