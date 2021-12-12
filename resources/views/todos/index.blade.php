<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        @livewire('todo.todo-list')
        @livewire('todo.todo-add')
    </x-slot>
</x-app-layout>
