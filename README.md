# ServeCore Shadcn Blade

A Laravel preset that installs beautiful, accessible Shadcn UI components built with Blade and Alpine.js.

## Features

- 🎨 **33+ Pre-built Components**: Accordion, Alert, Avatar, Badge, Breadcrumb, Button, Card, Carousel, Checkbox, Collapsible, Dialog, Dropdown, Input, Label, Navbar, Pagination, Progress, Radio Group, Scroll Area, Select, Separator, Sheet, Sidebar, Skeleton, Switch, Table, Tabs, Textarea, Theme Toggle, Toast, Toggle, Tooltip, and more.
- 🌙 **Dark Mode**: Flicker-free theme system (Light/Dark/System)
- 🎯 **Zero Config**: One command installation
- ⚡ **Alpine.js**: Lightweight reactivity
- 🎭 **Tailwind CSS v4**: Modern styling engine
- 🛠️ **Full Stubs**: Includes the complete `shadcn-stubs` directory for custom component generation.

## Installation

1. **Require the package**:
   ```bash
   composer require servecore/shadcn-blade
   ```

2. **Run the installer**:
   ```bash
   php artisan servecore:install
   ```

3. **Compile assets**:
   ```bash
   npm install && npm run dev
   ```

## What Gets Installed

The preset copies the following to your Laravel project:

- **Components**: `resources/views/components/` (Full suite of ShadCN components)
- **Demo Page**: `resources/views/servecore-test.blade.php` (Usage examples)
- **Stubs**: `resources/shadcn-stubs/` (Blueprints for generating components)
- **JavaScript**: `resources/js/theme.js` and `resources/js/init-theme.js`
- **Styles**: `resources/css/app.css` (ShadCN variables + Tailwind config)
- **Dependencies**: `embla-carousel` and `embla-carousel-autoplay`

## Usage

### Theme System

Add to your layout's `<head>`:
```blade
<x-theme-script />
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Add the toggle button anywhere:
```blade
<x-theme-toggle />
```

### Components

```blade
{{-- Button with loading --}}
<x-button loading="true">Save</x-button>

{{-- Dialog --}}
<x-dialog>
    <x-dialog-trigger>Open</x-dialog-trigger>
    <x-dialog-content>
        <x-dialog-header>Title</x-dialog-header>
        Content here
    </x-dialog-content>
</x-dialog>

{{-- Select --}}
<x-select name="country" placeholder="Select...">
    <x-select-trigger>
        <x-select-value />
    </x-select-trigger>
    <x-select-content>
        <x-select-item value="us">United States</x-select-item>
    </x-select-content>
</x-select>
```

## Manual Setup (Optional)

If you want to understand what the installer does, here's the manual setup:

### 1. CSS Setup

The installer copies `app.css` with Tailwind v4 configuration and ShadCN color variables:

```css
@import "tailwindcss";

@theme {
  --color-background: 0 0% 100%;
  --color-foreground: 222.2 84% 4.9%;
  /* ... more variables */
}

.dark {
  --color-background: 222.2 84% 4.9%;
  --color-foreground: 210 40% 98%;
  /* ... dark mode variables */
}

[x-cloak] {
  display: none !important;
}
```

### 2. JavaScript Setup

The installer updates `resources/js/app.js` to include:

```javascript
import Alpine from 'alpinejs';
import theme, { initializeTheme } from './theme';

// Initialize theme before Alpine
initializeTheme();

// Register theme component
Alpine.data('theme', theme);

window.Alpine = Alpine;
Alpine.start();
```

### 3. Vite Configuration

Ensure your `vite.config.js` includes:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

## Requirements

- Laravel 11+
- PHP 8.2+
- Node.js & NPM

## License

MIT

## Credits

Built with love by ServeCore Team.
