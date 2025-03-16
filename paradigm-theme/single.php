<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Paradigm-Oral-Health
 */

get_header();

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); 
			get_template_part( 'template-parts/hero-banner-section' );
			?>

			<article <?php post_class("blog-singles-main display-flex section-padding"); ?> id="post-<?php the_ID(); ?>">

				<div class="blog-singles two-thirds-column">
					<header class="entry-header">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						
						?>
					</header>

					<div class="entry-content">
						<?php
						the_content();
						?>
					</div>
				</div>


				<?php get_sidebar(); ?>


			</article>

			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'paradigm-oral-health' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'paradigm-oral-health' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
