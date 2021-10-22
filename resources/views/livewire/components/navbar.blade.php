<nav class="bg-purple-400">
    <div class="px-8 max-w mx-auto">
        <div class="flex justify-between">
    
            <div class='flex space-x-4'>
                <a href="/" class="flex item-center text-gray-100 hover:text-gray-200 py-4 px-4 transition duration-200">
                    <span class="font-semibold">To Do Application</span>
                </a>
            </div>

            @auth
                <div class="flex items-center">
                    <span class="py-4 px-4 text-gray-100">Hello <span>{{auth()->user()->name}}</span></span>
                    <a href="#" wire:click="logoutUser" class="py-2 px-4 bg-purple-200 hover:bg-purple-100 text-purple-800 hover:text-purple-700 rounded transition duration-200">Logout</a>
                </div>
            @else
                <div class="flex items-center">
                    <a href="/login" class="py-4 px-4 text-gray-100 hover:text-gray-200 transition duration-200">Login</a>
                    <a href="/signup" class="py-2 px-4 bg-purple-200 hover:bg-purple-100 text-purple-800 hover:text-purple-700 rounded transition duration-200">Signup</a>
                </div>
            @endauth
                   
        </div>
    </div>
</nav>
