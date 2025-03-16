document.addEventListener('DOMContentLoaded', function() {
    // Check if the screen size is less than 1024px
    if (window.matchMedia('(max-width: 1024px)').matches) {
        // Get the element with the ID 'paradigm-forms-sidebar-container'
        const sidebarContainer = document.querySelector('#paradigm-forms-landing-container');

        // Get the element with the ID 'third-section'
        const thirdSection = document.querySelector('#poh-di-lpp-fourth-section');

        // Check if both elements exist
        if (sidebarContainer && thirdSection) {
            // Append the sidebar container to the fourth section
            thirdSection.appendChild(sidebarContainer);
        } else {
            console.error('One or both elements do not exist.');
        }
    }
});
