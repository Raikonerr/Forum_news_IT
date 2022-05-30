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
    <body class="bg-slate-600 w-screen">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-gray-800 mb-5">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Icon when menu is closed.
                        Heroicon name: outline/menu
                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Icon when menu is open.
                        Heroicon name: outline/x
                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="https://www.richardbaird.co.uk/wp-content/uploads/2020/05/FA-Architecture-Monogram-by-Logo-Designer-Richard-Baird-London-1024x1024.jpg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="https://www.richardbaird.co.uk/wp-content/uploads/2020/05/FA-Architecture-Monogram-by-Logo-Designer-Richard-Baird-London-1024x1024.jpg" alt="Workflow">
                    </div>
                    @auth   
                        <div class="hidden sm:block sm:ml-6  justify-center">
                            <div class="flex space-x-4 justify-center">
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.users') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Users</a>
                                    <a href="{{ route('admin.posts.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                                    <a href="{{ route('admin.comments.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Comments</a>
                                @else
                                    <a href="/" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
                                    <a href="{{ route('posts.all') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                                @endif   
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">           
                    @auth
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <a href="{{ route('profile') }}" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
                        </a>
                    </div>
                    <div class="ml-5">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="flex items-center rounded-lg bg-teal-600 px-4 py-2 text-white">
                                <span class="font-medium subpixel-antialiased">Log out</span>
                            </button>  
                        </form>
                        
                    </div>
                    @endauth
                    @guest
                    <div class="ml-5">
                        <a href="{{ route('login') }}" class="flex items-center rounded-lg bg-teal-600 px-4 py-2 text-white">
                            <span class="font-medium subpixel-antialiased">Login</span>
                        </a>
                    </div>
                    <div class="ml-5">
                        <a href="{{ route('register') }}" class="flex items-center rounded-lg bg-teal-600 px-4 py-2 text-white">
                            <span class="font-medium subpixel-antialiased">Register</span>
                        </a>
                    </div>
                    @endguest
                </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            @auth 
                <div class="sm:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.users') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Users</a>
                            <a href="{{ route('admin.posts.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Posts</a>
                            <a href="{{ route('admin.comments.show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Comments</a>
                        @else
                            <a href="/" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>
                            <a href="{{ route('posts.all') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Post</a>
                        @endif
                    
                    </div>
                </div>
            @endauth
        </nav>

        {{-- <section class="relative py-2 bg-gray-900">
            <div class="flex items-center justify-between h-20 px-8 mx-auto max-w-7xl" >
        
                <a href="{{ route('home.index') }}" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-white select-none">
                    ITnews.
                </a>
                
                    <nav class="items-center justify-center hidden space-x-8 text-gray-200 md:flex">
                        @auth    
                            @if (auth()->user()->is_admin)
                                <a href="{{ route('admin.users') }}"  class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Users</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                                <a href="{{ route('admin.posts.show') }}"  class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Posts</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                                <a href="{{ route('admin.comments.show') }}"  class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Comments</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>  
                            @else
                                <a href="{{ route('posts.all') }}"  class="relative inline-block text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                    <span class="block">Posts</span>
                                    <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                    </span>
                                </a>
                            @endif
                            <div class="w-0 h-5 border border-r border-gray-700" id="mobile-menu"></div>
                            <a href="{{ route('profile') }}"  class="relative inline-block ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                <span class="block">{{ auth()->user()->name }}</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                                </span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full  transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-teal-500 border border-cyan-100 rounded-md shadow-sm focus:ring-offset-gray-900 hover:bg-cyan-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400">
                                Logout
                            </button>
                        </form>
                        @endauth
                        @guest
                            <div class="w-0 h-5 border border-r border-gray-700"></div>
                            <a href="{{ route('login') }}"  class="relative inline-block ml-5 text-base font-bold text-gray-200 uppercase transition duration-150 ease hover:text-white">
                                <span class="block">Login</span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-2 border-gray-100"></span>
                                </span>
                                <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-600" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                                </span>
                            </a>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-cyan-600 border border-blue-700 rounded-md shadow-sm focus:ring-offset-gray-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Signup
                            </a>
                        @endguest
                        
                    </nav>
                
                
        
                <!-- Mobile Button -->
                <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
        
            </div>
        </section> --}}
        

        @yield('content')
        @env('local')
            <script src="http://localhost:35729/livereload.js"></script>
            
           

        @endenv


        
    </body>
</html>