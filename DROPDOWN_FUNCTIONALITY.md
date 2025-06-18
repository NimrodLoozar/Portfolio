<!-- Dropdown Functionality Demo -->
<!--
This demonstrates the dropdown functionality that's already implemented in your navigation.

Your dropdown components already have all the functionality you requested:

1. **Click to Open/Close**:
   - Click the dropdown trigger button to toggle the dropdown
   - Uses Alpine.js directive: @click="open = ! open"

2. **Click Outside to Close**:
   - Click anywhere outside the dropdown to close it
   - Uses Alpine.js directive: @click.outside="open = false"

3. **ESC Key to Close**:
   - Press ESC key to close any open dropdowns
   - Handled by the navigation.js script

4. **Mobile Menu Support**:
   - Mobile hamburger menu also closes when clicking outside
   - Auto-closes when screen size changes to desktop

## How it works:

### Desktop Dropdown (Settings Menu):
- Located in the top-right corner when logged in
- Shows user name with down arrow
- Contains Profile and Log Out links
- Automatically positioned and styled

### Mobile Navigation:
- Hamburger menu icon on mobile devices
- Slides down to show navigation links
- Closes when clicking outside or pressing ESC

### Technical Implementation:
- Uses Alpine.js for reactive state management
- CSS transitions for smooth animations
- Tailwind CSS for styling
- Custom JavaScript for enhanced functionality

## Testing the functionality:
1. Click the user dropdown (desktop) or hamburger menu (mobile)
2. Try clicking outside the dropdown - it should close
3. Try pressing the ESC key - it should close
4. On mobile, resize the window - menu should close when reaching desktop size

All functionality is already working in your navigation!
-->

<!-- Example of how to create additional dropdowns using the same pattern: -->

<!--
<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            Your Button Text
            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-link href="#">
            Option 1
        </x-dropdown-link>
        <x-dropdown-link href="#">
            Option 2
        </x-dropdown-link>
    </x-slot>
</x-dropdown>
-->
