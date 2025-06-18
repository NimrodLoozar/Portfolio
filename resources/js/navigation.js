// Navigation dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    // Wait for Alpine.js to be ready
    document.addEventListener('alpine:init', () => {
        console.log('Alpine.js is ready!');
    });

    // Function to close all dropdowns when ESC key is pressed
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            // This will trigger Alpine.js to close dropdowns
            document.dispatchEvent(new CustomEvent('close-dropdowns'));
        }
    });

    // Function to close dropdowns when clicking on navigation links
    const navLinks = document.querySelectorAll('[x-data] a[href]');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Close any open dropdowns/mobile menus when navigating
            setTimeout(() => {
                document.dispatchEvent(new CustomEvent('close-dropdowns'));
            }, 100);
        });
    });

    // Function to handle responsive menu behavior
    const mobileMenuButton = document.querySelector('[x-data] button[\\@click="open = ! open"]');
    if (mobileMenuButton) {
        // Close mobile menu when window is resized to desktop size
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 640) { // sm breakpoint
                // Dispatch event to close mobile menu
                document.dispatchEvent(new CustomEvent('close-mobile-menu'));
            }
        });
    }
});

// Global function to programmatically close all dropdowns
window.closeAllDropdowns = function() {
    document.dispatchEvent(new CustomEvent('close-dropdowns'));
};

// Global function to programmatically close mobile menu
window.closeMobileMenu = function() {
    document.dispatchEvent(new CustomEvent('close-mobile-menu'));
};
