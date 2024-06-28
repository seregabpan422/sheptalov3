@extends('layouts.app')

@section('title', 'Edit Task') 

@section('styles')

<style>

    .error-message{
        color:red;
        font-size:20px;

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
        <button type="submit"> Edit task</button>
        @if($task->completed == '0')
        <button value="1" name="completed" id="completed"> End task</button>
        @elseif ($task->completed == '1')
        <button value="0" name="completed" id="completed"> Refresh task</button>
        @endif
    </div>
</form>

@endsection