<?php
/*
Template Name: Child Page Template
*/
?>

<?php
get_header(); // This function will include the header.php file
get_template_part( 'template-parts/hero-banner-section' );

if (have_posts()) : // Check if there's any post
    while (have_posts()) : the_post(); // Iterate through the posts
?>
<section id="child-page-template" class="display-flex section-padding">
    <div class="post two-thirds-column">
        <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
        <div class="entry">
            <?php the_content(); // This function will fetch the content of the page ?>
        </div>
    </div>


    <?php
        endwhile;
    endif;

    get_sidebar(); // This function will include the sidebar.php file
    ?>

</section>

<!-- Template Parts -->
<?php //get_template_part( 'template-parts/home-testimonials' ); ?>

<?php
get_footer(); // This function will include the footer.php file
?>