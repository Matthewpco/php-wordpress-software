<?php 
    $seventh_section_first_h3 = get_option('poh_di_lpp_seventh_section_first_h3');
    $seventh_section_img_url = get_option('poh_di_lpp_seventh_section_img_url');
    $seventh_section_img_alt = get_option('poh_di_lpp_seventh_section_img_alt');
    $seventh_section_list = get_option('poh_di_lpp_seventh_section_list');
?>
<!-- Begin sixth station -->
<section id="poh-di-lpp-seventh-section" class="section-padding">
    <div class="two-thirds-column">
        <h3>
            <?php
                if($seventh_section_first_h3) {
                    echo $seventh_section_first_h3;
                }
            ?>
        </h3>

        <img src="
            <?php
                if($seventh_section_img_url) {
                    echo $seventh_section_img_url;
                }
            ?>
            " alt="
                <?php
                    if($seventh_section_img_alt) {
                        echo $seventh_section_img_alt;
                    }
                ?>
            " width="600px" 
        />

        <ul>
            <?php
                
                if($seventh_section_list) {
                    $items = explode(';', $seventh_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
    </div>
</section>