<?php 
    $tenth_section_first_h2 = get_option('poh_di_lpp_tenth_section_first_h2');
    $tenth_section_video = get_option('poh_di_lpp_tenth_section_video');
    $tenth_section_first_p = get_option('poh_di_lpp_tenth_section_first_p');
    $tenth_section_second_p = get_option('poh_di_lpp_tenth_section_second_p');
?>
<!-- Begin tenth section -->
<section id="poh-di-lpp-tenth-section" class="section-padding">
    <div class="two-thirds-column">
        
        <h2>
            <?php
                if ($tenth_section_first_h2) {
                    echo $tenth_section_first_h2;
                }
            ?>
        </h2>

        <video width="320" height="240" id="tenth-section_video" controls="" preload="metadata">
            <source src="<?php
                if ($tenth_section_video) {
                    echo $tenth_section_video;
                }
            ?>#t=0.5" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <p>
            <?php
                if ($tenth_section_first_p) {
                    echo $tenth_section_first_p;
                }
            ?>
        </p>

        <p>
            <?php
                if ($tenth_section_second_p) {
                    echo $tenth_section_second_p;
                }
            ?>
        </p>

    </div>

</section>

<section id="poh-di-lpp-tenth-section-mobile" class="mobile-hidden">
    <div class="two-thirds-column">
        
        <h2>
            <?php
                if ($tenth_section_first_h2) {
                    echo $tenth_section_first_h2;
                }
            ?>
        </h2>

        <video width="320" height="240" id="tenth-section_video" controls="" preload="metadata">
            <source src="<?php
                if ($tenth_section_video) {
                    echo $tenth_section_video;
                }
            ?>#t=0.5" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <p>
            <?php
                if ($tenth_section_first_p) {
                    echo $tenth_section_first_p;
                }
            ?>
        </p>

        <p>
            <?php
                if ($tenth_section_second_p) {
                    echo $tenth_section_second_p;
                }
            ?>
        </p>

        <img src="/wp-content/plugins/poh-di-lpp/inc/media/bg-technology.webp" alt="" width="600">

    </div>

</section>