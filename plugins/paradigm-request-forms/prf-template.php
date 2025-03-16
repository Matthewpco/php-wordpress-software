<?php
/***
Template Name: PRF Template
***/

// Start a session
if (!session_id()) {
	session_start();
}

?>
<!doctype html>
<!-- Begin header section -->
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="robots" content="noindex, nofollow" />
		<?php wp_head(); ?>
	</head>

	<body id="prf-body" <?php body_class(); ?>>
	<?php wp_body_open(); ?>

		<header id="prf-template">
			<h1>Paradigm Website Request Form</h1>
		</header><!-- End header section -->

		<?php echo do_shortcode('[paradigm_request_form] '); ?>

		<?php wp_footer(); ?>

	</body>
</html>