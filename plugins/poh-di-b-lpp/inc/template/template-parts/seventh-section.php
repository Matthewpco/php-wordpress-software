<?php
$seventh_section_h2 = get_option('poh_di_b_lpp_seventh_section_h2');
$seventh_section_p = get_option('poh_di_b_lpp_seventh_section_p');
$seventh_section_button = get_option('poh_di_b_lpp_seventh_section_button');
?>

<!-- Begin seventh section -->
<section id="poh-di-b-lpp-seventh-section">

    <div>
        <h2>
            <?php
                if($seventh_section_h2) {
                    echo $seventh_section_h2;
                }
            ?>
        </h2>
        <p>
            <?php
                if($seventh_section_p) {
                    echo $seventh_section_p;
                }
            ?>
        </p>
        <a href="#poh-di-b-lpp-third-section" class="button">
            <?php
                if($seventh_section_button) {
                    echo $seventh_section_button;
                }
            ?>
        </a>
    </div>
    

</section>