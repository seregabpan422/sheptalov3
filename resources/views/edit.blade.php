@extends('layouts.app')

@section('title', 'Edit Task') 

@section('styles')

<style>

    .error-message{
        color:red;
        font-size:20px;

    }
    .button-task {
        width:150px;
        height:30px;
        border-radius: 5%;
        background-color: inherit;
        transform: scale(1);
        border:1px solid black;
        margin-left:20px;
    }
    .button-task:hover{
        transform: scale(1.04);
    }
</style>

@endsection

@section('content')

<form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" name="title" id="title" value=" {{ $task->title }}">
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" rows="5"> {{ $task->description }}</textarea>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit" class="button-task"> Edit task</button>
        @if($task->completed == '0')
        <button value="1" name="completed" id="completed" class="button-task"> End task</button>
        @elseif ($task->completed == '1')
        <button value="0" name="completed" id="completed" class="button-task"> Refresh task</button>
        @endif
    </div>
</form>

@endsection