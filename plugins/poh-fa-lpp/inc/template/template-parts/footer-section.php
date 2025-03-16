    <?php 
        $footer_section_p = get_option('poh_fa_lpp_footer_section_p');
    ?>
    
    <!-- Begin footer section -->
    <footer id="poh-fa-lpp-footer-section" class="text-align-center">
        <p>
            <?php
                if($footer_section_p) {
                    echo $footer_section_p;
                }
            ?>
        </p>
    </footer>

    <?php wp_footer(); ?>

	</body>
</html>