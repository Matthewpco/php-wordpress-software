<?php
    $faq_section_h2 = get_option('poh_fa_lpp_faq_section_h2');
    $faq_section_title_list = get_option('poh_fa_lpp_faq_section_title_list');
    $faq_section_description_list = get_option('poh_fa_lpp_faq_section_description_list');
?>
<!-- Begin FAQ template part -->
<section id="poh-fa-lpp-faq-section" class="section-padding">
    <div>
        <h2 class="text-align-center">
            <?php
                if($faq_section_h2) {
                    echo $faq_section_h2;
                }
            ?>
        </h2>
    
        <?php
            ob_start();
            if($faq_section_title_list && $faq_section_description_list) {
                $title_list = explode(';', $faq_section_title_list);
                $description_list = explode(';', $faq_section_description_list);
                for ($x = 0; $x < count($title_list); $x++) {
                    $title = $title_list[$x];
                    $description = $description_list[$x];
                    ?>
                        <div class="accordion-container">
                            <input type="checkbox" id="section<?php echo $x+1; ?>-toggle-1" class="accordion-toggle">
                            <label for="section<?php echo $x+1; ?>-toggle-1" class="accordion-label">
                                <p class="bold accordion-question text-medium"><?php echo $title; ?></p>
                            </label>
                            <div class="accordion-content">

                                <p class="padding-right-10"><?php echo $description; ?></p>
                            </div>
                        </div>
                    <?php
                }
            }
            echo ob_get_clean();
        ?>

    </div>
</section>