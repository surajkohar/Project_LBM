<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>

    
    <div class=" mt-4 w-full bg-white rounded-lg shadow-md p-4 flex items-center justify-between ml-4 mr-12">
        <div class="flex-1 text-center">
            
            <p class="text-lg font-semibold text-gray-800"><i class="fa fa-user mr-2"></i>{{ ucwords(auth()->user()->name) }}</p>
        </div>
        <div class="flex-1 text-center">
            <p class="text-lg font-semibold text-gray-600"><i class="fa-solid fa-envelope mr-2"></i>{{ auth()->user()->email }}</p>
        </div>
        <div class="flex-1 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Log Out
                </button>
            </form>
        </div>
    </div>
    
    
    
    <div class="grid lg:grid-cols-2 gap-4 mt-4 px-8 mt-4">
        <div class="flex flex-col rounded-md bg-blue-100  p-4 shadow-lg">
            <div class="w-full flex justify-between items-center">
                <div class="rounded-full h-8 w-8 flex justify-center items-center ">
                    <i class="fa-solid fa-indian-rupee-sign text-2xl cursor-pointer"></i>
                </div>
            </div>
            <div class="flex flex-col mt-3 items-start justify-start">
                <p class=" font-normal text-lg cursor-pointer  mt-2 text-center">
                    Total Rewards
                </p>
                <span class=" font-bold text-2xl "> {{ auth()->user()->referal_rewards ?? 0 }}</span>
            </div>
        </div>
    
        <div class="flex flex-col rounded-md bg-blue-100  p-4 shadow-lg">
            <div class="w-full flex justify-between items-center">
                <div class="rounded-full h-8 w-8 flex justify-center items-center ">
                    <i class="fa-solid fa-person  text-2xl cursor-pointer"></i>
                </div> 
            </div>
            <div class="flex flex-col mt-3 items-start justify-start">
                <p class=" font-normal text-lg cursor-pointer  mt-2 text-center">
                    Number Of Referrals
                </p>
                <span class=" font-bold text-2xl ">{{ auth()->user()->referal_count ?? 0 }}</span>
            </div>
        </div>
    </div>
    

   
    
        
</x-app-layout>
