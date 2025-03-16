document.addEventListener("DOMContentLoaded", function() {

    const body = document.querySelector('body');
    const close = document.querySelector('#poh-di-b-lpp-close-navigation-icon');
    const mobileNavToggle = document.querySelector('#poh-di-b-lpp-mobile-nav-toggle');
    const modalWrapper = document.querySelector('#poh-di-b-lpp-mobile-nav-section');
    const clickableLinks = document.querySelectorAll('#poh-di-b-lpp-mobile-nav-section nav a');

    // stop function from bubbling up when a links clicked inside nav drop down
    if (clickableLinks) {
        clickableLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                modalWrapper.classList.toggle("hidden");
                body.classList.toggle("modal-open");
            })
        })
    }

    // when mobile nav toggle is clicked remove hidden clase from mobile modal wrapper
    if (mobileNavToggle) {
        mobileNavToggle.addEventListener('click', function() {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
        })
    }
    
    // close modal by re-applying hidden to modal wrapper
    if (close) {
        close.addEventListener('click', function() {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
        });
    }

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(e) {
        if (e.target == modalWrapper) {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
        }
    })

});