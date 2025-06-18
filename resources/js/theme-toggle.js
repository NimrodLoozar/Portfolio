// Enhanced Theme toggle functionality
function initThemeToggle() {
    console.log('=== THEME TOGGLE INITIALIZATION ===');
    console.log('Document ready state:', document.readyState);
    console.log('Current URL:', window.location.href);

    // Send initialization log to Laravel
    fetch('/log-theme-event', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            event: 'theme_toggle_init',
            message: 'Enhanced theme toggle script initialized',
            timestamp: new Date().toISOString()
        })
    }).catch(e => console.log('Failed to log to Laravel:', e));

    // Get elements
    const themeToggle = document.getElementById('theme-toggle');
    const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
    const sunIcon = document.getElementById('sun-icon');
    const moonIcon = document.getElementById('moon-icon');
    const mobileSunIcon = document.getElementById('mobile-sun-icon');
    const mobileMoonIcon = document.getElementById('mobile-moon-icon');

    const elementsFound = {
        themeToggle: !!themeToggle,
        mobileThemeToggle: !!mobileThemeToggle,
        sunIcon: !!sunIcon,
        moonIcon: !!moonIcon,
        mobileSunIcon: !!mobileSunIcon,
        mobileMoonIcon: !!mobileMoonIcon
    };

    console.log('Found elements:', elementsFound);

    // Log elements to Laravel
    fetch('/log-theme-event', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            event: 'elements_check',
            message: 'Element availability check',
            data: elementsFound,
            timestamp: new Date().toISOString()
        })
    }).catch(e => console.log('Failed to log elements to Laravel:', e));

    // Check for saved theme preference or default to 'light'
    let currentTheme = localStorage.getItem('theme') || 'light';
    console.log('Current theme from localStorage:', currentTheme);

    // Function to send logs to Laravel
    function logToLaravel(event, message, data = null) {
        fetch('/log-theme-event', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                event: event,
                message: message,
                data: data,
                timestamp: new Date().toISOString()
            })
        }).catch(e => console.log('Failed to log to Laravel:', e));
    }    // Function to update icon visibility with smooth transitions
    function updateIcons(isDark) {
        console.log('=== UPDATING ICONS ===');
        console.log('isDark:', isDark);

        logToLaravel('update_icons', 'Updating icons with transitions', { isDark: isDark });

        // For the new toggle design, we don't need to hide/show icons
        // The CSS transitions handle the visual changes automatically
        // Just ensure the icons have the right opacity and scale
        if (sunIcon && moonIcon) {
            console.log('Icons found - CSS handles transitions automatically');
        } else {
            console.log('Desktop icons not found!');
        }

        if (mobileSunIcon && mobileMoonIcon) {
            console.log('Mobile icons found - CSS handles transitions automatically');
        } else {
            console.log('Mobile icons not found (normal if not present)');
        }

        // Add visual feedback to toggle buttons
        const buttons = [themeToggle, mobileThemeToggle].filter(Boolean);
        buttons.forEach(button => {
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 100);
        });
    }// Function to apply theme with smooth transitions
    function applyTheme(theme) {
        console.log('=== APPLYING THEME ===');
        console.log('Theme to apply:', theme);

        logToLaravel('apply_theme', 'Applying theme with transitions', { theme: theme });

        // Add transition class to body for smooth theme change
        document.body.style.transition = 'all 0.3s ease';

        // Add transition to all elements that might change color
        const elementsToTransition = document.querySelectorAll('*');
        elementsToTransition.forEach(el => {
            if (!el.style.transition) {
                el.style.transition = 'color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease';
            }
        });

        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
            document.body.classList.add('dark');
            console.log('Added dark class to html and body');
            updateIcons(true);

            // Emit custom event for components that need to listen
            window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: 'dark' } }));
        } else {
            document.documentElement.classList.remove('dark');
            document.body.classList.remove('dark');
            console.log('Removed dark class from html and body');
            updateIcons(false);

            // Emit custom event for components that need to listen
            window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: 'light' } }));
        }

        // Store theme preference
        localStorage.setItem('theme', theme);

        console.log('Final document.documentElement classes:', document.documentElement.classList.toString());
        console.log('Final document.body classes:', document.body.classList.toString());

        // Remove temporary transition after animation completes
        setTimeout(() => {
            document.body.style.transition = '';
        }, 300);
    }

    // Apply the current theme on load
    console.log('=== INITIAL THEME APPLICATION ===');
    applyTheme(currentTheme);

    // Function to toggle theme
    function toggleTheme() {
        console.log('=== TOGGLE THEME FUNCTION CALLED ===');

        logToLaravel('toggle_theme_start', 'Toggle theme function called');

        const isDarkMode = document.documentElement.classList.contains('dark');
        console.log('Current dark mode state:', isDarkMode);
        console.log('Current document classes:', document.documentElement.classList.toString());

        if (isDarkMode) {
            console.log('Switching to light mode...');
            currentTheme = 'light';
            localStorage.setItem('theme', 'light');
            applyTheme('light');
            console.log('Switched to light mode');
            logToLaravel('theme_switched', 'Switched to light mode');
        } else {
            console.log('Switching to dark mode...');
            currentTheme = 'dark';
            localStorage.setItem('theme', 'dark');
            applyTheme('dark');
            console.log('Switched to dark mode');
            logToLaravel('theme_switched', 'Switched to dark mode');
        }

        console.log('=== TOGGLE COMPLETE ===');
    }

    // Add event listeners
    if (themeToggle) {
        console.log('=== ADDING EVENT LISTENERS ===');
        console.log('Adding click listener to desktop theme toggle');

        logToLaravel('add_event_listener', 'Adding event listener to desktop theme toggle');

        themeToggle.addEventListener('click', function (e) {
            console.log('=== DESKTOP THEME TOGGLE CLICKED ===');
            console.log('Event object:', e);
            e.preventDefault();
            e.stopPropagation();

            logToLaravel('button_clicked', 'Desktop theme toggle button clicked');

            toggleTheme();
        });

        console.log('Event listeners added to desktop theme toggle');
    } else {
        console.error('=== ERROR: Desktop theme toggle button not found! ===');
        logToLaravel('error', 'Desktop theme toggle button not found');
    }

    if (mobileThemeToggle) {
        console.log('Adding click listener to mobile theme toggle');
        mobileThemeToggle.addEventListener('click', function (e) {
            console.log('=== MOBILE THEME TOGGLE CLICKED ===');
            e.preventDefault();
            e.stopPropagation();

            logToLaravel('mobile_button_clicked', 'Mobile theme toggle button clicked');

            toggleTheme();
        });
    } else {
        console.log('Mobile theme toggle button not found (this is normal if not on mobile)');
    }

    // Global function for testing
    window.testThemeToggle = toggleTheme;
    console.log('Theme toggle initialized. You can test with window.testThemeToggle()');
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initThemeToggle);
} else {
    initThemeToggle();
}

// Also try initializing after a short delay in case there are loading issues
setTimeout(initThemeToggle, 1000);
