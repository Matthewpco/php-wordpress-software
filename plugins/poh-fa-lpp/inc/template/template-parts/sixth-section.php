<?php
    $sixth_section_h2 = get_option('poh_fa_lpp_sixth_section_h2');
    $sixth_section_p = get_option('poh_fa_lpp_sixth_section_p');
?>
<!-- Begin sixth section template part -->
<section id="poh-fa-lpp-sixth-section" class="section-padding">
    <div class="one-half-column">
        <div id="sixth-section-content">
            <h2>
                <?php
                    if($sixth_section_h2) {
                        echo $sixth_section_h2;
                    }
                ?>
            </h2>
            <p>
                <?php
                    if($sixth_section_p) {
                        echo $sixth_section_p;
                    }
                ?>
            </p>
        </div>
    </div>

    <img src="/wp-content/plugins/poh-landing-pages/inc/media/bg-technology.webp" width="100%" alt="alt" class="hidden">

</section>