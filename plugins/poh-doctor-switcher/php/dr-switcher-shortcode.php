<?php
// Function to handle the shortcode
function poh_doctor_switcher_shortcode() {

    $selected_template = get_option('poh_selected_template');

    switch ($selected_template) {
        case "omsa":
            $image_urls = get_option('poh_doctor_switcher_image_urls');
            $image_urls_array = explode(';', $image_urls);
            $dr_names = get_option('poh_doctor_switcher_dr_names');
            $dr_names_array = explode(';', $dr_names);
            $dr_descriptions = get_option('poh_doctor_switcher_dr_descriptions');
            $dr_descriptions_array = explode(';', $dr_descriptions);
            $dr_button_names = get_option('poh_doctor_switcher_dr_button_names');
            $dr_button_names_array = explode(';', $dr_button_names);
            $learn_more_urls = get_option('poh_doctor_switcher_learn_more_urls');
            $learn_more_urls_array = explode(';', $learn_more_urls);
    
            ob_start();
            ?>
    
            <section id="poh-doctor-switcher">
                <div class="poh-doctor-switcher-slide-container"></div>
            </section>
    
            <script>
                document.addEventListener("DOMContentLoaded", function() {
    
                    const image_urls_array = <?php echo json_encode($image_urls_array); ?>;
                    const dr_names_array = <?php echo json_encode($dr_names_array); ?>;
                    const dr_descriptions_array = <?php echo json_encode($dr_descriptions_array); ?>;
                    const dr_button_names_array = <?php echo json_encode($dr_button_names_array); ?>;
                    const learn_more_urls_array = <?php echo json_encode($learn_more_urls_array); ?>;
    
                    const leftArrow = `<i class="fa-solid fa-arrow-left poh-doctor-switcher-left-arrow"></i>`;
                    const rightArrow = `<i class="fa-solid fa-arrow-right poh-doctor-switcher-right-arrow"></i>`;
                    const headerForOmsa = `<h2>Meet The Doctors</h2>
                                        <p>Combined with the unparalleled experience of our oral surgeons, our empathy and compassion set our practice apart. Our expertise in oral and maxillofacial surgery, complemented by our state-of-the-art operating rooms, provides our patients with a safe, comfortable environment to undergo their procedure. All our doctors administer IV sedation so the patient can sleep through the procedure.</p>
                                        <div class="poh-doctor-switcher-divider"></div>`;
                
                    const getOmsaDrNameHeader = name => {
                        return `<h3>${name}</h3>`;
                    }
    
                    const getLearnMoreLink = index => {
                        return `<a class="poh-doctor-switcher-learn-more-link" href="${learn_more_urls_array[index]}">Learn More<i class="fa-solid fa-arrow-right"></i></a>`;
                    }
    
                    const slidesContainer = document.querySelector(".poh-doctor-switcher-slide-container");
    
                    dr_names_array.forEach((doctorsName, doctorsIndex) => {
                        let buttonList = [];
                        dr_button_names_array.forEach((buttonName, buttonIndex) => {
                            // Create a new button element
                            const button = document.createElement('button');
                            button.textContent = buttonName;
    
                            // Add the active class if the index matches
                            if (doctorsIndex === buttonIndex) {
                                button.classList.add('poh-doctor-switcher-active');
                            }
    
                            // Collect the buttons in an array
                            buttonList.push(button.outerHTML);
                        });
                        const slide = document.createElement('div');
                        slide.classList.add('poh-doctor-switcher-slide');
                        slide.innerHTML = `
                        ${leftArrow}
                        ${rightArrow}
                        
                        <div class="poh-doctor-switcher-dr-image" style="background-image: url('${image_urls_array[doctorsIndex]}')"></div>
                        <div class="display-flex flex-direction-column">
                        
                            ${headerForOmsa}
                            
                            ${getOmsaDrNameHeader(doctorsName)}
    
                            <p class="poh-doctor-switcher-description">${dr_descriptions_array[doctorsIndex]}</p>
    
                            ${getLearnMoreLink(doctorsIndex)}
    
                            <div class="poh-doctor-switcher-button-container">
                                ${buttonList.join('')}
                            </div>
                        </div>
                        `;
                        slidesContainer.appendChild(slide)
                    });    
    
                    const slides = document.querySelectorAll('.poh-doctor-switcher-slide');
                    let currentSlide = 0;
                    let firstLoop = true;
                    const animationTime = slides.length * .50;
    
                    function slideLeft() {
                        clearInterval(timerId);
                        const previousSlide = currentSlide;
                        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                        if (currentSlide === slides.length - 1 && previousSlide === 0) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        timerId = setInterval(slideRight, 6000); 
                    }
    
                    function slideRight() {
                        clearInterval(timerId);
                        const previousSlide = currentSlide;
                        currentSlide = (currentSlide + 1) % slides.length;
                        if (currentSlide === 0 && previousSlide === slides.length - 1) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        if (firstLoop) {
                            slidesContainer.style.transform = `translateX(-100%)`;
                            firstLoop = false;
                        } else {
                            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                        timerId = setInterval(slideRight, 6000);
                    }
    
                    let timerId = setInterval(slideRight, 6000);
    
                    window.onfocus = function() {
                        if (!timerId) {
                            timerId = setInterval(slideRight, 6000);
                        }
                    }
    
                    window.onblur = function() {
                        clearInterval(timerId);
                        timerId = null;
                    };
    
                    const leftArrows = document.querySelectorAll(".poh-doctor-switcher-left-arrow");
                    const rightArrows = document.querySelectorAll(".poh-doctor-switcher-right-arrow");
    
                    leftArrows.forEach(arrow => {
                        firstLoop = false;
                        arrow.addEventListener('click', slideLeft);
                    });
    
                    rightArrows.forEach(arrow => {
                        firstLoop = false;
                        arrow.addEventListener('click', slideRight);
                    });
    
                    function slideToPosition(position) {
                        clearInterval(timerId);
                        if ((position === 0 && currentSlide === slides.length - 1) || (position === slides.length - 1 && currentSlide === 0)) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        if (position >= 0 && position < slides.length) {
                            currentSlide = position;
                            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                        timerId = setInterval(slideRight, 6000);
                    }   
    
                    const buttons = document.querySelectorAll(".poh-doctor-switcher-button-container button");
                    buttons.forEach((button, buttonIndex) => {
                        if (button.classList.contains("poh-doctor-switcher-active") === false) {
                            button.addEventListener('click', () => {
                                slideToPosition(buttonIndex % slides.length);
                            });
                        }
                    });
    
                });
            </script>
    
            <?php
            return ob_get_clean();
            break;
        case "vasa":
            $image_urls = get_option('poh_doctor_switcher_image_urls');
            $image_urls_array = explode(';', $image_urls);
            $dr_names = get_option('poh_doctor_switcher_dr_names');
            $dr_names_array = explode(';', $dr_names);
            $dr_descriptions = get_option('poh_doctor_switcher_dr_descriptions');
            $dr_descriptions_array = explode(';', $dr_descriptions);
            $dr_button_names = get_option('poh_doctor_switcher_dr_button_names');
            $dr_button_names_array = explode(';', $dr_button_names);
            $learn_more_urls = get_option('poh_doctor_switcher_learn_more_urls');
            $learn_more_urls_array = explode(';', $learn_more_urls);
            $divider_image_url = get_option('poh_doctor_switcher_divider_image_url');
            $sidebar_image_url = get_option('poh_doctor_switcher_sidebar_image_url');
    
            ob_start();
            ?>
    
            <section id="poh-doctor-switcher">
                <div class="poh-doctor-switcher-slide-container"></div>
            </section>
    
            <script>
                document.addEventListener("DOMContentLoaded", function() {
    
                    const image_urls_array = <?php echo json_encode($image_urls_array); ?>;
                    const dr_names_array = <?php echo json_encode($dr_names_array); ?>;
                    const dr_descriptions_array = <?php echo json_encode($dr_descriptions_array); ?>;
                    const dr_button_names_array = <?php echo json_encode($dr_button_names_array); ?>;
                    const learn_more_urls_array = <?php echo json_encode($learn_more_urls_array); ?>;
                    const divider_image_url = <?php echo json_encode($divider_image_url); ?>;
                    const sidebar_image_url = <?php echo json_encode($sidebar_image_url); ?>;
    
                    const leftArrow = `<i class="fa-solid fa-arrow-left poh-doctor-switcher-left-arrow"></i>`;
                    const rightArrow = `<i class="fa-solid fa-arrow-right poh-doctor-switcher-right-arrow"></i>`;
                    const sidebarImage = `<img src="${sidebar_image_url}" alt="" class="poh-doctor-switcher-sidebar-image" width="100">`;
                    const dividerImage = `<img src="${divider_image_url}" class="poh-doctor-switcher-divider-image" width="300" height="20" alt="">`;
    
                    const getVasaDrNameHeader = name => {
                        return `<h2><span>Meet Doctor</span>${name}</h2>`;
                    }
    
                    const getDrButton = index => {
                        return `<a href="${learn_more_urls_array[index]}"><button class="poh-doctor-switcher-learn-more-button">${"MEET " + dr_button_names_array[index]}</button></a>`;
                    }
    
                    const slidesContainer = document.querySelector(".poh-doctor-switcher-slide-container");
    
                    dr_names_array.forEach((doctorsName, doctorsIndex) => {
                        let buttonList = [];
                        dr_button_names_array.forEach((buttonName, buttonIndex) => {
                            // Create a new button element
                            const button = document.createElement('button');
                            button.textContent = buttonName;
    
                            // Add the active class if the index matches
                            if (doctorsIndex === buttonIndex) {
                                button.classList.add('poh-doctor-switcher-active');
                            }
    
                            // Collect the buttons in an array
                            buttonList.push(button.outerHTML);
                        });
                        const slide = document.createElement('div');
                        slide.classList.add('poh-doctor-switcher-slide');
                        slide.innerHTML = `
                        
                        <div class="poh-doctor-switcher-dr-image" style="background-image: url('${image_urls_array[doctorsIndex]}')"></div>
                        <div class="display-flex flex-direction-column">
    
                            ${getVasaDrNameHeader(doctorsName)}
    
                            ${dividerImage}
    
                            <p class="poh-doctor-switcher-description">${dr_descriptions_array[doctorsIndex]}</p>
    
                            ${getDrButton(doctorsIndex)}
    
                            <div class="poh-doctor-switcher-button-container">
                                ${leftArrow}
                                ${buttonList.join('')}
                                ${rightArrow}
                            </div>
                        </div>
                        ${sidebarImage}
                        `;
                        slidesContainer.appendChild(slide)
                    });    
    
                    const slides = document.querySelectorAll('.poh-doctor-switcher-slide');
                    let currentSlide = 0;
                    let firstLoop = true;
                    const animationTime = slides.length * .50;
    
                    function slideLeft() {
                        clearInterval(timerId);
                        const previousSlide = currentSlide;
                        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                        if (currentSlide === slides.length - 1 && previousSlide === 0) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        timerId = setInterval(slideRight, 6000); 
                    }
    
                    function slideRight() {
                        clearInterval(timerId);
                        const previousSlide = currentSlide;
                        currentSlide = (currentSlide + 1) % slides.length;
                        if (currentSlide === 0 && previousSlide === slides.length - 1) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        if (firstLoop) {
                            slidesContainer.style.transform = `translateX(-100%)`;
                            firstLoop = false;
                        } else {
                            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                        timerId = setInterval(slideRight, 6000);
                    }
    
                    let timerId = setInterval(slideRight, 6000);
    
                    window.onfocus = function() {
                        if (!timerId) {
                            timerId = setInterval(slideRight, 6000);
                        }
                    }
    
                    window.onblur = function() {
                        clearInterval(timerId);
                        timerId = null;
                    };
    
                    const leftArrows = document.querySelectorAll(".poh-doctor-switcher-left-arrow");
                    const rightArrows = document.querySelectorAll(".poh-doctor-switcher-right-arrow");
    
                    leftArrows.forEach(arrow => {
                        firstLoop = false;
                        arrow.addEventListener('click', slideLeft);
                    });
    
                    rightArrows.forEach(arrow => {
                        firstLoop = false;
                        arrow.addEventListener('click', slideRight);
                    });
    
                    function slideToPosition(position) {
                        clearInterval(timerId);
                        if ((position === 0 && currentSlide === slides.length - 1) || (position === slides.length - 1 && currentSlide === 0)) {
                            slidesContainer.style.transition = `transform ${animationTime}s ease-in-out`;
                        } else {
                            slidesContainer.style.transition = 'transform .75s ease-in-out';
                        }
                        if (position >= 0 && position < slides.length) {
                            currentSlide = position;
                            slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                        }
                        timerId = setInterval(slideRight, 6000);
                    }   
    
                    const buttons = document.querySelectorAll(".poh-doctor-switcher-button-container button");
                    buttons.forEach((button, buttonIndex) => {
                        if (button.classList.contains("poh-doctor-switcher-active") === false) {
                            button.addEventListener('click', () => {
                                slideToPosition(buttonIndex % slides.length);
                            });
                        }
                    });
    
                });
            </script>
    
            <?php
            return ob_get_clean();
            break;
        case "cboms":
            $image_urls = get_option('poh_doctor_switcher_image_urls');
            $image_urls_array = explode(';', $image_urls);
            $dr_names = get_option('poh_doctor_switcher_dr_names');
            $dr_names_array = explode(';', $dr_names);
            $dr_descriptions = get_option('poh_doctor_switcher_dr_descriptions');
            $dr_descriptions_array = explode(';', $dr_descriptions);
            $learn_more_urls = get_option('poh_doctor_switcher_learn_more_urls');
            $learn_more_urls_array = explode(';', $learn_more_urls);
    
            ob_start();
            ?>
    
            <div id="poh-doctor-switcher-cards-container">
                
            </div>
    
            <script>
                document.addEventListener("DOMContentLoaded", function() {
    
                    const image_urls_array = <?php echo json_encode($image_urls_array); ?>;
                    const dr_names_array = <?php echo json_encode($dr_names_array); ?>;
                    const dr_descriptions_array = <?php echo json_encode($dr_descriptions_array); ?>;
                    const learn_more_urls_array = <?php echo json_encode($learn_more_urls_array); ?>;
    
                    const cardsContainer = document.querySelector("#poh-doctor-switcher-cards-container");
    
                    dr_names_array.forEach((doctorsName, doctorsIndex) => {
    
                        const card = document.createElement('div');
                        card.classList.add('poh-doctor-switcher-card');
                        card.innerHTML = `
                        
                        <img src="${image_urls_array[doctorsIndex]}" alt="${doctorsName}" width="236" height="236">
    
                        <h3>${doctorsName}</h3>
                        <p>${dr_descriptions_array[doctorsIndex]}</p>
                        <a href="${learn_more_urls_array[doctorsIndex]}"><button class="white-button">LEARN MORE</button></a>
                        
                        `;
                        cardsContainer.appendChild(card)
                    });    
    
                });
            </script>
    
            <?php
            return ob_get_clean();
            break;
    } 
}
add_shortcode('poh_doctor_switcher', 'poh_doctor_switcher_shortcode');