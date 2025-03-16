<?php
$seo_title = get_option('poh_di_a_lpp_seo_title');
$seo_description = get_option('poh_di_a_lpp_seo_description');
$header_img_url = get_option('poh_di_a_lpp_header_img_url');
$header_phone_number = get_option('poh_di_a_lpp_header_phone_number');
?>

<!-- Begin landing page header -->
<!doctype html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            <?php if($seo_title) {echo $seo_title;}?>
        </title>
        <meta name="description" content="<?php if($seo_description) {echo $seo_description;}?>">
        <meta name="robots" content="noindex">
        <?php wp_head(); ?>
    </head>


    <body id="poh-di-a-lpp-body">

        <?php wp_body_open(); ?>

        <header id="poh-di-a-lpp-header" class="display-flex">
            <div class="one-fifth-column display-flex justify-content-flex-end">
                <img src="<?php if($header_img_url) {echo $header_img_url;}?>" alt="landing page logo" width="100" />
            </div>

            <nav id="poh-di-a-lpp-header-navigation" class="three-fifths-column" aria-label="Main Navigation">
                <ul class="display-flex justify-content-center">
                    <li><a href="#poh-di-a-lpp-third-section">Quiz</a></li>
                    <li><a href="#poh-di-a-lpp-fourth-section">Dental Implants</a></li>
                    <li><a href="#poh-di-a-lpp-fifth-section">Implant Types</a></li>
                    <li><a href="#poh-di-a-lpp-sixth-section">Process</a></li>
                    <li><a href="#poh-di-a-lpp-eighth-section">Surgeons</a></li>
                    <li><a href="#poh-di-a-lpp-ninth-section">Testimonials</a></li>
                    <li><a href="#poh-di-a-lpp-tenth-section">FAQs</a></li>
                </ul>
            </nav>

            <div class="one-fifth-column">
                <a href="tel:<?php if($header_phone_number) {echo $header_phone_number;}?>">
                    <button>CALL TO REGAIN YOUR SMILE :&#41;</button>
                </a>
            </div>
            
        </header>
        
        <header id="poh-di-a-lpp-mobile-header">
            <div class="three-fifths-column">
                <img src="<?php if($header_img_url) {echo $header_img_url;}?>" alt="landing page logo" width="229" />
            </div>
            
            <div>
                <a href="javascript:void(0);" id="poh-di-a-lpp-mobile-nav-toggle" aria-label="mobile navigation menu toggle button" role="button">
                    <i class="fa fa-bars fa-2xl"></i>
                </a>
            </div>
            
            <section id="poh-di-a-lpp-mobile-nav-section" class="hidden">
                <div>
                    <a href="javascript:void(0);" id="poh-di-a-lpp-close-navigation-icon" aria-label="close mobile navigation menu button" role="button">×</a>
                        
                    <nav aria-label="Mobile Main Navigation">
                        <ul>
                            <li><a href="#poh-di-a-lpp-third-section">Quiz</a></li>
                            <li><a href="#poh-di-a-lpp-fourth-section">Dental Implants</a></li>
                            <li><a href="#poh-di-a-lpp-fifth-section">Implant Types</a></li>
                            <li><a href="#poh-di-a-lpp-sixth-section">Process</a></li>
                            <li><a href="#poh-di-a-lpp-eighth-section">Surgeons</a></li>
                            <li><a href="#poh-di-a-lpp-ninth-section">Testimonials</a></li>
                            <li><a href="#poh-di-a-lpp-tenth-section">FAQs</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
        </header>