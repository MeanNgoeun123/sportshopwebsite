<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <span class="font-bold text-xl">🏀 SportShop</span>
                </a>
            </div>

            <!-- RIGHT SIDE -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">

                <!-- PROFILE -->
                <a href="{{ route('profile') }}" class="text-gray-700 hover:text-black">
                    My Profile
                </a>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="text-gray-700 hover:text-red-600">
                        Logout
                    </button>
                </form>

            </div>

            <!-- MOBILE -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden px-4 pb-4">

        <a href="{{ route('home') }}" class="block py-2">Home</a>

        <a href="{{ route('profile') }}" class="block py-2">My Profile</a>

        <form method="POST" action="{{ route('logout') }}" class="block py-2">
            @csrf
            <button>Logout</button>
        </form>

    </div>

</nav>