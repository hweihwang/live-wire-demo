<div>
    @foreach ($todos as $todo)
        <livewire:todo.todo-item :todo="$todo" :key="$todo['id']"/>
    @endforeach
</div>
