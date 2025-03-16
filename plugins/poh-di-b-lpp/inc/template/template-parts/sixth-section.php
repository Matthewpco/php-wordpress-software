<?php
$sixth_section_span = get_option('poh_di_b_lpp_sixth_section_span');
$sixth_section_first_h2 = get_option('poh_di_b_lpp_sixth_section_first_h2');
$sixth_section_first_h3 = get_option('poh_di_b_lpp_sixth_section_first_h3');
$sixth_section_first_p = get_option('poh_di_b_lpp_sixth_section_first_p');
$sixth_section_second_h3 = get_option('poh_di_b_lpp_sixth_section_second_h3');
$sixth_section_second_p = get_option('poh_di_b_lpp_sixth_section_second_p');
$sixth_section_third_h3 = get_option('poh_di_b_lpp_sixth_section_third_h3');
$sixth_section_third_p = get_option('poh_di_b_lpp_sixth_section_third_p');
$sixth_section_image_list = get_option('poh_di_b_lpp_sixth_section_image_list');
?>

<!-- Begin sixth section -->
<section id="poh-di-b-lpp-sixth-section" class="section-padding">
    <span>
        <?php
            if($sixth_section_span) {
                echo $sixth_section_span;
            }
        ?>
    </span>

    <h2>
        <?php
            if($sixth_section_first_h2) {
                echo $sixth_section_first_h2;
            }
        ?>
    </h2>

    <div id="poh-di-b-lpp-sixth-section-card-container">
        <div>
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/process-image1-large.webp" alt="dental implant process step one" width="634">
            <div class="display-flex">
                <h3>
                    <span>1</span>
                    <?php
                        if($sixth_section_first_h3) {
                            echo $sixth_section_first_h3;
                        }
                    ?>
                </h3>
                <p>
                    <?php
                        if($sixth_section_first_p) {
                            echo $sixth_section_first_p;
                        }
                    ?>
                </p>
            </div>
        </div>
        <div>
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/process-image2-large.webp" alt="dental implant process step two" width="301">
            <div class="display-flex">
                <h3>
                    <span>2</span>
                    <?php
                        if($sixth_section_second_h3) {
                            echo $sixth_section_second_h3;
                        }
                    ?>
                </h3>
                <p>
                    <?php
                        if($sixth_section_second_p) {
                            echo $sixth_section_second_p;
                        }
                    ?>
                </p>
            </div>
        </div>
        <div>
            <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/process-image3-large.webp" alt="dental implant process step three" width="301">
            <div class="display-flex">
                <h3>
                    <span>3</span>
                    <?php
                        if($sixth_section_third_h3) {
                            echo $sixth_section_third_h3;
                        }
                    ?>
                </h3>
                <p>
                    <?php
                        if($sixth_section_third_p) {
                            echo $sixth_section_third_p;
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div id="poh-di-b-lpp-sixth-section-financing-container">
        <p>Financing Available with</p>
        <div>
            <?php
                if($sixth_section_image_list) {
                    $urls = explode(';', $sixth_section_image_list);
                    foreach ($urls as $url) {
                        echo '<img src="' . $url . '" alt="financing option logo" width="151">';
                    }
                }
            ?>
        </div>
    </div>
</section>