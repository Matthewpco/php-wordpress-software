document.addEventListener('DOMContentLoaded', () => {
    const menuButtons = document.querySelectorAll('.has-submenu, .has-nested-menu');
    const topMenuDropdownTrigger = document.querySelector('#top-bar-dropdown');

    if (menuButtons) {
        menuButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Toggle the 'aria-expanded' for accessibility
                const menuButtonsIsExpanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', !menuButtonsIsExpanded);
                // Adding or removing focus causes the menu to show or hide
                if (menuButtonsIsExpanded === true) {
                    button.blur();
                } 
                else {
                    button.focus();
                }
            });
        });
    }

    if (topMenuDropdownTrigger && topMenuDropdownTrigger.hasAttribute('role') && topMenuDropdownTrigger.getAttribute('role') === 'button') {
        topMenuDropdownTrigger.addEventListener('click', function() {
            // Toggle the 'aria-expanded' for accessibility
            const topMenuIsExpanded = topMenuDropdownTrigger.getAttribute('aria-expanded') === 'true';
            topMenuDropdownTrigger.setAttribute('aria-expanded', !topMenuIsExpanded);
            // Adding or removing focus causes the menu to show or hide
            if (topMenuIsExpanded === true) {
                topMenuDropdownTrigger.blur();
            } 
            else {
                topMenuDropdownTrigger.focus();
            }
        });
    }
});


