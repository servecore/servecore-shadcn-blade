<?php

namespace ServeCore\Ui\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'servecore:install';

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

        // Add Theme Import if missing
        if (! str_contains($content, "import theme, { initializeTheme } from './theme';")) {
            $content = str_replace(
                "import './bootstrap';",
                "import './bootstrap';\nimport theme, { initializeTheme } from './theme';",
                $content
            );
            $content .= "\ninitializeTheme();\nAlpine.data('theme', theme);";

            file_put_contents($appJsPath, $content);
        }
    }

    protected function updatePackageJson()
    {
        $this->runCommands(['npm install embla-carousel embla-carousel-autoplay']);
    }

    protected function runCommands($commands)
    {
        $process = \Symfony\Component\Process\Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);
        $process->run(function ($type, $line) {
            $this->output->write($line);
        });
    }
}
