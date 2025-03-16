<?php 
    $fourth_section_first_h2 = get_option('poh_fa_lpp_fourth_section_first_h2');
    $fourth_section_first_p = get_option('poh_fa_lpp_fourth_section_first_p');
    $fourth_section_doctor_name_list = get_option('poh_fa_lpp_fourth_section_doctor_name_list');
    $fourth_section_doctor_img_list = get_option('poh_fa_lpp_fourth_section_doctor_img_list');
    $fourth_section_doctor_bio_list = get_option('poh_fa_lpp_fourth_section_doctor_bio_list');

?>
<!-- Begin ninth section -->
<section id="poh-fa-lpp-fourth-section" class="section-padding">
    <div class="two-thirds-column">
        <h2>
            <?php
                if($fourth_section_first_h2) {
                    echo $fourth_section_first_h2;
                }
            ?>
        </h2>

        <p>
            <?php
                if ($fourth_section_first_p) {
                    echo $fourth_section_first_p;
                }
            ?>
        </p>

        
        <?php
            ob_start();
            if($fourth_section_doctor_name_list && $fourth_section_doctor_img_list && $fourth_section_doctor_bio_list) {
                $name_list = explode(';', $fourth_section_doctor_name_list);
                $img_list = explode(';', $fourth_section_doctor_img_list);
                $bio_list = explode(';', $fourth_section_doctor_bio_list);
                for ($x = 0; $x < count($name_list); $x++) {
                    $dr_name = $name_list[$x];
                    $dr_img = $img_list[$x];
                    $dr_bio = $bio_list[$x];
                    ?>
                        <div class="display-flex">
                            <div class="one-half-column">
                                
                                <img src=" <?php echo $dr_img; ?> " alt="" width="400px" />
                                        
                            </div>
                                
                            <div class="one-half-column">

                                <h3><?php echo $dr_name; ?></h3>
                                <p><?php echo $dr_bio; ?></p>

                            </div>  
        
                        </div>
                    <?php
                }
            }
            echo ob_get_clean();
        ?>

    </div>
</section>