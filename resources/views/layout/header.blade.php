<!-- component -->
<nav class="flex items-center justify-between flex-wrap bg-black px-6 py-3 my-5 mx-5 rounded-md">
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-white font-weight-bold">
        <div class="text-sm lg:flex-grow">
            <a href="{{ route('home') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Tournament Finder
            </a>
        </div>
        @guest
        <div class="text-sm">
            <a href="{{ route('login') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Login
            </a>
        </div>
        <div class="text-sm">
            <a href="{{ route('register') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Register
            </a>
        </div>
        @endguest
        @auth
        @if (auth()->user()->hasRole('user'))
        <div class="text-sm">
            <a href="{{ route('user.dashboard') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Dashboard
            </a>
        </div>
        <div class="text-sm">
            <a href="{{ route('user.registered.list') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Registered events
            </a>
        </div>
        @endif
        @if (auth()->user()->hasRole('hoster'))
        <div class="text-sm">
            <a href="{{ route('hoster.dashboard') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Dashboard
            </a>
        </div>
        <div class="text-sm">
            <a href="{{ route('hoster.event.create') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Create Event
            </a>
        </div>
        @endif
        @if (auth()->user()->hasRole('admin'))
        <div class="text-sm">
            <a href="{{ route('admin.dashboard') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Dashboard
            </a>
        </div>
        @endif
        <div class="text-sm">
            <a href="{{ route('logout') }}"
                class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Logout
            </a>
        </div>
        @endauth
    </div>
</nav>