<?php
/**
 * Template Name: Landing Page
 */
?>

    <?php
    // Define the directory path of your plugin's templates
    $template_path = plugin_dir_path( __FILE__ ) . 'template-parts/';
    load_template( $template_path . 'header-landing.php' );
    load_template( $template_path . 'first-section.php' );
    load_template( $template_path . 'second-section.php' );
    load_template( $template_path . 'third-section.php' );
    load_template( $template_path . 'fourth-section.php' );
    load_template( $template_path . 'fifth-section.php' );
    load_template( $template_path . 'sixth-section.php' );
    load_template( $template_path . 'seventh-section.php' );
    load_template( $template_path . 'faq.php' );
    load_template( $template_path . 'reviews.php' );
    load_template( $template_path . 'contact-us.php' );
    load_template( $template_path . 'footer-landing.php' );
    ?>
