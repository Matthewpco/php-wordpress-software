<?php
    $twelfth_section_h2 = get_option('poh_di_lpp_twelfth_section_h2');
    $twelfth_section_first_p = get_option('poh_di_lpp_twelfth_section_first_p');
    $twelfth_section_button = get_option('poh_di_lpp_twelfth_section_button');
    $twelfth_section_button_link = get_option('poh_di_lpp_twelfth_section_button_link');
    $twelfth_section_second_p = get_option('poh_di_lpp_twelfth_section_second_p');
    $twelfth_section_first_h3 = get_option('poh_di_lpp_twelfth_section_first_h3');
    $twelfth_section_first_list = get_option('poh_di_lpp_twelfth_section_first_list');
    $twelfth_section_second_h3 = get_option('poh_di_lpp_twelfth_section_second_h3');
    $twelfth_section_second_list = get_option('poh_di_lpp_twelfth_section_second_list');
    $twelfth_section_first_img_url = get_option('poh_di_lpp_twelfth_section_first_img_url');
    $twelfth_section_first_img_alt = get_option('poh_di_lpp_twelfth_section_first_img_alt');
    $twelfth_section_second_img_url = get_option('poh_di_lpp_twelfth_section_second_img_url');
    $twelfth_section_second_img_alt = get_option('poh_di_lpp_twelfth_section_second_img_alt');
?>
<!-- Begin FAQ template part -->
<section id="poh-di-lpp-twelfth-section" class="section-padding">
    <div class="two-thirds-column">
        <h2>
            <?php
                if($twelfth_section_h2) {
                    echo $twelfth_section_h2;
                }
            ?>
        </h2>

        <p>
            <?php
                if($twelfth_section_first_p) {
                    echo $twelfth_section_first_p;
                }
            ?>
        </p>
        <a href="tel:
            <?php
                if($twelfth_section_button_link) {
                    echo $twelfth_section_button_link;
                }
            ?>
        ">
            <button>
                <?php
                    if($twelfth_section_button) {
                        echo $twelfth_section_button;
                    }
                ?>
            </button>
        </a>

        <p>
            <?php
                if($twelfth_section_second_p) {
                    echo $twelfth_section_second_p;
                }
            ?>
        </p>

        <h3>
            <?php
                if($twelfth_section_first_h3) {
                    echo $twelfth_section_first_h3;
                }
            ?>
        </h3>

        <ul>
            <?php
                if($twelfth_section_first_list) {
                    $items = explode(';', $twelfth_section_first_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>

        <h3>
            <?php
                if($twelfth_section_second_h3) {
                    echo $twelfth_section_second_h3;
                }
            ?>
        </h3>
        <div class="display-flex">
            <div class="one-third-column">
                <ul>
                    <?php
                        if($twelfth_section_second_list) {
                            $items = explode(';', $twelfth_section_second_list);
                            foreach ($items as $item) {
                                echo '<li>' . $item . '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="one-third-column">

                <?php    
                    if($twelfth_section_first_img_url) {
                        ?>
                            <img src=" <?php echo $twelfth_section_first_img_url; ?> " alt="
                                <?php    
                                    if($twelfth_section_first_img_alt) {
                                        echo $twelfth_section_first_img_alt;
                                    }
                                ?>
                            " width="200px" />
                        <?php
                    }
                ?>

                <?php    
                    if($twelfth_section_second_img_url) {
                        ?>
                            <img src=" <?php echo $twelfth_section_second_img_url; ?> " alt="
                                <?php    
                                    if($twelfth_section_second_img_alt) {
                                        echo $twelfth_section_second_img_alt;
                                    }
                                ?>
                            " width="200px" />
                        <?php
                    }
                ?>
            
            </div>
        </div>

    </div>
</section>