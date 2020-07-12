<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased font-sans bg-dark-900 text-gray-100 text-base">
        <nav class="border-b border-dark-800 font-semibold uppercase tracking-wider">
            <div class="container py-6 mx-auto flex flex-col lg:flex-row items-center justify-between">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <div class="flex items-center mb-6 lg:mb-0">
                        <a href="{{ route('movies') }}">
                            <svg class="w-8 h-8 text-gray-100" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect><line x1="7" y1="2" x2="7" y2="22"></line><line x1="17" y1="2" x2="17" y2="22"></line><line x1="2" y1="12" x2="22" y2="12"></line><line x1="2" y1="7" x2="7" y2="7"></line><line x1="2" y1="17" x2="7" y2="17"></line><line x1="17" y1="17" x2="22" y2="17"></line><line x1="17" y1="7" x2="22" y2="7"></line></svg>
                        </a>
                    </div>
                    <div class="flex items-center mb-6 lg:mb-0">
                        <a href="{{ route('movies') }}" class="ml-0 lg:ml-16 hover:text-purple-500 transition ease-in-out duration-150">Movies</a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="container mx-auto py-24">
            <p class="uppercase tracking-wider">Powered by <span class="text-purple-500 hover:text-purple-600 font-semibold transition ease-in-out duration-150"><a href="https://www.themoviedb.org/" target="blank">TMDB API</a></span></p>
        </footer>
        @stack('scripts')
    </body>
</html>
