<?php

namespace App\Http\Livewire\Todo;

use App\Services\Todo\TodoService;
use Livewire\Component;

class TodoItem extends Component
{
    public mixed $todo;

    protected TodoService $service;

    public function boot(TodoService $service)
    {
        $this->service = $service;
    }

    public function mount($todo)
    {
        $this->todo = $todo;
    }

    public function updated($name, $value)
    {
        $this->service->edit(['id' => $this->todo['id'], 'is_done' => $value]);
    }

    public function render()
    {
        return view('livewire.todo.todo-item', ['todo' => $this->todo]);
    }
}
