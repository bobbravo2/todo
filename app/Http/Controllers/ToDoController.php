<?php

namespace App\Http\Controllers;

use App\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'tasks.index', ['tasks' => ToDo::all()] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('tasks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$task = new ToDo();
		$task->task = $request->task;
		$task->due = trim($request->due) . ' ' . trim($request->time);
		$task->completed = 0;
		$task->save();
		return response()->redirectTo( route( 'tasks.show', $task->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		return view('tasks.show', ['task' => ToDo::find($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$task = ToDo::find($id);
		$due_parts = explode( ' ', $task->due);
		//Here, we over-write the due with the same value from our create form
		$task->due = $due_parts[0];
		//And use the other part so we have 2 inputs in the FORM
		$task->time = $due_parts[1];
		return view('tasks.edit', ['task' => $task ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//TODO finish update route
		$task = new ToDo($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		ToDo::destroy( $id );

		return response()->redirectTo( route( 'tasks.index') );
	}
}
