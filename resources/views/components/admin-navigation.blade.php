<div class="w-full flex justify-between shadow-lg px-4 py-2 sticky top-0 left-0 bg-white z-40">
    <div class="w-max flex items-center">
        <div class="h-max w-max lg:hidden flex">
            <i class="fa fa-bars text-themeColor text-2xl mr-3 cursor-pointer"
                onclick="document.getElementById('sideBar').classList.remove('hidden');"></i>
        </div>
        <span class="text-black font-bold text-xl font-montserrat lg:block md:block hidden"></span>
    </div>
    
    <div class="w-max flex gap-2 items-center relative">
        <div class="w-max flex flex-col items-end cursor-pointer" id="userDropdownTrigger">
            <span class="text-black font-bold text-sm font-montserrat">{{ auth()->user()->name }}</span>
        </div>
        <div class="w-max h-max flex cursor-pointer" id="userDropdownTrigger">
            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" class="rounded-full h-8 w-8" alt="">
        </div>
        <!-- Dropdown menu -->
        <div id="userDropdown" class="hidden absolute right-0 w-48 mt-2 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 py-1 bg-white z-40">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>
            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ __('Profile') }}
            </a>
            @if (\Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('API Tokens') }}
                </a>
            @endif
            <div class="border-t border-gray-200"></div>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Dropdown functionality
    document.addEventListener('DOMContentLoaded', function () {
        var userDropdownTrigger = document.getElementById('userDropdownTrigger');
        var userDropdown = document.getElementById('userDropdown');

        userDropdownTrigger.addEventListener('click', function () {
            userDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (!userDropdownTrigger.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    });
</script>
