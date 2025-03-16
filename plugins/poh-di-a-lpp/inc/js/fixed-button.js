document.addEventListener("DOMContentLoaded", function() {
    // Select the button element
    const scrollButton = document.querySelector("#poh-di-a-lpp-first-section-mobile-reviews-bottom > a");

    // Check if the button exists
    if (scrollButton) {
        // Calculate the position where the button should stick to the bottom
        let stickyPosition = scrollButton.getBoundingClientRect().bottom + window.scrollY;

        function adjustButtonPositionOnScroll() {
            // Check if the user has scrolled past the sticky position
            if (window.scrollY + window.innerHeight >= stickyPosition) {
                // If so, make the button stick to the bottom of the page
                scrollButton.style.position = "fixed";
                scrollButton.style.bottom = "0";
            } else {
                // If not, reset the button's position
                scrollButton.style.position = "initial";
                scrollButton.style.bottom = "initial";
            }
        }

        // Event listener for window scroll
        window.onscroll = function() { adjustButtonPositionOnScroll() };
    } 
});