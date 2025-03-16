<?php 
    $third_section_first_h2 = get_option('poh_di_lpp_third_section_first_h2');
    $third_section_img_url = get_option('poh_di_lpp_third_section_img_url');
    $third_section_img_alt = get_option('poh_di_lpp_third_section_img_alt');
    $third_section_first_p = get_option('poh_di_lpp_third_section_first_p');
    $third_section_list = get_option('poh_di_lpp_third_section_list');
    $third_section_second_h2 = get_option('poh_di_lpp_third_section_second_h2');
    $third_section_second_p = get_option('poh_di_lpp_third_section_second_p');
?>
<!-- Begin third station -->
<section id="poh-di-lpp-third-section" class="section-padding">
    <div class="two-thirds-column">
        <h2>
            <?php
                if($third_section_first_h2) {
                    echo $third_section_first_h2;
                }
            ?>
        </h2>

        <img src="
            <?php
                if($third_section_img_url) {
                    echo $third_section_img_url;
                }
            ?>
            " alt="
                <?php
                    if($third_section_img_alt) {
                        echo $third_section_img_alt;
                    }
                ?>
            " width="1200px" 
        />

        <p>
            <?php
                if($third_section_first_p) {
                    echo $third_section_first_p;
                }
            ?>
        </p>

        <ul>
            <?php
                
                if($third_section_list) {
                    $items = explode(';', $third_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>

        <h2>
            <?php
                if($third_section_second_h2) {
                    echo $third_section_second_h2;
                }
            ?>
        </h2>

        <p>
            <?php
                if($third_section_second_p) {
                    echo $third_section_second_p;
                }
            ?>
        </p>



    </div>
</section>