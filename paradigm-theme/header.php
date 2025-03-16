<?php
/**
 * The header.
 * This is the template that displays all of the <head> section and everything up until main.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!doctype html>
<!-- Begin header section -->
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<header class="sticky">

			<?php 
			get_template_part('/template-parts/header-top-bar'); 
			get_template_part('/template-parts/mobile-top-bar');
			get_template_part('/template-parts/header-navigation');
			get_template_part('/template-parts/mobile-navigation'); 
			?>

		</header><!-- End header section -->