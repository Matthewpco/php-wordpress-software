<?php 
    $fifth_section_first_h2 = get_option('poh_di_lpp_fifth_section_first_h2');
    $fifth_section_first_h3 = get_option('poh_di_lpp_fifth_section_first_h3');
    $fifth_section_img_url = get_option('poh_di_lpp_fifth_section_img_url');
    $fifth_section_img_alt = get_option('poh_di_lpp_fifth_section_img_alt');
    $fifth_section_list = get_option('poh_di_lpp_fifth_section_list');
?>
<!-- Begin fifth station -->
<section id="poh-di-lpp-fifth-section" class="section-padding">
    <div class="two-thirds-column">
        <h2>
            <?php
                if($fifth_section_first_h2) {
                    echo $fifth_section_first_h2;
                }
            ?>
        </h2>

        <h3>
            <?php
                if($fifth_section_first_h3) {
                    echo $fifth_section_first_h3;
                }
            ?>
        </h3>

        <img src="
            <?php
                if($fifth_section_img_url) {
                    echo $fifth_section_img_url;
                }
            ?>
            " alt="
                <?php
                    if($fifth_section_img_alt) {
                        echo $fifth_section_img_alt;
                    }
                ?>
            " width="600px" 
        />

        <ul>
            <?php
                
                if($fifth_section_list) {
                    $items = explode(';', $fifth_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
    </div>
</section>