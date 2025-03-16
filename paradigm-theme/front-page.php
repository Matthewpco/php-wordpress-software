<?php

/**
 * Example template for how front page should look when finished with all the template parts.
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself.
 * Template name: Homepage
 */

// Get the header section
get_header();
get_template_part('/template-parts/first-section');
get_template_part('/template-parts/second-section');
get_template_part('/template-parts/third-section');
get_template_part('/template-parts/fourth-section');
get_template_part('/template-parts/contact-us-section');
get_footer();