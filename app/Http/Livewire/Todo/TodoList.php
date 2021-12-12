<?php

namespace App\Http\Livewire\Todo;

use App\Http\Resources\Todo\TodoListResource;
use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public mixed $todos;

    public Todo $model;

    protected $listeners = ['refreshTodos' => 'refreshTodos'];

    public function boot(Todo $model) {
        $this->model = $model;

        $this->todos = TodoListResource::collection($model->getAll())->toArray(request());
    }

    public function render()
    {
        return view('livewire.todo.todo-list', ['todos' => $this->todos]);
    }

    public function refreshTodos()
    {
        $this->todos = TodoListResource::collection($this->model->getAll())->toArray(request());
    }
}
