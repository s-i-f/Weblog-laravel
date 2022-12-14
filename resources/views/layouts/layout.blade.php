<nav x-data="{ open: false }" class="border-b border-slate-100">

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
                @guest
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('sessions.create')" :active="request()->routeIs('sessions.create')">
                        {{ __('Login') }}
                    </x-nav-link>
                </div>
                @else
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                @endguest
            </div>
            @auth
            <!-- Settings Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-black-600 hover:text-indigo-700 hover:border-slate-300 focus:outline-none focus:text-slate-700 focus:border-slate-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="GET" action="{{ route('users.index') }}">
                            @csrf
                            <x-dropdown-link :href="route('users.index')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ 'Profile overview' }}
                            </x-dropdown-link>
                        </form>

                        <form method="GET" action="{{ route('posts.create') }}">
                            @csrf
                            <x-dropdown-link :href="route('posts.create')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Create new post') }}
                            </x-dropdown-link>
                        </form>

                        <form method="GET" action="{{ route('categories.create') }}">
                            @csrf
                            <x-dropdown-link :href="route('categories.create')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Create new category') }}
                            </x-dropdown-link>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth
        </div>
    </div>


    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-right">
            
        </div>
    </header>

    </body>

    </html>