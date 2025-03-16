document.addEventListener("DOMContentLoaded", function() {
    // Check if the viewport width is less than 768 pixels
    if (window.innerWidth < 768) {
        // Event listener for window scroll
        window.onscroll = function() { adjustButtonPositionOnScroll() };
        // Select the button element
        const scrollButton = document.querySelector("#mobile-button-container a");
        // Check if the button exists
        if (scrollButton) {
            // Calculate the position where the button should stick to the bottom
            let stickyPosition = scrollButton.getBoundingClientRect().bottom + window.scrollY;
            function adjustButtonPositionOnScroll() {
                // Check if the user has scrolled past the sticky position
                if (window.scrollY + window.innerHeight >= stickyPosition) {
                    // If so, make the button stick to the bottom of the page
                    scrollButton.style.position = "fixed";
                    scrollButton.style.bottom = "8px";
                    scrollButton.style.zIndex = "99";
                    scrollButton.style.width = "90%";
                } else {
                    // If not, reset the button's position
                    scrollButton.style.position = "initial";
                    scrollButton.style.bottom = "initial";
                }
            }
        }
    }
 });