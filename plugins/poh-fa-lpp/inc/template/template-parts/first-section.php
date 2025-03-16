<?php
    $first_section_h1 = get_option('poh_fa_lpp_first_section_h1');
    $first_section_list = get_option('poh_fa_lpp_first_section_list');
    $first_section_cta_url = get_option('poh_fa_lpp_first_section_cta_url');
    $first_section_cta = get_option('poh_fa_lpp_first_section_cta');
    $first_section_footer_reviews = get_option('poh_fa_lpp_first_section_footer_reviews');
    $first_section_footer_img_url = get_option('poh_fa_lpp_first_section_footer_img_url');
    $first_section_footer_img_alt = get_option('poh_fa_lpp_first_section_footer_img_alt');
    $first_section_footer_second_img_url = get_option('poh_fa_lpp_first_section_footer_second_img_url');
    $first_section_footer_second_img_alt = get_option('poh_fa_lpp_first_section_footer_second_img_alt');
    $first_section_footer_third_img_url = get_option('poh_fa_lpp_first_section_footer_third_img_url');
    $first_section_footer_third_img_alt = get_option('poh_fa_lpp_first_section_footer_third_img_alt');
    $first_section_footer_text = get_option('poh_fa_lpp_first_section_footer_text');
?>

<main id="poh-fa-lpp-first-section" class="section-padding">
    <div class="one-half-column">
        <h1>
            <?php 
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>
        <ul>
            <?php
                
                if($first_section_list) {
                    $items = explode(';', $first_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
        <a href="tel: 
            <?php 
                if($first_section_cta_url) {
                    echo $first_section_cta_url;
                }
            ?>
        ">
            <button>
            <?php 
                if($first_section_cta) {
                    echo $first_section_cta;
                }
            ?>
            </button>
        </a>
        
        <div id="poh-fa-lpp-first-section-reviews">
            <span style="color: #FBBC05;">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            </span>
            <span>
                <?php 
                    if($first_section_footer_reviews) {
                        echo $first_section_footer_reviews;
                    }
                ?>
            </span>
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/google-color-logo.webp" width="40px" alt="google-logo" />
        </div>
        <div id="first-section-reviews-bottom">
            <?php    
                if($first_section_footer_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_img_alt) {
                                    echo $first_section_footer_img_alt;
                                }
                            ?>
                        " width="120px" />
                    <?php
                }
            ?>

            <?php    
                if($first_section_footer_second_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_second_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_second_img_alt) {
                                    echo $first_section_footer_second_img_alt;
                                }
                            ?>
                        " width="120px" />
                    <?php
                }
            ?>

            <?php    
                if($first_section_footer_third_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_third_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_third_img_alt) {
                                    echo $first_section_footer_third_img_alt;
                                }
                            ?>
                        " width="120px" />
                    <?php
                }
            ?>
        </div>
        <p>
            <?php    
                if($first_section_footer_text) {
                    echo $first_section_footer_text;
                }
            ?>
        </p>
    </div>
</main>

<main id="poh-fa-lpp-first-section-mobile" class="mobile-hidden">
    <img src="/wp-content/plugins/poh-fa-lpp/inc/media/mobile-first-section-background.webp" width="100%" style="width: 100%;" alt="hero-image" />
    
    <div class="section-padding">
        <h1>
            <?php 
                if($first_section_h1) {
                    echo $first_section_h1;
                }
            ?>
        </h1>
        <ul>
            <?php
                if($first_section_list) {
                    $items = explode(';', $first_section_list);
                    foreach ($items as $item) {
                        echo '<li>' . $item . '</li>';
                    }
                }
            ?>
        </ul>
        <div id="mobile-button-container">
            <a href="tel: 
                <?php 
                    if($first_section_cta_url) {
                        echo $first_section_cta_url;
                    }
                ?>
            ">
                <button>
                    <?php 
                        if($first_section_cta) {
                            echo $first_section_cta;
                        }
                    ?>
                </button>
            </a>
        </div>

        <div>
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <span>
                <?php 
                    if($first_section_footer_reviews) {
                        echo $first_section_footer_reviews;
                    }
                ?>
            </span>
            <img src="/wp-content/plugins/poh-fa-lpp/inc/media/google-color-logo.webp" width="5%" alt="google-logo" />
        </div>
        <div>
            <?php    
                if($first_section_footer_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_img_alt) {
                                    echo $first_section_footer_img_alt;
                                }
                            ?>
                        " width="80px" />
                    <?php
                }
            ?>

            <?php    
                if($first_section_footer_second_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_second_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_second_img_alt) {
                                    echo $first_section_footer_second_img_alt;
                                }
                            ?>
                        " width="80px" />
                    <?php
                }
            ?>

            <?php    
                if($first_section_footer_third_img_url) {
                    ?>
                        <img src=" <?php echo $first_section_footer_third_img_url; ?> " alt="
                            <?php    
                                if($first_section_footer_third_img_alt) {
                                    echo $first_section_footer_third_img_alt;
                                }
                            ?>
                        " width="80px" />
                    <?php
                }
            ?>
        </div>
        <span>
            <?php 
                if($first_section_footer_text) {
                    echo $first_section_footer_text;
                }
            ?>
        </span> 
    </div>
</main>