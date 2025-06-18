// Laravel project: \resources\js\theme-toggle.js
// Simple dark mode toggle functionality

console.log('🔄 Theme toggle script loaded!');

function initThemeToggle() {
  console.log('🔄 Initializing theme toggle...');

  // Look for both ID and class selectors to be flexible
  const toggleButtons = document.querySelectorAll('#theme-toggle, .theme-toggle, [data-theme-toggle]');
  console.log('🔍 Found toggle buttons:', toggleButtons.length);

  if (toggleButtons.length === 0) {
    console.error('❌ No theme toggle buttons found!');
    // Let's also log what elements exist
    console.log('🔍 All elements with theme-toggle id:', document.querySelectorAll('#theme-toggle'));
    console.log('🔍 All elements with data-theme-toggle:', document.querySelectorAll('[data-theme-toggle]'));
    return;
  }

  toggleButtons.forEach((toggleButton, index) => {
    console.log(`🔄 Processing toggle button ${index + 1}:`, toggleButton);

    // Use more flexible selectors for icons
    const darkIcon = toggleButton.querySelector('#theme-toggle-dark-icon');
    const lightIcon = toggleButton.querySelector('#theme-toggle-light-icon');

    console.log('🌙 Dark icon found:', !!darkIcon, darkIcon);
    console.log('☀️ Light icon found:', !!lightIcon, lightIcon);

    if (!darkIcon || !lightIcon) {
      console.error('❌ Icons not found for toggle button:', toggleButton);
      // Let's see what children the button has
      console.log('🔍 Button children:', toggleButton.children);
      return;
    }

    // Set initial state based on current dark mode
    updateIcons();

    // Remove previous event listeners if any
    toggleButton.onclick = null;

    // Add click event handler to toggle button
    console.log('🔗 Adding click event listener to button');
    toggleButton.addEventListener('click', function (e) {
      e.preventDefault();
      console.log('🎯 Theme toggle clicked!');

      // Toggle dark mode
      document.documentElement.classList.toggle('dark');

      // Update icons
      updateIcons();

      // Save preference (use same key as the initial script)
      const isDark = document.documentElement.classList.contains('dark');
      localStorage.setItem('color-theme', isDark ? 'dark' : 'light');

      console.log('✅ Theme switched to:', isDark ? 'dark' : 'light');
    });

    function updateIcons() {
      const isDark = document.documentElement.classList.contains('dark');

      if (isDark) {
        darkIcon.classList.add('hidden');
        lightIcon.classList.remove('hidden');
      } else {
        lightIcon.classList.add('hidden');
        darkIcon.classList.remove('hidden');
      }
    }
  });
}

// Initialize when DOM is ready
console.log('🔄 Theme toggle script: checking DOM ready state:', document.readyState);
if (document.readyState === 'loading') {
  console.log('🔄 DOM still loading, adding DOMContentLoaded listener');
  document.addEventListener('DOMContentLoaded', function() {
    console.log('🔄 DOMContentLoaded fired, initializing theme toggle');
    initThemeToggle();
  });
} else {
  console.log('🔄 DOM already ready, initializing theme toggle immediately');
  initThemeToggle();
}
