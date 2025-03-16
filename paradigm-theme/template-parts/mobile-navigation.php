<?php
/**
 * The template for displaying mobile navigation
 */
?>
<!-- Begin mobile navigation -->
<section id="mobile-nav-section" class="mobile-modal-wrapper hidden">

    <div class="mobile-modal-content">

        <div id="mobile-nav-section-header" class="display-flex">

            <div class="four-fifths-column">
                <a href="/">
                    <img src="/wp-content/uploads/header-logo.webp" width="190" alt="site logo" class="mobile-modal-logo"/>
                </a>
            </div>

            <div class="one-fifth-column text-align-center">
                <a href="javascript:void(0);" class="close" aria-label="close mobile navigation menu button" role="button">&times;</a>
            </div>

        </div>

        <div id="mobile-nav-section-body" class="mobile-modal-content-menu">
            <nav aria-label="Main Navigation">
                <ul class="display-flex flex-direction-column">
                    <li class="mobile-has-submenu" tabindex="0" role="button" aria-label="About menu">About<i class="fa-solid fa-chevron-down"></i>
                        <ul class="mobile-submenu" role="none">
                            <li><a href="/our-office">Our Office</a></li>
                            <li><a href="/meet-the-doctor">Meet Dr. Sabra</a></li>
                        </ul>
                    </li>
                    <li class="no-submenu"><a href="/periodontal-services" >Periodontal Services</a></li>
                    <li class="no-submenu"><a href="/dental-implants">Dental Implants</a></li>
                    <li class="mobile-has-submenu" tabindex="0" role="button" aria-label="Patient info menu">Patient Info<i class="fa-solid fa-chevron-down"></i>
                        <ul class="mobile-submenu" role="none">
                            <li><a href="/first-visit">First Visit</a></li>
                            <li><a href="/post-op-instructions">Post-Op Instructions</a></li>
                        </ul>
                    </li>
                    <li class="no-submenu"><a href="/referral-forms">Referral Forms</a></li>
                </ul>
            </nav>
        </div>

        <div id="mobile-nav-section-footer">

            <a href="/contact">
                <i class="fa-solid fa-location-dot"></i>Locations
            </a>
            <br>
            <!-- fill in the href attribute for this anchor element with the appropriate phone number -->
            <a href="tel:+1-000-000-0000" aria-label="Make a phone call to our office">
                <i class="fa-solid fa-phone"></i>000-000-0000
            </a>
            <br>
            <a href="/">
                <i class="fa-solid fa-clipboard"></i>Patient Portal / Forms
            </a>
            <a href="/contact" tabindex="0">
                <button tabindex="-1" role="none"><i class="fa-solid fa-calendar-days"></i>REQUEST CONSULTATION</button>
            </a>

        </div>

    </div>

</section><!-- End mobile navigation -->