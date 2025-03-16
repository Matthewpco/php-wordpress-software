
<?php
$first_section_h1 = get_option('poh_di_b_lpp_first_section_h1');
$first_section_button = get_option('poh_di_b_lpp_first_section_button');
$first_section_number_reviews = get_option('poh_di_b_lpp_first_section_number_reviews');
$first_section_image_list = get_option('poh_di_b_lpp_first_section_image_list');
$first_section_small_text = get_option('poh_di_b_lpp_first_section_small_text');
?>

<!-- Begin first section -->
<main id="poh-di-b-lpp-first-section" class="section-padding">
    <div class="one-half-column">
        <h1>            
            <?php
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>

        <a href="#poh-di-b-lpp-third-section">
            <button>
                <?php
                    if($first_section_button) {
                        echo $first_section_button;
                    }
                ?>
            </button>
        </a>
        
        <div id="poh-di-b-lpp-first-section-reviews">
            <span>
                Trusted by 
                <?php
                    if($first_section_number_reviews) {
                        echo $first_section_number_reviews;
                    }
                ?>
            </span>
            
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            
            <i class="fa-brands fa-google"></i>
        </div>

        <div id="poh-di-b-lpp-first-section-reviews-bottom">
            <p>Financing Available with:</p>
            <?php
                if($first_section_image_list) {
                    $urls = explode(';', $first_section_image_list);
                    foreach ($urls as $url) {
                        echo '<img src="' . $url . '" alt="financing option logo" width="113">';
                    }
                }
            ?>
        </div>

        <p>
            <?php
                if($first_section_small_text) {
                    echo $first_section_small_text;
                }
            ?>
        </p>
    </div>
    
</main>

<main id="poh-di-b-lpp-first-section-mobile" class="mobile-hidden">
    
    <div class="section-padding">
        <h1>            
            <?php
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>

        <a href="#poh-di-b-lpp-third-section">
            <button>
                <?php
                    if($first_section_button) {
                        echo $first_section_button;
                    }
                ?>
            </button>
        </a>
        
        <div id="poh-di-b-lpp-first-section-mobile-reviews">
            <span>
                Trusted by 
                <?php
                    if($first_section_number_reviews) {
                        echo $first_section_number_reviews;
                    }
                ?>
            </span>
            
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            
            <i class="fa-brands fa-google"></i>
        </div>
    </div>
    <img src="/wp-content/plugins/poh-di-b-lpp/inc/media/first-section-mobile.webp" width="375" alt="mobile hero section image" />
    <div id="poh-di-b-lpp-first-section-mobile-reviews-bottom">
        <p>Financing Available with:</p>
        <?php
            if($first_section_image_list) {
                $urls = explode(';', $first_section_image_list);
                foreach ($urls as $url) {
                    echo '<img src="' . $url . '" alt="financing option logo" width="113">';
                }
            }
        ?>
        <p id="poh-di-b-lpp-first-section-mobile-small-text">
            <?php if($first_section_small_text) {echo $first_section_small_text;}?>
        </p>
    </div>
</main>
