@extends('layouts.index')
@section('content')
    <div class="add-todo">
        <form action="/add" method="POST" class="form-inline">
            @csrf
            <label for="text"></label>
            <input type="text" name="text" class="form-control text-input" autocomplete="off" required placeholder="Type here...">
            <button class="btn btn-md btn-primary btn-add-todo text-uppercase ml-2" type="submit"><i class="fas fa-pencil-alt"></i> Add</button>
        </form>
    </div>
    <div class="todo-list">
        <div class="header"><h4 class="text-center dark-text text-uppercase">Todo list</h4></div>
        <div class="body">
            @if(!!count($todo_list))
                <div class="todo-items">
                    @foreach($todo_list as $todo)
                        <div class="todo-item" data-content="{{ $todo->id }}">
                            <span class="todo-done"></span>
                            <span class="todo-text">{{ $todo->text }}</span>
                            <div class="todo-action">
                                @switch($todo->is_active)
                                    @case(true)
                                        <span class="badge badge-sm badge-success todo-status">New</span>
                                        @break
                                    @default
                                        <span class="badge badge-sm badge-secondary todo-status">Completed</span>
                                @endswitch
                                <i class="far fa-edit todo-edit mar-left-10"></i>
                                <i class="far fa-trash-alt todo-delete mar-left-10"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <span>Nothing to show</span>
            @endif
        </div>
    </div>
@endsection
