<?php
/**
 * The template for displaying header navigation
 */
?>
<!-- Begin header navigation -->
<section id="header-nav-section" class="display-flex">

    <div id="header-nav-logo" class="one-fifth-column">
        <a href="/">
            <img src="" width="190" alt="SITE-LOGO"/>
        </a>
    </div>

    <nav id="header-nav" class="three-fifths-column display-flex" aria-label="Main Navigation">
        <ul class="display-flex justify-content-center">
            <li class="has-submenu" tabindex="0" role="button" aria-label="About menu" aria-expanded="false">About<i class="fa-solid fa-chevron-right"></i>
                <ul class="submenu" role="none">
                    <li><a href="/our-office">Our Office</a></li>
                    <li><a href="/">Meet The Doctor</a></li>
                </ul>
            </li>
            <li class="no-submenu"><a href="/periodontal-services">Dental Implants<i class="fa-solid fa-chevron-right"></i></a></li>
            <li class="no-submenu"><a href="/dental-implants">Services<i class="fa-solid fa-chevron-right has-submenu"></i></a></li>
            <li class="has-submenu" tabindex="0" role="button" aria-label="Patient info menu" aria-expanded="false">Patient Info<i class="fa-solid fa-chevron-right"></i>
                <ul class="submenu" role="none">
                    <li><a href="/first-visit">First Visit</a></li>
                    <li><a href="/post-op-care">Post-Op Care</a></li>
                </ul>
            </li>
            <li class="no-submenu"><a href="/referral-forms">Referral Forms<i class="fa-solid fa-chevron-right"></i></a></li>
        </ul>
    </nav>

    <div class="one-fifth-column text-align-right">
        <a href="/contact" tabindex="0">
            <button  tabindex="-1" role="none">REQUEST CONSULTATION</button>
        </a>
    </div>
  
</section><!-- End header navigation -->