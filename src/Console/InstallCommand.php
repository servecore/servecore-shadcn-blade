<?php

namespace ServeCore\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'servecore:install {--force : Overwrite existing files}';

    protected $description = 'Install the ServeCore UI preset (ShadCN + Alpine)';

    public function handle()
    {
        $this->info('Installing ServeCore UI...');

        // 1. Copy UI Components
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views/components', resource_path('views/components'));

        // 2. Copy JS Logic
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/js', resource_path('js'));

        // 3. Update app.js
        $this->updateAppJs();

        // 4. Install NPM Dependencies
        $this->updatePackageJson();

        // 5. Update app.css
        $this->updateAppCss();

        // 6. Copy Demo Page
        if (file_exists(__DIR__.'/../../stubs/resources/views/test.blade.php')) {
            copy(__DIR__.'/../../stubs/resources/views/test.blade.php', resource_path('views/servecore-test.blade.php'));
        }

        // 7. Copy components stubs
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/shadcn-stubs', resource_path('shadcn-stubs'));

        $this->info('ServeCore UI installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile assets.');
        $this->comment('View the demo at: /servecore-test (you may need to add a route)');
    }

    protected function updateAppCss()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        copy(__DIR__.'/../../stubs/resources/css/app.css', resource_path('css/app.css'));
    }

    protected function updateAppJs()
    {
        $appJsPath = resource_path('js/app.js');
        if (! file_exists($appJsPath)) {
            return;
        }

        $content = file_get_contents($appJsPath);

        // Check if Alpine is already installed manually
        if (str_contains($content, "import Alpine from 'alpinejs';") || str_contains($content, 'window.Alpine = Alpine;')) {
            $this->warn("\n[Warning] Existing Alpine.js setup detected in app.js.");
            $this->comment('We skipped modifying app.js to prevent breaking your configuration.');
            $this->comment("Please manually add the ServeCore imports (theme, components) to your app.js.\n");

            return;
        }

        // Add Theme Import if missing
        if (! str_contains($content, "import theme, { initializeTheme } from './theme';")) {
            $code = <<<'JS'

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);

import accordion from './components/accordion';
import avatar from './components/avatar';
import carousel from './components/carousel';
import checkbox from './components/checkbox';
import collapsible from './components/collapsible';
import radiogroup from './components/radio-group';
import theme, { initializeTheme } from './theme';

initializeTheme();

Alpine.data('accordion', accordion);
Alpine.data('avatar', avatar);
Alpine.data('carousel', carousel);
Alpine.data('checkbox', checkbox);
Alpine.data('collapsible', collapsible);
Alpine.data('radiogroup', radiogroup);
Alpine.data('theme', theme);

window.Alpine = Alpine;
Alpine.start();
JS;

            // Append after bootstrap
            $content = str_replace("import './bootstrap';", "import './bootstrap';\n".$code, $content);

            file_put_contents($appJsPath, $content);
        }
    }

    protected function updatePackageJson()
    {
        $this->runCommands(['npm install alpinejs @alpinejs/collapse embla-carousel embla-carousel-autoplay']);
    }

    protected function runCommands($commands)
    {
        $process = \Symfony\Component\Process\Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);
        $process->run(function ($type, $line) {
            $this->output->write($line);
        });
    }
}
