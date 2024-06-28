@extends('layouts.app')


@section('styles')
<style>
.task{
    width:30%;
    height:40px;
    border:1px solid black;
    font-size:12px;
    margin-top:5px;
    background-color: inherit;
    transition: background-color 0.3s ease;
    margin-left:5px;
    padding-top:10px;
    padding-bottom: 10px;

}
.task:hover{
    background-color: rgb(100,200,100, 0.2);
    transition: background-color 0.3s ease;
}
a {
    text-decoration: none;
    color:none;
}
.completed {

    text-decoration-line: line-through;
}
.at-work {
    color:red;
    font-size:12px;
}
.task-list {
    width:80%;
    display:flex;
    flex-wrap: wrap;
    margin-left:15%;
}
.title {
    text-align: center;
}
</style>
@endsection

@section('title')

<p class="title">Task List</p>

@endsection

@section('content')
<a href="{{ route('tasks.create') }}" class="btn btn-success">Create Task</a>
<div class="task-list">
@forelse($tasks as $task)
<div class="task">
<a href="{{route('tasks.show', ['id' => $task->id])}}">
    @if( $task->completed == '1')
    <p class="completed">{{$task->title}}</p>
    @elseif($task->completed == '0') 
    <p class="at-work">{{$task->title}}</p>
    @endif
</a>
<br>
</div>
@empty
NO TASKS
@endforelse
</div>
@if($tasks->count())
   {{ $tasks->links() }}
@endif
@endsection


