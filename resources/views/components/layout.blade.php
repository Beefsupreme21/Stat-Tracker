<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stat Tracker</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-50">
        <header>
            <x-navbar />   
        </header>
        <main>
            <div class="min-h-screen my-12">
                {{ $slot }}
            </div>
        </main>
        <footer>
            <x-footer />   
        </footer>

        @stack('scripts')
    </body>
</html>


