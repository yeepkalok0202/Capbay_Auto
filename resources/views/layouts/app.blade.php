<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('sweetalert::alert')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        /* Ensure body takes up maximum viewport height */
        body {
            display: flex;
            flex-direction: column;
            min-height: 80vh;
        }

        /* Ensure main content area takes up remaining space */
        main {
            flex-grow: 1;
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col min-h-screen dark:bg-gray-900">
    @include('sweetalert::alert')

    <div class="flex-grow">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-center">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow ">
                {{ $slot }}
            </main>
        </div>
    </div>

    <footer  style="padding-block:20px;width:100%;text-align:center;background-color:#1F2937;color:rgb(224, 206, 206);">
        <p>&copy; Copyright: Capbay Auto</p>
    </footer>
</body>
</html>
