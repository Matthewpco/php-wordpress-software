<?php
    $seventh_section_h2 = get_option('poh_fa_lpp_seventh_section_h2');
    $seventh_section_button_text = get_option('poh_fa_lpp_seventh_section_button_text');
    $seventh_section_button_link = get_option('poh_fa_lpp_seventh_section_button_link');
    $seventh_section_first_p = get_option('poh_fa_lpp_seventh_section_first_p');
    $seventh_section_second_p = get_option('poh_fa_lpp_seventh_section_second_p');
    $seventh_section_first_list = get_option('poh_fa_lpp_seventh_section_first_list');
    $seventh_section_third_p = get_option('poh_fa_lpp_seventh_section_third_p');
    $seventh_section_second_list = get_option('poh_fa_lpp_seventh_section_second_list');
    $seventh_section_image_list = get_option('poh_fa_lpp_seventh_section_image_list');
?>
<!-- Begin Seventh section template part -->
<section id="poh-fa-lpp-seventh-section" class="section-padding">

    <div class="two-thirds-column">

        <h2>
            <?php
                
                if($seventh_section_h2) {
                    echo $seventh_section_h2;
                }
            ?>
        </h2>
        <a href="tel:<?php 
                    if($seventh_section_button_link) {
                        echo $seventh_section_button_link;
                    }
                ?>
        ">
            <button><i class="fa-solid fa-phone" style="margin-right: 8px;"></i>
                <?php 
                    if($seventh_section_button_text) {
                        echo $seventh_section_button_text;
                    }
                ?>
            </button>
        </a>
        <span><?php 
                    if($seventh_section_first_p) {
                        echo $seventh_section_first_p;
                    }
                ?></span>
        
        <div class="display-flex">
            <div class="one-half-column">
                <p><?php 
                        if($seventh_section_second_p) {
                            echo $seventh_section_second_p;
                        }
                    ?>
                </p>
                <ul>
                    <?php
                        if($seventh_section_first_list) {
                            $items = explode(';', $seventh_section_first_list);
                            foreach ($items as $item) {
                                echo '<li>' . $item . '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>

            <div class="one-half-column display-flex">
                <p>
                    <?php 
                        if($seventh_section_third_p) {
                            echo $seventh_section_third_p;
                        }
                    ?>
                </p>

                <div class="one-half-column">
                    <ul>
                        <?php
                            if($seventh_section_second_list) {
                                $items = explode(';', $seventh_section_second_list);
                                foreach ($items as $item) {
                                    echo '<li>' . $item . '</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>

                <div class="one-half-column">
                    <ul>
                        <?php
                            if($seventh_section_image_list) {
                                $items = explode(';', $seventh_section_image_list);
                                foreach ($items as $item) {
                                    echo '<li><img src="' . $item . '"></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</section>