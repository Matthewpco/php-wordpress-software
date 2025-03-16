<?php
    $second_section_first_h2 = get_option('poh_fa_lpp_second_section_first_h2');
    $second_section_first_p = get_option('poh_fa_lpp_second_section_first_p');
    $second_section_second_h2 = get_option('poh_fa_lpp_second_section_second_h2');
    $second_section_second_p = get_option('poh_fa_lpp_second_section_second_p');
    $second_section_list = get_option('poh_fa_lpp_second_section_list');
    $second_section_third_p = get_option('poh_fa_lpp_second_section_third_p');
    $second_section_third_h2 = get_option('poh_fa_lpp_second_section_third_h2');
    $second_section_first_h3 = get_option('poh_fa_lpp_second_section_first_h3');
    $second_section_footer_img_url = get_option('poh_fa_lpp_second_section_footer_img_url');
    $second_section_footer_img_alt = get_option('poh_fa_lpp_second_section_footer_img_alt');
    $second_section_second_h3 = get_option('poh_fa_lpp_second_section_second_h3');
    $second_section_footer_second_img_url = get_option('poh_fa_lpp_second_section_footer_second_img_url');
    $second_section_footer_second_img_alt = get_option('poh_fa_lpp_second_section_footer_second_img_alt');
    $second_section_third_h3 = get_option('poh_fa_lpp_second_section_third_h3');
    $second_section_footer_third_img_url = get_option('poh_fa_lpp_second_section_footer_third_img_url');
    $second_section_footer_third_img_alt = get_option('poh_fa_lpp_second_section_footer_third_img_alt');
?>

<!-- Begin second station -->
<section id="poh-fa-lpp-second-section" class="section-padding display-flex">
    <div class="two-thirds-column">

        <div id="poh-fa-lpp-second-section-header">
            <h2>
                <?php
                    
                    if($second_section_first_h2) {
                        echo $second_section_first_h2;
                    }
                ?>
            </h2>

            <div class="lightbox-trigger-container">
                <img src="/wp-content/plugins/poh-fa-lpp/inc/media/ruthie-experience.webp" alt="ruthie-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-fa-lpp/inc/media/dorothy-experience.webp" alt="dorothy-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-fa-lpp/inc/media/terry-experience.webp" alt="terry-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-fa-lpp/inc/media/kendra-experience.webp" alt="kendra-experience" class="lightbox-trigger">
            </div>

            <div id="lightbox" class="lightbox">
                <span id="close-lightbox">&times;</span>
                <video id="lightbox-video" controls>
                    <p>Your browser does not support the video tag.</p>
                </video>
            </div>

            <p>
                <?php
                    
                    if($second_section_first_p) {
                        echo $second_section_first_p;
                    }
                ?>
            </p>

            <h2>
                <?php
                    
                    if($second_section_second_h2) {
                        echo $second_section_second_h2;
                    }
                ?>
            </h2>

            <p>
                <?php
                    
                    if($second_section_second_p) {
                        echo $second_section_second_p;
                    }
                ?>
            </p>

            <ul>
                <?php
                    if($second_section_list) {
                        $items = explode(';', $second_section_list);
                        foreach ($items as $item) {
                            echo '<li>' . $item . '</li>';
                        }
                    }
                ?>
            </ul>

            <p>
                <?php
                    if($second_section_third_p) {
                        echo $second_section_third_p;
                    }
                ?>
            </p>

            <h2>
                <?php
                    if($second_section_third_h2) {
                        echo $second_section_third_h2;
                    }
                ?>
            </h2>

            <div class="display-flex">
                <div class="one-third-column">
                    <h3>
                        <?php
                            if($second_section_first_h3) {
                                echo $second_section_first_h3;
                            }
                        ?>
                    </h3>
                    <?php    
                        if($second_section_footer_img_url) {
                            ?>
                                <img src=" <?php echo $second_section_footer_img_url; ?> " alt="
                                    <?php    
                                        if($second_section_footer_img_alt) {
                                            echo $second_section_footer_img_alt;
                                        }
                                    ?>
                                " width="300px" />
                            <?php
                        }
                    ?>
                </div>
                
                <div class="one-third-column">
                    <h3>
                        <?php
                            if($second_section_second_h3) {
                                echo $second_section_second_h3;
                            }
                        ?>
                    </h3>
                    <?php    
                        if($second_section_footer_second_img_url) {
                            ?>
                                <img src=" <?php echo $second_section_footer_second_img_url; ?> " alt="
                                    <?php    
                                        if($second_section_footer_second_img_alt) {
                                            echo $second_section_footer_second_img_alt;
                                        }
                                    ?>
                                " width="300px" />
                            <?php
                        }
                    ?>
                </div>

                <div class="one-third-column">
                    <h3>
                        <?php
                            if($second_section_third_h3) {
                                echo $second_section_third_h3;
                            }
                        ?>
                    </h3>
                    <?php    
                        if($second_section_footer_third_img_url) {
                            ?>
                                <img src=" <?php echo $second_section_footer_third_img_url; ?> " alt="
                                    <?php    
                                        if($second_section_footer_third_img_alt) {
                                            echo $second_section_footer_third_img_alt;
                                        }
                                    ?>
                                " width="300px" />
                            <?php
                        }
                    ?>
                </div>
            </div>

        </div>

    </div>

    <div class="one-third-column">
            <?php echo do_shortcode("[paradigm_forms_landing]"); ?>
    </div>
    
</section>