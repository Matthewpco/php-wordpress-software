<?php
/**
 * Template Name: Search Results
 */

get_header();
get_template_part( 'template-parts/hero-banner-section' );
?>

<!-- 2/3 & 1/3 Set Up -->
<section id="search-page"class="display-flex section-padding">

   <div class="two-thirds-column search-submit-button">
      <?php
      get_search_form();

      global $query_string;
      wp_parse_str( $query_string, $search_query );
      $search = new WP_Query( $search_query );

      if ( have_posts() ) :
      ?>

      <div>
         <?php while ( have_posts() ) : the_post(); ?>

         <h2 class="search-result-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <div class="search-result-excerpt"><?php the_excerpt(); ?></div>
         <?php 

         // ADD to check if a search has started [ the search box is empty ] before displaying the "Read More" button
         if (isset($_GET['s']) && !empty($_GET['s'])): ?>
            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
         <?php endif; ?>

         <?php endwhile; ?>

      </div>

      <?php the_posts_pagination(); ?>

      <?php else : ?>

      <p><?php _e( 'No results found.', 'your-theme' ); ?></p>

      <?php endif; ?>

   </div>

   <div class="one-third-column">
      <?php echo do_shortcode('[paradigm_forms_sidebar] '); ?>
   </div>
   
</section>

<?php get_footer(); ?>