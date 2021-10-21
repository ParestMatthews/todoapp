<div class="h-screen flex flex-col items-center justify-center ">
    <h2 class="text-5xl mb-6">
        Login
    </h2>
    
    <form wire:submit.prevent="handleSubmit" class="w-3/12">
        {{ csrf_field() }}
        <div class='mx-auto'>
            @if($error)
                <p class="border border-red-300 bg-red-200 px-2 py-2 text-red-700">
                    {{$error}}
                </p>
            @endif
        </div>
        <input type="text" wire:model="email" class="block border border-grey-light w-full p-3 mt-4" placeholder="Email">
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
     
        <input type="password" wire:model="password" class="block border border-grey-light w-full p-3 mt-4" placeholder="Password">
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <button type="submit" class="w-full text-center py-3 bg-purple-400 hover:bg-purple-500 text-gray-100 hover:text-grey-200 my-4">Signup</button>
    </form>
    
</div>