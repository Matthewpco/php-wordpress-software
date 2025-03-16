document.addEventListener("DOMContentLoaded", function() {

    const body = document.querySelector('body');
    const close = document.querySelector('.close');
    const mobileNavToggle = document.querySelector('#mobile-nav-toggle');
    const modalWrapper = document.querySelector('.mobile-modal-wrapper');
    const navDropDown = document.querySelectorAll('.mobile-modal-content-menu .mobile-has-submenu');
    const clickableLinks = document.querySelectorAll('.mobile-submenu a');
    const initialFocus = document.querySelector('#mobile-nav-section-header a'); 

    // stop function from bubbling up when a links clicked inside nav drop down
    if (clickableLinks) {
        clickableLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.stopPropagation();
            })
        })
    }

    // when mobile nav toggle is clicked remove hidden clase from mobile modal wrapper
    if (mobileNavToggle) {
        mobileNavToggle.addEventListener('click', function() {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
            initialFocus.focus();
        })
    }
    
    // close modal by re-applying hidden to modal wrapper
    if (close) {
        close.addEventListener('click', function() {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
            mobileNavToggle.focus();
        });
    }

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(e) {
        if (e.target == modalWrapper) {
            modalWrapper.classList.toggle("hidden");
            body.classList.toggle("modal-open");
        }
    })

    // Check if the elements exist
    if (navDropDown) {
        navDropDown.forEach((e) => {
            e.addEventListener('click', function() {
                e.classList.toggle("nav-active");
            })
        })
    }

});