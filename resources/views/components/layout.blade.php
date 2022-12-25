<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Stat Tracker</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="stylesheet" href="">
        <link rel="stylesheet" type="text/css" href="{{ asset('/style.css') }}" />
        <script src="https://kit.fontawesome.com/19ab508515.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <x-navbar />   
        </header>
        <main>
            <div class="min-h-screen my-16">
                {{ $slot }}
            </div>
        </main>
        <footer>
            <x-footer />   
        </footer>
    </body>
</html>


