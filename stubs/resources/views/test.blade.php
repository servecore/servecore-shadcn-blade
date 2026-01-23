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
