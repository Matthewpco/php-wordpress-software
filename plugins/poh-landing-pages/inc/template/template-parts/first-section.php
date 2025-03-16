<main id="first-section" class="section-padding">
    <div class="one-half-column">
        <h1>
            <?php 
                $first_section_h1 = get_option('pohlp_first_section_h1');
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>
        <ul>
            <?php
                $first_section_list = get_option('pohlp_first_section_list');
                if($first_section_list) {
                    $items = explode(';', $first_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
        <a href="tel: 6163690360">
            <button>
            <?php 
                $first_section_cta = get_option('pohlp_first_section_cta');
                if($first_section_cta) {
                    echo $first_section_cta;
                }
            ?>
            </button>
        </a>

        <p class="text-small">Consultation is included in treatment</p>
        
        <div class="template-reviews-stars">
            <span style="color: #FBBC05;">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            </span>
            <span>1900+ Five stars Reviews</span>
            <img src="/wp-content/plugins/poh-landing-pages/inc/media/google-color-logo.webp" width="40px" alt="google-logo" />
        </div>
        <div style="margin-top: 5%;">
            <img src="/wp-content/plugins/poh-landing-pages/inc/media/proceed-finance-logo.webp" alt="proceed-finance-logo" width="40px" />
            <img src="/wp-content/plugins/poh-landing-pages/inc/media/care-credit-logo.webp" alt="care-credit-logo" width="40px" />
        </div>
        <p class="text-small">Affordable Monthly Payment Options as low as $300 per month* *Depends on credit score and loan term selected</p>
    </div>
</main>

<main id="first-section-mobile" class="hidden">
    <img src="/wp-content/plugins/poh-landing-pages/inc/media/mobile-first-section-background.webp" width="100%" style="width: 100%;" alt="hero-image" />
    
    <div class="section-padding">
        <h1>
            <?php 
                $first_section_h1 = get_option('pohlp_first_section_h1');
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>
        <ul>
            <?php
                $first_section_list = get_option('pohlp_first_section_list');
                if($first_section_list) {
                    $items = explode(';', $first_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
        <a href="tel: 6163690360">
            <button>
                <?php 
                    $first_section_cta = get_option('pohlp_first_section_cta');
                    if($first_section_cta) {
                        echo $first_section_cta;
                    }
                ?>
            </button>
        </a>

        <div>
            <span>Consultation is included in treatment.</span>
        </div>

        <div>
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <span>849 Total Reviews</span>
            <img src="/wp-content/plugins/poh-landing-pages/inc/media/google-color-logo.webp" width="5%" alt="google-logo" />

            </div>
            <div>
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/proceed-finance-logo.webp" alt="proceed-finance-logo" width="40px" />
                <img src="/wp-content/plugins/poh-landing-pages/inc/media/care-credit-logo.webp" alt="care-credit-logo" width="40px" />
            </div>
            <span>Affordable Monthly Payment Options as low as $300 per month* *Depends on credit score and loan term selected</span>
        

        
    </div>
</main>