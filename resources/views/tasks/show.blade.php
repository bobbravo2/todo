@extends('layout')

@section('title', 'View '.$task->task.' task > TODO ')

@section('content')
    <h1>View Task {{$task->task}}, due {{$task->due}}</h1>
    <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-alert"></span> Delete</button>
    </form>
@endsection