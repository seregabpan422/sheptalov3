@extends('layouts.app')

@section('styles')

<style>



</style>

@endsection

@section('title', $tasks->title ?? 'Задача не знайдена')

@section('content')
@if ($tasks)

    <p>{{$tasks->description}}</p>
    @if($tasks->completed == '1')
        <p>Зроблена</p>
    @elseif($tasks->completed == '0')
        <p>Не зроблена</p>
    @endif
    <p>{{$tasks->created_at}}</p>
    <p>{{$tasks->updated_at}}</p>
    <a href="{{ route('tasks.edit', ['id' => $tasks->id])}}" class="btn btn-success">Edit Task</a>
    <a href="{{ route('tasks.index') }}" class="btn btn-success">Back to Tasks</a>
   

@else
    <p>Задача не знайдена</p>
@endif
@endsection
