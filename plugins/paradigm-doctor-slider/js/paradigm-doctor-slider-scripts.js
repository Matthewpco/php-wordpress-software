document.addEventListener("DOMContentLoaded", function() {

    // jquery like function for query selector to reduce amount of code
    function $(selector) {
        return document.querySelector(selector);
    }

    // object containing doctor data
    const doctors = {
        'firstDoctor': {
            image: '/wp-content/plugins/paradigm-doctor-slider/media/dr-1.png',
            name: 'Craig Vigliante, MD, DMD',
            description: 'Dr. Vigliante became interested in oral surgery after having double jaw surgery for his open bite. Since then, he’s dedicated himself to showing his patients the highest level of care possible. He’s certified by the American Board of Oral and Maxillofacial Surgeons and holds medical and dental licenses in Virginia.',
            link: '/about/meet-dr-vigliante',
            linkText: 'MEET DR. VIGLIANTE',
            position: 1,
        },
        'secondDoctor': {
            image: '/wp-content/plugins/paradigm-doctor-slider/media/dr-2.png',
            name: 'Dr. Michael Timothy Gocke, DDS',
            description: 'Dr. Michael Timothy Gocke boasts more than 15 years of experience as a board-certified oral surgeon and aesthetic specialist. Dr. Gocke has earned a reputation in the community for successfully removing countless wisdom teeth by consistently prioritizing patient comfort, safety, and care. In addition to extracting wisdom teeth, Dr. Gocke spends much of his time treating dental implant patients and has performed over 10,000 dental implant and related surgeries.',
            link: '/about/meet-dr-gocke',
            linkText: 'MEET DR. GOCKE',
            position: 2,
        },
        'thirdDoctor': {
            image: '/wp-content/plugins/paradigm-doctor-slider/media/dr-3.png',
            name: 'Michael McAdams, DDS',
            description: 'Dr. Michael McAdams, DDS has a true passion for helping patients through oral and maxillofacial surgery. The areas of experience he brings to Virginia Advanced Surgical Arts include complex corrective jaw surgery and facial trauma cases, oral and facial surgery for pediatric patients, and dentialveolar grafting.',
            link: '/about/meet-dr-mcadams',
            linkText: 'MEET DR. MCADAMS',
            position: 3,
        }
    };

    // get the elements
    const imageElement = $('.image-meet-doctor');
    const headingElement = $('.meet-dr-heading');
    const paragraphElement = $('.meet-dr-content');
    const linkElement = $('.meet-dr-link');
    const sidebarImage = $('.sidebar-image-column');
    const buttons = document.querySelectorAll('.meet-dr-switches button');
    const previousButton = $('.previous-dr');
    const nextButton = $('.next-dr');
    let timerId;

    timerId = setInterval(slideTimer, 6000);

    window.onfocus = function() {
        // Only start a new interval if there isn't one already
        if (!timerId) {
            timerId = setInterval(slideTimer, 6000);
        }
    }

    window.onblur = function () {
        clearInterval(timerId);
        // Set timerId to null so we know there's no active interval
        timerId = null;
    };

    function slideTimer() {
        let currentDoctor = getCurrentDoctor();
            let currentDoctorPosition = currentDoctor.position;

            if (currentDoctorPosition == 1) {
                let nextDoctor = doctors.secondDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 2) {
                let nextDoctor = doctors.thirdDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 3) {
                let nextDoctor = doctors.firstDoctor;
                handleSlide(nextDoctor);
            }
    }
    
    function getCurrentDoctor() {
        let currentDoctorSelector = $('.image-meet-doctor');
        let currentDoctor = currentDoctorSelector.style.backgroundImage;

        if (currentDoctor.includes('dr-1')) {
            currentDoctor = doctors.firstDoctor;
        } 
        
        else if (currentDoctor.includes('dr-2')) {
            currentDoctor = doctors.secondDoctor;
        }

        else if (currentDoctor.includes('dr-3')) {
            currentDoctor = doctors.thirdDoctor;
        }

        return currentDoctor;

    }

    // send next doctor to create and update a clone element and pass that to slide left or right based on position
    function handleSlide(nextDoctor) {
        let [wholeSlide, doctorTemplate] = updateClone(nextDoctor);
        let currentDoctor = getCurrentDoctor();

        if (currentDoctor.position < nextDoctor.position) {
            slideLeft(nextDoctor, doctorTemplate, wholeSlide);
        } else {
            slideRight(nextDoctor, doctorTemplate, wholeSlide);
        }
    }

    function slideLeft(doctor, doctorTemplate, wholeSlide) {
        doctorTemplate.classList.add('slide-out-from-right');
        wholeSlide.classList.add('slide-in-from-right');

        doctorTemplate.addEventListener('animationend', () => {
            updateSidebarImage(doctor);
            updateDoctor(doctor); 
            doctorTemplate.classList.remove('slide-out-from-right');
                  
        });

        wholeSlide.addEventListener('animationend', () => {
            wholeSlide.classList.remove('slide-in-from-right');
            wholeSlide.parentNode?.removeChild(wholeSlide);

        });
    }

    function slideRight(doctor, doctorTemplate, wholeSlide) {
        doctorTemplate.classList.add('slide-out-from-left');
        wholeSlide.classList.add('slide-in-from-left');

        doctorTemplate.addEventListener('animationend', () => {
            updateSidebarImage(doctor);
            updateDoctor(doctor); 
            doctorTemplate.classList.remove('slide-out-from-left');    
        });

        wholeSlide.addEventListener('animationend', () => {
            wholeSlide.classList.remove('slide-in-from-left');
            wholeSlide.parentNode?.removeChild(wholeSlide);
        });
    }

    // update content and image
    function updateDoctor(doctor) {
        linkElement.textContent = doctor.linkText;
        imageElement.style.backgroundImage = `url(${doctor.image})`;
        headingElement.textContent = doctor.name;
        paragraphElement.textContent = doctor.description;
        linkElement.href = doctor.link;
    }

    function updateClone(nextDoctor) {
        // create clone of section to then slide in from outside
        const doctorTemplate = $('.template-meet-the-doctor');
        const wholeSlide = doctorTemplate.cloneNode(true);

        // add class and add the element to the dom for updating
        wholeSlide.classList.add('duplicate-image');
        doctorTemplate.appendChild(wholeSlide);

        // get clone elements for updating
        const cloneImageElement = $('.duplicate-image .image-meet-doctor');
        const cloneHeadingElement = $('.duplicate-image .meet-dr-heading');
        const cloneParagraphElement = $('.duplicate-image .meet-dr-content');
        const cloneLinkElement = $('.duplicate-image .meet-dr-link');
        const cloneSidebarImage = $('.duplicate-image .sidebar-image-column');

        // update clone element data
        cloneImageElement.style.backgroundImage = `url(${nextDoctor.image})`;
        cloneHeadingElement.textContent = nextDoctor.name;
        cloneParagraphElement.textContent = nextDoctor.description;
        cloneLinkElement.href = nextDoctor.link;
        cloneLinkElement.textContent = nextDoctor.linkText;

        // update the clone sidebar image
        if (nextDoctor.position === 1) {
            cloneSidebarImage.style.backgroundImage = `url(${doctors.secondDoctor.image})`;
        } else if (nextDoctor.position === 2) {
            cloneSidebarImage.style.backgroundImage = `url(${doctors.thirdDoctor.image})`;
        } else if (nextDoctor.position === 3) {
            cloneSidebarImage.style.backgroundImage = `url(${doctors.firstDoctor.image})`;
        }

        return [wholeSlide, doctorTemplate];
    }

    function updateSidebarImage(doctor) {
        if (doctor.position === 1) {
            sidebarImage.style.backgroundImage = `url(${doctors.secondDoctor.image})`;
        } else if (doctor.position === 2) {
            sidebarImage.style.backgroundImage = `url(${doctors.thirdDoctor.image})`;
        } else if (doctor.position === 3) {
            sidebarImage.style.backgroundImage = `url(${doctors.firstDoctor.image})`;
        }
    }

    // add click event listeners to the doctor buttons
    if (buttons) {
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Get the doctor data
                const doctorId = button.id;
                const nextDoctor = doctors[doctorId];
                handleSlide(nextDoctor);
            });
        });
    }

    // previous button functionality
    if (previousButton) {
        previousButton.addEventListener('click', () => {
            let currentDoctor = getCurrentDoctor();
            let currentDoctorPosition = currentDoctor.position;

            if (currentDoctorPosition == 1) {
                let nextDoctor = doctors.thirdDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 2) {
                let nextDoctor = doctors.firstDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 3) {
                let nextDoctor = doctors.secondDoctor;
                handleSlide(nextDoctor);
            }

        });
    }

    // next button functionality
    if (nextButton) {
        nextButton.addEventListener('click', () => {
            let currentDoctor = getCurrentDoctor();
            let currentDoctorPosition = currentDoctor.position;

            if (currentDoctorPosition == 1) {
                let nextDoctor = doctors.secondDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 2) {
                let nextDoctor = doctors.thirdDoctor;
                handleSlide(nextDoctor);
            }

            else if (currentDoctorPosition == 3) {
                let nextDoctor = doctors.firstDoctor;
                handleSlide(nextDoctor);
            }
        });
    }

    

});