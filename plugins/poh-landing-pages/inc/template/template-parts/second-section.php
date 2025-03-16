<!-- Begin second station -->
<section id="second-section" class="section-padding display-flex">
    <div class="two-thirds-column padding-right">

        <div id="second-section-header">
            <h2>
                <?php
                    $second_section_first_h2 = get_option('pohlp_second_section_first_h2');
                    if($second_section_first_h2) {
                        echo $second_section_first_h2;
                    }
                ?>
            </h2>

            <div class="lightbox-trigger-container">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/ruthie-experience.webp" alt="ruthie-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/dorothy-experience.webp" alt="dorothy-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/terry-experience.webp" alt="terry-experience" class="lightbox-trigger">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/kendra-experience.webp" alt="kendra-experience" class="lightbox-trigger">
            </div>

            <div id="lightbox" class="lightbox">
                <span id="close-lightbox">&times;</span>
                <video id="lightbox-video" controls>
                    <p>Your browser does not support the video tag.</p>
                </video>
            </div>


            <p>*Individual Results May Vary</p>
        </div>

        <div id="second-section-body">
            <h2>
                <?php
                    $second_section_second_h2 = get_option('pohlp_second_section_second_h2');
                    if($second_section_second_h2) {
                        echo $second_section_second_h2;
                    }
                ?>
            </h2>
            <p>
                Patients who are missing many teeth can enjoy a brand new, fully functioning smile with the All-on-4 Full Mouth Restoration. This revolutionary procedure involves securing a permanent row of teeth to the upper or lower arch using dental implants. The results of this procedure are predictable and provide patients with long-term solutions.
            <p>
                We have extensive experience providing full arch restoration, which lets us replace multiple teeth using as few as four dental implants. The benefits of this method include:
            </p>
            <ul>
                <?php
                    $second_section_list = get_option('pohlp_second_section_list');
                    if($second_section_list) {
                        $items = explode(';', $second_section_list);
                        foreach ($items as $item) {
                            echo '<li>' . $item . '</li>';
                        }
                    }
                ?>
            </ul>
            <p>
                For our patients in Voorhees, Moorestown and Mullica Hill, New Jersey seeking a new smile that looks, feels, and functions like natural, healthy teeth, we encourage you to contact Optimum Oral Surgery Group. 
            </p>
        </div>

        
        
        <div id="second-section-footer" class="display-flex">

            <h2>
                <?php
                    $second_section_third_h2 = get_option('pohlp_second_section_third_h2');
                    if($second_section_third_h2) {
                        echo $second_section_third_h2;
                    }
                ?>
            </h2>

            <div class="display-flex flex-direction-column align-items-center">
                <p class="color-purple">Single Dental <br> Implant</p>
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/single-implant.webp" alt="single implant" width="250"> 
            </div>

            <div class="display-flex flex-direction-column align-items-center">
                <p class="color-purple">Multiple Dental <br> Implant</p>
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/multiple-implant.webp" alt="multiple implants" width="250">
            </div>

            <div class="display-flex flex-direction-column align-items-center">
                <p class="color-purple">All-on-4 Dental <br> Implant</p>
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/all-on-4-implant.webp" alt="all on 4 implant" width="250">
            </div>
            
        </div>

    </div>

    <div class="one-third-column">
            <?php echo do_shortcode("[paradigm_forms_landing]"); ?>
    </div>
    
</section>