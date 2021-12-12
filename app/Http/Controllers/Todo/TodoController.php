<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\AddTodoRequest;
use App\Http\Resources\Todo\TodoListResource;
use App\Models\Todo;
use App\Services\Todo\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected TodoService $service;

    protected Todo $model;

    protected mixed $listResource;

    public function __construct(Todo        $model,
                                TodoService $service,
                                            $listResource = TodoListResource::class)
    {
        $this->model = $model;
        $this->service = $service;
        $this->listResource = $listResource;
    }

    public function list(): mixed
    {
        return view('todos.index', ['todos' => TodoListResource::collection($this->model->getAll())->toArray(request())]);
    }

    public function add(AddTodoRequest $request)
    {
        $params = $request->only(['content']);

        $this->service->add($params);
    }
}
