<section id="hero-banner-section" class="display-flex" >
    <div class="two-thirds-column">
        <?php
            $full_url = get_permalink();
            $parsed_url = parse_url($full_url);
            $url_path = $parsed_url['path'];
            $formatted_path = substr($url_path, 0, -1);
            $formatted_path = str_replace('-', ' ', $formatted_path);
            $formatted_path = str_replace('/', ' / ', $formatted_path);
            $formatted_path = ucwords($formatted_path);
            echo '<p><i class="fa-solid fa-house"></i>' . $formatted_path . '</p>';
        ?>
        <h1><?php the_title(); ?></h1>
    </div>
    
    <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('full');
        }
    ?>

</section>