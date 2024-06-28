@extends('layouts.app')


@section('styles')
<style>
.task{
    justify-content: space-between;
    display:flex;
    width:100%;
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
    position: relative;
    text-decoration-line: line-through;
    width:300px;
    
}
.at-work {
    color:red;
    font-size:12px;
    width:300px;
}
.task-list {
    width:80%;
    display:flex;
    flex-wrap: wrap;
    margin-left:10%;
    position: relative;
    padding-bottom: 50px;

}
.title {
    text-align: center;
    margin-top:5%;
}

.create-btn {
    width:150px;
    border:1px solid black;
    text-align: center;
    padding: 5px;
    border-radius: 2%;
    position: absolute;
    margin-top:-70px;
    margin-left:80%;
    background-color: rgb(20,255,80, 0.8);
    color:rosybrown;
}
.link{
    width:70%;
    justify-content: space-between;
    position: absolute;
    margin-left:15%;
}
.task-info
{
    display:flex;
    justify-content: space-between;
    width:1100px;

    margin-left:5%;
    height:40px;
    margin-top:-10px
}
.desc {
    width:20%;
    margin-left:100px;
    height:30px;
    white-space:nowrap;
    overflow:hidden;
}
</style>
@endsection

@section('title')

<p class="title">Task List</p>

@endsection

@section('content')
<div class="create-btn">
<a href="{{ route('tasks.create') }}" class="btn btn-success">Create Task</a>
</div>
<div class="task-list">
@forelse($tasks as $task)
<div class="task">
<a href="{{route('tasks.show', ['id' => $task->id])}}">
    @if( $task->completed == '1')
    <div class="task-info">
    <p class="completed">{{$task->title}}</p>
    <p class="desc">{{$task->description}}</p>
    <p class="desc">{{$task->updated_at}}</p>
    </div>
    @elseif($task->completed == '0') 
    <div class="task-info">
    <p class="at-work">{{$task->title}}</p>
    <p class="desc">{{$task->description}}</p>
    <p class="desc">{{$task->updated_at}}</p>
    </div>
    @endif
</a>
<br>
</div>
@empty
NO TASKS
@endforelse
</div>
<div class="link">
@if($task->count())
   {{ $tasks->links() }}
@endif
</div>
@endsection


