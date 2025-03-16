<?php 
    $eleventh_section_first_h2 = get_option('poh_di_lpp_eleventh_section_first_h2');
    $eleventh_section_doctor_name_list = get_option('poh_di_lpp_eleventh_section_doctor_name_list');
    $eleventh_section_doctor_img_list = get_option('poh_di_lpp_eleventh_section_doctor_img_list');
    $eleventh_section_doctor_bio_list = get_option('poh_di_lpp_eleventh_section_doctor_bio_list');
    $eleventh_section_template_one = get_option('poh_di_lpp_eleventh_section_template_one');
    $eleventh_section_template_two = get_option('poh_di_lpp_eleventh_section_template_two');
    
?>
<!-- Begin ninth section -->
<?php
if ($eleventh_section_template_one) { ?>
    <section id="poh-di-lpp-eleventh-section-one" class="section-padding">
        <div class="two-thirds-column">
            <h2>
                <?php
                    if($eleventh_section_first_h2) {
                        echo $eleventh_section_first_h2;
                    }
                ?>
            </h2>

            <?php
                ob_start();
                if($eleventh_section_doctor_name_list && $eleventh_section_doctor_img_list && $eleventh_section_doctor_bio_list) {
                    $name_list = explode(';', $eleventh_section_doctor_name_list);
                    $img_list = explode(';', $eleventh_section_doctor_img_list);
                    $bio_list = explode(';', $eleventh_section_doctor_bio_list);
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

<?php
}?>

<?php
if ($eleventh_section_template_two) { ?>

    <section id="poh-di-lpp-eleventh-section-two" class="section-padding">
        <div class="two-thirds-column">
            <h2>
                <?php
                    if($eleventh_section_first_h2) {
                        echo $eleventh_section_first_h2;
                    }
                ?>
            </h2>
            
            <?php
                ob_start();
                if($eleventh_section_doctor_name_list && $eleventh_section_doctor_img_list && $eleventh_section_doctor_bio_list) {
                    $name_list = explode(';', $eleventh_section_doctor_name_list);
                    $img_list = explode(';', $eleventh_section_doctor_img_list);
                    $bio_list = explode(';', $eleventh_section_doctor_bio_list);
                    for ($x = 0; $x < count($name_list); $x++) {
                        $dr_name = $name_list[$x];
                        $dr_img = $img_list[$x];
                        $dr_bio = $bio_list[$x];
                ?>

                    <div> <!-- set in this order to float image and stack properly in mobile -->
                        <h3><?php echo $dr_name; ?></h3>
                        <img src=" <?php echo $dr_img; ?> " alt="doctor's image" width="400px">
                        <p><?php echo $dr_bio; ?></p>

                    </div>

                    <?php
                    }
                }
                echo ob_get_clean();
            ?>

        </div>
    </section>

<?php
}?>