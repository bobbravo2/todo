@extends('layout')
@section('title', 'Create new Task> TODO ')

@section('content')
    <h1>Create new Task</h1>
    <form method="post" action="{{route('tasks.store')}}">
        {{csrf_field()}}
        Task: <input type="text" name="task"/>
        Due: <input type="date" name="due" />
        Time: <input type="time" name="time" value="00:00:00" />
        <input type="submit" value="Save" />
    </form>
@endsection