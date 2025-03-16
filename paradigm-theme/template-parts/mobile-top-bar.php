<?php
/**
 * The template for displaying mobile top info bar and nav menu icon
 */
?>
<!-- Begin mobile top bar -->
<section id="mobile-top-bar-section" class="hidden-mobile">

    <div id="mobile-top-bar">
        <a href="/"><button role="none" tabindex="-1">Oral Surgery</button></a>
        <a href="/facial-cosmetic-surgery"><button class="lighter" role="none" tabindex="-1">Facial Cosmetic Surgery</button></a>
    </div>

    <div id="mobile-nav-toggle-section" class="display-flex">

        <div class="one-quarter-column">
            <a href="javascript:void(0);" id="mobile-nav-toggle" aria-label="mobile navigation menu toggle button" role="button">
                <i class="fa fa-bars fa-2xl"></i>
            </a>
        </div>

        <div class="one-half-column">
            <a href="/">
                <img src="/wp-content/uploads/header-logo.webp" alt="site logo" width="240" />
            </a>
        </div>

        <!-- fill in the href attribute for this anchor element with the appropriate phone number -->
        <div class="one-quarter-column">
            <a href="tel:+1-000-000-0000" aria-label="Make a phone call to our office">
                <i class="fa-solid fa-phone"></i>
            </a>
        </div>

    </div>

</section>
<!-- End header top bar -->