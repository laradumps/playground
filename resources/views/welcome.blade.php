<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraDumps - Playground</title>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        @livewireStyles
        <script defer src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="antialiased">
        <div class="m-3 p-4 rounded bg-slate-100">
            <livewire:counter />
            <livewire:counter2 />
        </div>
    </body>
    @livewireScripts
    @if(app()->environment('local'))
        @dsAutoClearOnPageReload
    @endif
</html>
