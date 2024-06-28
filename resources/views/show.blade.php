@extends('layouts.app')

@section('styles')

<style>


.buttons {
    width:50%;
    display:flex;
    justify-content: space-between;
    margin-top:50px;
}
.btn-success {
    width:150px;
    padding:5px;
    background-color: orange;
    text-align: center;
}

.task-info {
    width:80%;
    margin-left:10%;
    text-align: left;
}
</style>

@endsection

@section('title', $tasks->title ?? 'Задача не знайдена')

@section('content')
<div class="task-info">
@if ($tasks)

    <p class="desk">{{$tasks->description}}</p>
    @if($tasks->completed == '1')
        <p class="status">Зроблена</p>
    @elseif($tasks->completed == '0')
        <p class="status">Не зроблена</p>
    @endif
    <p class="time-at">{{$tasks->created_at}}</p>
    <p class="time-at">{{$tasks->updated_at}}</p>
   <div class="buttons">
    <a href="{{ route('tasks.edit', ['id' => $tasks->id])}}" class="btn btn-success"><p class="btn-text">Edit Task</p></a>
    <a href="{{ route('tasks.index') }}" class="btn btn-success">Back to Tasks</a>
   
    <form action="{{route('tasks.destroy', ['id' => $tasks->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-success">Delete</button>

    </form>
    </div>
    </div>
@else
    <p>Задача не знайдена</p>
@endif


@endsection
