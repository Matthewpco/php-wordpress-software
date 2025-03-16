<?php
    $reviews_section_h2 = get_option('poh_fa_lpp_reviews_section_h2');
    $reviews_section_first_p = get_option('poh_fa_lpp_reviews_section_first_p');
    $reviews_section_first_name = get_option('poh_fa_lpp_reviews_section_first_name');
    $reviews_section_second_p = get_option('poh_fa_lpp_reviews_section_second_p');
    $reviews_section_second_name = get_option('poh_fa_lpp_reviews_section_second_name');
    $reviews_section_third_p = get_option('poh_fa_lpp_reviews_section_third_p');
    $reviews_section_third_name = get_option('poh_fa_lpp_reviews_section_third_name');
    $reviews_section_second_h2 = get_option('poh_fa_lpp_reviews_section_second_h2');
    $reviews_section_video_list = get_option('poh_fa_lpp_reviews_section_video_list');
?>
<!-- Begin Reviews template part -->
<section id="poh-fa-lpp-reviews-section" class="section-padding">

   <h2 class="text-align-center">
        <?php
            if($reviews_section_h2) {
                echo $reviews_section_h2;
            }
        ?>
    </h2>

   <div class="display-flex">

        <div class="one-third-column">
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <p>
                <?php
                    if($reviews_section_first_p) {
                        echo $reviews_section_first_p;
                    }
                ?>
            </p>
            <p>
                <?php
                    if($reviews_section_first_name) {
                        echo $reviews_section_first_name;
                    }
                ?>
            </p>

        </div>

        <div class="one-third-column">
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <p>
                <?php
                    if($reviews_section_second_p) {
                        echo $reviews_section_second_p;
                    }
                ?>
            </p>
            <p>
                <?php
                    if($reviews_section_second_name) {
                        echo $reviews_section_second_name;
                    }
                ?>
            </p>

        </div>

        <div class="one-third-column">
            <span style="color: #FBBC05;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </span>
            <p>
                <?php
                    if($reviews_section_third_p) {
                        echo $reviews_section_third_p;
                    }
                ?>
            </p>
            <p>
                <?php
                    if($reviews_section_third_name) {
                        echo $reviews_section_third_name;
                    }
                ?>
            </p>

        </div>

    </div>

    <h2>
        <?php
            if($reviews_section_second_h2) {
                echo $reviews_section_second_h2;
            }
        ?>
    </h2>
    <div>
        <?php
            ob_start();
            if($reviews_section_video_list) {
                $video_list = explode(';', $reviews_section_video_list);
                for ($x = 0; $x < count($video_list); $x++) {
                    $video = $video_list[$x];
                    ?>
                        <video controls="" width="400px" preload="metadata">
                            <source src="<?php echo $video; ?>#t=0.5" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php
                }
            }
            echo ob_get_clean();
        ?>
    </div>

</section>