

<div class="py-32">
    <div class="grid justify-items-center">

        @if($isEdit === false)
            <form wire:submit.prevent="handleAddTodo" class="w-4/12 pb-4">
                <div class="flex">
                    <div class="block w-5/6 mr-5">
                        <input type="text" wire:model="todo" class="block border border-grey-light w-full p-3 mt-4 h-12" placeholder="Add todo here...">
                        @error('todo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-1/6 h-12 text-center py-3 bg-purple-400 hover:bg-purple-500 text-gray-100 hover:text-grey-200 my-4">Add</button>
                </div>
            </form>
        @else
            <form wire:submit.prevent="handleEditTodo" class="w-4/12 pb-4">
                <div class="flex">
                    <div class="block w-5/6 mr-5">
                        <input type="text" wire:model="todo" class="block border border-grey-light w-full p-3 mt-4 h-12" placeholder="Edit todo here...">
                        @error('todo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-1/6 h-12 text-center py-3 bg-purple-400 hover:bg-purple-500 text-gray-100 hover:text-grey-200 my-4">Edit</button>
                </div>
            </form>
        @endif


@if (count($todos->get()) == 0)
    <h1 class="text-7xl my-7">No Task Available</h1>
@else
@foreach ($todos->get() as $key => $todo)

    <div class="border-b-2 border-purple-400 w-4/12 p-2">
        <div class="flex justify-between">
            <div class="flex">
                <div class="flex items-center mx-1">
                    <input type="checkbox" wire:change="toggleTodo({{$todo->id}})" {{ $todo->completed ? 'checked' : '' }} />
                </div>
                <div class="block items-center ml-1">
                    <div class="font-semibold {{ $todo->completed ? 'line-through' : '' }}">{{$todo->content}}</div>
                    <div class="text-sm text-gray-400">Updated on {{date_format($todo->created_at, 'm/d/Y')}}</div>
                </div>
            </div>
            <div class="flex items-center">
                <div class="mx-1"><button class="text-yellow-600" wire:click="editButton({{intval($todo->id)}})"><i class="fas fa-edit"></i></button></div>
                <div class="mx-1"><button class="text-red-600" wire:click="deleteTodo({{intval($todo->id)}})"><i class="fas fa-trash"></i></button></div>
            </div>
        </div>
    </div>
@endforeach
@endif
    </div>
</div>

    
