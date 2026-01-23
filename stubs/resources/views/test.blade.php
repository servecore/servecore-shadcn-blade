<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShadCN UI Components Preview</title>
    <x-theme-script />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground p-6">
    <div class="max-w-6xl mx-auto space-y-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">ShadCN UI Components Preview</h1>
            <x-theme-toggle />
        </div>

        <!-- Scroll Area -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Scroll Area</h2>
            <x-scroll-area.scroll-area class="h-72 w-48 rounded-md border">
                <div class="p-4">
                    <h4 class="mb-4 text-sm font-medium leading-none">Tags</h4>
                    @foreach(range(1, 50) as $i)
                        <div class="text-sm">Tag {{ $i }}</div>
                        @if($i < 50)
                            <div class="my-2 h-px bg-border"></div>
                        @endif
                    @endforeach
                </div>
            </x-scroll-area.scroll-area>
        </section>

        <!-- Batch 1: Badge -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Badge</h2>
            <div class="flex gap-4">
                <x-badge>Default</x-badge>
                <x-badge variant="secondary">Secondary</x-badge>
                <x-badge variant="destructive">Destructive</x-badge>
                <x-badge variant="outline">Outline</x-badge>
            </div>
        </section>

        <!-- Batch 1: Alert -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Alert</h2>
            <x-alert>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><line x1="12" x2="12" y1="2" y2="19"/><line x1="12" x2="12" y1="22" y2="22.01"/></svg>
                <div class="alert-title font-medium">Heads up!</div>
                <div class="alert-description">You can add components to your app using the cli.</div>
            </x-alert>
            <x-alert variant="destructive">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <div class="alert-title font-medium">Error</div>
                <div class="alert-description">Your session has expired. Please log in again.</div>
            </x-alert>
        </section>

        <!-- Batch 1: Avatar -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Avatar</h2>
            <div class="flex gap-4">
                <x-avatar>
                    <x-avatar-image src="https://github.com/shadcn.png" alt="@shadcn" />
                    <x-avatar-fallback>CN</x-avatar-fallback>
                </x-avatar>
                <x-avatar>
                    <x-avatar-image src="broken-link.jpg" alt="@shadcn" />
                    <x-avatar-fallback>JD</x-avatar-fallback>
                </x-avatar>
            </div>
        </section>

        <!-- Batch 1: Skeleton -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Skeleton</h2>
            <div class="flex items-center space-x-4">
                <x-skeleton class="h-12 w-12 rounded-full" />
                <div class="space-y-2">
                    <x-skeleton class="h-4 w-[250px]" />
                    <x-skeleton class="h-4 w-[200px]" />
                </div>
            </div>
        </section>

        <!-- Batch 1: Separator -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Separator</h2>
            <div>
                <div class="space-y-1">
                    <h4 class="text-sm font-medium leading-none">Radix Primitives</h4>
                    <p class="text-sm text-muted-foreground">An open-source UI component library.</p>
                </div>
                <x-separator class="my-4" />
                <div class="flex h-5 items-center space-x-4 text-sm">
                    <div>Blog</div>
                    <x-separator orientation="vertical" />
                    <div>Docs</div>
                    <x-separator orientation="vertical" />
                    <div>Source</div>
                </div>
            </div>
        </section>

        <!-- Toast -->
        <section class="space-y-4">
            <h2 class="text-2xl font-semibold">Toast</h2>
            <div class="flex flex-wrap gap-4">
                <x-button x-data @click="$dispatch('notify', { title: 'Default Toast', description: 'This is a default toast message.' })">
                    Default
                </x-button>
                <x-button variant="destructive" x-data @click="$dispatch('notify', { variant: 'destructive', title: 'Error', description: 'Something went wrong.' })">
                    Destructive
                </x-button>
                <x-button class="!bg-green-600 hover:!bg-green-700 text-white" x-data @click="$dispatch('notify', { variant: 'success', title: 'Success', description: 'Operation completed successfully.' })">
                    Success
                </x-button>
                <x-button class="!bg-yellow-500 hover:!bg-yellow-600 text-black" x-data @click="$dispatch('notify', { variant: 'warning', title: 'Warning', description: 'Please check your input.' })">
                    Warning
                </x-button>
                <x-button variant="outline" x-data @click="$dispatch('notify', { title: 'Long Duration', description: 'This toast stays for 8 seconds.', duration: 8000 })">
                    Long Duration
                </x-button>
            </div>
        </section>
    </div>
    <x-toast.toaster />
</body>
</html>
