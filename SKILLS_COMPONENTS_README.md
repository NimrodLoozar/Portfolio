# Skills Breakdown Laravel Components

This document describes the Laravel components created for the Skills Breakdown section.

## Components

### 1. SkillsBreakdown Component

**File:** `app/View/Components/SkillsBreakdown.php`
**View:** `resources/views/components/skills-breakdown.blade.php`

The main component that contains all skill sections (Programming Languages, Libraries/Version Control, and Social Media).

#### Usage:

```blade
<x-skills-breakdown />
```

#### Features:

-   Contains predefined skill data for all three categories
-   Automatically renders all sections with proper styling
-   Includes fade transition styles
-   Uses the SkillCard component for individual skills

### 2. SkillCard Component

**File:** `app/View/Components/SkillCard.php`
**View:** `resources/views/components/skill-card.blade.php`

A reusable component for individual skill items with progress circles.

#### Props:

-   `name` (string): The skill name
-   `icon` (string): Path to the skill icon
-   `color` (string): Tailwind color class name
-   `bg` (string): Background gradient classes
-   `border` (string): Border color classes
-   `stroke` (array): Array with two hex colors for progress circle
-   `target` (int): Target percentage (0-100)
-   `desc` (string): Skill description
-   `showChart` (bool, optional): Whether to show progress chart (default: true)

#### Usage:

```blade
<!-- With progress chart (default) -->
<x-skill-card
    name="Laravel"
    icon="img/laravel-2.svg"
    color="red"
    bg="from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20"
    border="border-red-200 dark:border-red-700"
    :stroke="['#fca5a5', '#ef4444']"
    :target="75"
    desc="MVC framework & APIs"
/>

<!-- Without progress chart (for social media, etc.) -->
<x-skill-card
    name="Facebook"
    icon="img/facebook-3-2.svg"
    color="blue"
    bg="from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20"
    border="border-blue-200 dark:border-blue-700"
    :stroke="['#93c5fd', '#2563eb']"
    :target="85"
    desc="Social media platform"
    :showChart="false"
/>
```

## Replacing Existing Code

To replace the existing Skills Breakdown section in `welcome.blade.php`:

1. **Keep the section buttons** (they control which section is visible):

```blade
<div class="flex flex-wrap justify-center gap-4 mb-8">
    <button id="btn-languages" class="section-btn active px-6 py-2 rounded-lg font-semibold bg-blue-600 text-white shadow hover:bg-blue-700 transition" data-section="languages">Programming Languages</button>
    <button id="btn-libraries" class="section-btn px-6 py-2 rounded-lg font-semibold bg-purple-600 text-white shadow hover:bg-purple-700 transition" data-section="libraries">Libraries / Version Control</button>
    <button id="btn-social" class="section-btn px-6 py-2 rounded-lg font-semibtml-semibold bg-pink-600 text-white shadow hover:bg-pink-700 transition" data-section="social">Social Media</button>
</div>
```

2. **Replace the entire section content** (from line ~290 to ~660) with:

```blade
<x-skills-breakdown />
```

## Benefits

1. **Reusability**: Components can be used in other parts of the application
2. **Maintainability**: Skill data is centralized in the component class
3. **Modularity**: Individual skill cards can be used independently
4. **Clean Code**: Separates presentation logic from view templates
5. **Easy Updates**: Add new skills by simply updating the component class

## Customization

### Adding New Skills

Edit the arrays in `app/View/Components/SkillsBreakdown.php`:

```php
$this->skillsLanguages[] = [
    'name' => 'Python',
    'icon' => 'img/python.svg',
    'color' => 'green',
    'bg' => 'from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20',
    'border' => 'border-green-200 dark:border-green-700',
    'stroke' => ['#86efac', '#16a34a'],
    'target' => 70,
    'desc' => 'Data science & automation',
];
```

### Creating New Skill Categories

1. Add a new array property to the SkillsBreakdown component
2. Add the corresponding section in the component view
3. Add a new button to control the section visibility

## Dependencies

-   Tailwind CSS for styling
-   Existing JavaScript for section switching functionality
-   Asset helper for icon paths

## Features

### Conditional Progress Charts

-   Programming Languages and Libraries sections show progress charts by default
-   Social Media section displays without progress charts for a cleaner look
-   Use the `showChart` parameter to control chart visibility per skill card
