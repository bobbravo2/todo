@extends('layout')
@section('title', 'Index > TODO ')

@section('content')
    <h1>Hello Tasks <a href="{{route('tasks.create')}}"><span class="glyphicon glyphicon-plus-sign"></span> Add New</a></h1>

    @foreach($tasks as $task)
        @if($task->completed == 1)
            <span class="glyphicon glyphicon-check"></span>
        @else
            <span class="glyphicon glyphicon-warning-sign"></span>
        @endif
        <a href="{{route('tasks.show', $task->id)}}">{{substr($task->task, 0, 45)}}</a><br/>
        <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-alert"></span> Delete</button>
        </form>
    @endforeach
@endsection