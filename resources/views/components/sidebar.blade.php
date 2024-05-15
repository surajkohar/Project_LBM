
<div class="h-screen h-full overflow-y-auto col-span-1 lg:flex  flex-col  w-72 hidden  z-50  bg-blue-600 "
   id="sideBar">
<div class="w-full flex justify-center relative">
   
    <div class="h-max w-max absolute top-2 right-4 lg:hidden  flex">
        <i class="fa fa-xmark  text-white text-2xl cursor-pointer"
            onclick="
            document.getElementById('sideBar').classList.add('hidden');
         "></i>
    </div>

</div>
<div class="w-full px-4 ">

    <div class="w-full flex flex-col gap-2 mt-4">

        <Link href="{{ route('dashboard') }}"
            class=" {{ Route::currentRouteName() == 'dashboard' ? 'text-black  bg-white font-semibold' : 'text-white bg-green-500 ' }} relative w-full font-semibol border-[1px]   text-md  py-2.5 px-4 rounded-[3px] hover:text-black  hover:bg-white transition ease-in duration-2000">
        <i class="fa fa-dashboard mr-2 text-white text-xl "><span class="ml-2 ">Dashboard</span></i>
        </Link>

    </div>
</div>


<div class="w-full flex flex-col gap-2 mt-8">
    <a href="{{ route('dashboard') }}"
        class=" {{ Route::currentRouteName() == 'dashboard' ? 'text-black  bg-white font-semibold' : 'text-white bg-gray-500 ' }} text-xl relative w-full font-semibol border-[1px]   text-md  py-2.5 px-4 rounded-[3px] hover:text-black  hover:bg-white transition ease-in duration-2000">
       Dashboard
    </a>
</div>

<div class="w-full flex flex-col gap-2 mt-2">
    <a href="{{ route('profile.show') }}"
        class=" {{ Route::currentRouteName() == 'profile.show' ? 'text-black  bg-white font-semibold' : 'text-white bg-gray-500 ' }} text-xl relative w-full font-semibol border-[1px]   text-md  py-2.5 px-4 rounded-[3px] hover:text-black  hover:bg-white transition ease-in duration-2000">
      Setting
    </a>
</div>
<div class="w-full flex flex-col gap-2 mt-2">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit "
            class="{{ Route::currentRouteName() == 'logout' ? 'text-black  bg-white font-semibold' : 'text-white bg-gray-500' }} text-left  text-xl relative w-full font-semibol border-[1px]  text-md py-2.5 px-4 rounded-[3px] hover:text-black hover:bg-white transition ease-in duration-2000">
            Log Out
        </button>
    </form>
</div>

</div>
