<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forum It News</title>
        <link rel="shortcut icon" type="image/png" sizes="16x16" rel="icon" href=".../icons8-forum-16.png">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-200 w-screen">
        <!-- This example requires Tailwind CSS v2.0+ -->

        <section class="relative py-2 bg-gray-900">
            <div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl">
        
                <a href="{{ route('home.index') }}" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none">
                    ITnews.
                </a>
                
                    <nav class="items-center justify-center hidden space-x-8 text-gray-200 md:flex">
                        @auth    
                            @if (auth()->user()->is_admin)
                                <a href="{{ route('admin.users') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Users</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                                <a href="{{ route('admin.posts.show') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Posts</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                                <a href="{{ route('admin.comments.show') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Comments</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>  
                            @else
                                <a href="{{ route('posts.all') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Posts</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                            @endif
                            <div class="w-0 h-5 border border-r border-gray-700"></div>
                            <a href="{{ route('profile') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                <span class="block">{{ auth()->user()->name }}</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                                </span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm focus:ring-offset-gray-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Logout
                            </button>
                        </form>
                        @endauth
                        @guest
                            <div class="w-0 h-5 border border-r border-gray-700"></div>
                            <a href="{{ route('login') }}" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                <span class="block">Login</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                                </span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm focus:ring-offset-gray-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Signup
                            </a>
                        @endguest
                        
                    </nav>
                
                
        
                <!-- Mobile Button -->
                <div class="flex items-center justify-center h-full text-white md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                    </svg>
                </div>
        
            </div>
        </section>

        @yield('content')
        @env('local')
            <script src="http://localhost:35729/livereload.js"></script>
        @endenv


        
    </body>
</html>