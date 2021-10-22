<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Home extends Component
{

    public $todo = ''; //for add todo
    public $selectedTodo;
    public $isEdit = false; //flag for edit 



    public function render()
    {
        $todosList = Todo::where('user_id', auth()->user()->user_id)
                         ->where('is_deleted', '=', 0)
                         ->orderBy('completed', 'asc');
        return view('livewire.home', [
            'todos' =>  $todosList
        ]);
    }

    public function handleAddTodo()
    {
        $this->validate(['todo'=> 'required']);
        Todo::create([ 'user_id' => auth()->user()->user_id ,'content'=> $this->todo]);

    }

    //soft delete todo
    public function deleteTodo($id)
    {
        $this->selectedTodo = Todo::find($id);
        $this->selectedTodo->update(['is_deleted' => 1]);
    }

    //mount todo content to textbox
    public function editButton($id)
    {
        $this->isEdit = true;
        $this->selectedTodo = Todo::find($id);
        $this->todo = $this->selectedTodo->content;
    }

    public function handleEditTodo()
    {
        $this->validate(['todo'=> 'required']);
        $this->selectedTodo->update(['content'=> $this->todo]);
        $this->isEdit = false;
        $this->todo = '';
    }

    public function toggleTodo($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

}
