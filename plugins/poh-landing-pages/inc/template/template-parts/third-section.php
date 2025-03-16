<!-- Begin third station -->
<section id="third-section" class="section-padding">
    <div class="two-thirds-column padding-right">
        <h2 class="color-white">
            <?php
                $third_section_first_h2 = get_option('pohlp_third_section_first_h2');
                if($third_section_first_h2) {
                    echo $third_section_first_h2;
                }
            ?>
        </h2>
        <div class="display-flex">
            <div class="one-half-column">        
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/cutting-edge-icon.webp" width="40px" />
                <p class="bold color-white">Cutting-Edge Technology</p>
                <p class="color-white">We lead with innovation, investing in the latest dental tech.</p>
            </div>

            <div class="one-half-column"> 
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/well-being-icon.webp" width="40px" />
                <p class="bold color-white">Your Well-being</p>
                <p class="color-white">Your comfort and satisfaction are our priorities.</p>
            </div>
        </div>
                
        <div class="display-flex">
            <div class="one-half-column">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/check-icon.webp" width="40px" />
                <p class="bold color-white">Proven Success</p>
                <p class="color-white">Unmatched success rates ensure your smile is in good hands.</p>
            </div>

            <div class="one-half-column">
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/success-icon.webp" width="40px" />
                <p class="bold color-white">Constant Improvement</p>
                <p class="color-white">Our elite surgeons stay updated to enhance patient care.</p>
            </div>
        </div>
    </div>
</section>