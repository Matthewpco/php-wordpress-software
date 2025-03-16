<?php

/**
 * The template for displaying the homepage.
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself.
 * Template name: Homepage
 */

// Get the header section
get_header();
?>

<!-- Example HTML structure to start templates with -->
<section id="second-section" class="section-padding">

    <div id="second-section-header" class="display-flex" style="gap: 2%">

        <div class="service-card one-third-column">
            <p>test p</p>
            <span>test span</span>
        </div>

        <div class="service-card one-third-column">
            <p>test p</p>
            <span>test span</span>
        </div>

        <div class="service-card one-third-column">
            <p>test p</p>
            <span>test span</span>
        </div>

    </div>

    <div id="second-section-body" class="display-flex">

        <div class="one-half-column">
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <p>
                Paragraph Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

            <ul>
                <li>List item</li>
                <li>List item</li>
                <li>List item</li>
            </ul>
        </div>

        <div class="one-half-column">
            <img src="" alt="test img" />
        </div>

    </div>

</section>

<?php
//get_template_part('/template-parts/second-section');
get_template_part('/template-parts/contact-us-section');
get_footer();