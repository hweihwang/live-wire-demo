<?php

namespace App\Http\Livewire\Todo;

use App\Services\Todo\TodoService;
use Livewire\Component;

class TodoAdd extends Component
{
    public mixed $content = '';

    protected TodoService $service;

    public function boot(TodoService $service)
    {
        $this->service = $service;
    }

    public function add()
    {
        $this->validate([
            'content' => 'required|min:3',
        ]);

        $this->service->add(['content' => $this->content]);

        $this->content = '';

        $this->emit('refreshTodos');
    }

    public function render()
    {
        return view('livewire.todo.todo-add', ['content' => $this->content]);
    }
}
