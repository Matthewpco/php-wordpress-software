<?php
/*
Template Name: Blog
*/
?>

<?php
get_header(); 
get_template_part( 'template-parts/hero-banner-section' );
?>
<section id="blog-template">

    <div id="blog-body" class="display-flex flex-wrap section-padding">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => 6,
            'paged' => $paged
        );
        $custom_query = new WP_Query($args);
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="one-third-column">
                <div class="post">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $custom_query->max_num_pages
        ));
        ?>
    </div>
</section>

<?php get_footer(); ?>