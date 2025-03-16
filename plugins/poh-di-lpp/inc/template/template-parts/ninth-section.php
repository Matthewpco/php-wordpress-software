<?php 
    $ninth_section_first_h2 = get_option('poh_di_lpp_ninth_section_first_h2');
    $image1 = get_option('poh_di_lpp_ninth_section_image1');
    $image2 = get_option('poh_di_lpp_ninth_section_image2');
    $image3 = get_option('poh_di_lpp_ninth_section_image3');
    $image4 = get_option('poh_di_lpp_ninth_section_image4');
    $image5 = get_option('poh_di_lpp_ninth_section_image5');
    $image6 = get_option('poh_di_lpp_ninth_section_image6');
?>
<!-- Begin ninth section -->
<section id="poh-di-lpp-ninth-section" class="section-padding">
    <div class="two-thirds-column">
        <h2>
            <?php
                if($ninth_section_first_h2) {
                    echo $ninth_section_first_h2;
                }
            ?>
        </h2>
        
        <div id="slideshow-container">

            <div class="go-slides fade">
                <img src="<?php echo $image1; ?>" alt="before and after image">
            </div>

            <div class="go-slides fade">
                <img src="<?php echo $image2; ?>" alt="before and after image">
            </div>

            <div class="go-slides fade">
                <img src="<?php echo $image3; ?>" alt="before and after image">
            </div>

            <div class="go-slides fade">
                <img src="<?php echo $image4; ?>" alt="before and after image">
            </div>

            <div class="go-slides fade">
                <img src="<?php echo $image5; ?>" alt="before and after image">
            </div>

            <div class="go-slides fade">
                <img src="<?php echo $image6; ?>" alt="before and after image">
            </div>

        </div>

        <div id="circle-container">
            <i class="fa-solid fa-angle-left go-nav-arrow" onclick="plusSlides(-1)"></i>
            <span class="circle" onclick="clickCircle(0)"></span>
            <span class="circle" onclick="clickCircle(1)"></span>
            <span class="circle" onclick="clickCircle(2)"></span>
            <span class="circle" onclick="clickCircle(3)"></span>
            <span class="circle" onclick="clickCircle(4)"></span>
            <span class="circle" onclick="clickCircle(5)"></span>
            <i class="fa-solid fa-angle-right go-nav-arrow" onclick="plusSlides(1)"></i>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const gotSlides = document.getElementsByClassName("go-slides");
        const circles = document.getElementsByClassName("circle");
        let goSlideIndex = 1;
        showSlides(goSlideIndex);
        // added to make global reach for onclick="plusSlides..."
        window.plusSlides = function(n) {
            showSlides(goSlideIndex += n);
        }
        function showSlides(n) {
            if (gotSlides.length === 0) return;
            let i;
            if (n > gotSlides.length) {goSlideIndex = 1}    
            if (n < 1) {goSlideIndex = gotSlides.length}
            for (i = 0; i < gotSlides.length; i++) {
                gotSlides[i].style.display = "none";  
                circles[i].classList.remove("active");
            }
            gotSlides[goSlideIndex-1].style.display = "block";  
            circles[goSlideIndex-1].classList.add("active");
        }
        window.clickCircle = function(n) {
            adjustImage(n);
        }
        function adjustImage(n) {
            goSlideIndex = n + 1;
            for (i = 0; i < gotSlides.length; i++) {
                gotSlides[i].style.display = "none";  
                circles[i].classList.remove("active");
            }
            gotSlides[n].style.display = "block";  
            circles[n].classList.add("active");
        }
});
</script>