@extends('layout')
@section('title', 'Edit Task > TODO ')

@section('content')
    <h1>Edit Task</h1>
    <form method="post" action="{{route('tasks.update', $task->id)}}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        Task: <input type="text" name="task" value="{{$task->task}}"/>
        Due: <input type="date" name="due" value="{{$task->due}}"/>
        Time: <input type="time" name="time" value="{{$task->time}}" />
        <input type="submit" value="Save" />
    </form>
@endsection