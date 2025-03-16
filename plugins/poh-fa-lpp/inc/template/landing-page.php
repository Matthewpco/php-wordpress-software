<?php
/**
 * Template Name: Landing Page
 */
?>

<?php
// Define the directory path of your plugin's templates
$template_path = plugin_dir_path( __FILE__ ) . 'template-parts/';
do_action('poh_fa_lpp_before_header_section');
load_template( $template_path . 'header-section.php' );
do_action('poh_fa_lpp_after_header_section');
load_template( $template_path . 'first-section.php' );
do_action('poh_fa_lpp_after_first_section');
load_template( $template_path . 'second-section.php' );
do_action('poh_fa_lpp_after_second_section');
load_template( $template_path . 'third-section.php' );
do_action('poh_fa_lpp_after_third_section');
load_template( $template_path . 'fourth-section.php' );
do_action('poh_fa_lpp_after_fourth_section');
load_template( $template_path . 'fifth-section.php' );
do_action('poh_fa_lpp_after_fifth_section');
load_template( $template_path . 'sixth-section.php' );
do_action('poh_fa_lpp_after_sixth_section');
load_template( $template_path . 'seventh-section.php' );
do_action('poh_fa_lpp_after_seventh_section');
load_template( $template_path . 'faq-section.php' );
do_action('poh_fa_lpp_after_faq_section');
load_template( $template_path . 'reviews-section.php' );
do_action('poh_fa_lpp_after_reviews_section');
load_template( $template_path . 'contact-section.php' );
do_action('poh_fa_lpp_after_contact_section');
load_template( $template_path . 'footer-section.php' );
do_action('poh_fa_lpp_after_footer_section');
?>
