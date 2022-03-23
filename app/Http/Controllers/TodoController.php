<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Front interface
        return view('todo.index', [
            'todos' => Todo::paginate(10),
            'name' => 'Fateeh',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create', [
            'name' => 'Fateeh',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $todo = new Todo();
        $validated = $request->validate(['name' => 'required|string|min:2']);
        $todo->name = $validated =['name'];
        $todo->save();

        return redirect('/todos')->with('status', 'New Task! ' . $validated =['name'] . ' has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo\edit', [
            'todo' => $todo,
            'name' => 'Fateeh',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // dd($request->all(), $todo);
        $validated = $request->validate(['name' => 'required|string|min:2']);
        $todo->name = $validated =['name'];
        $todo->save();
        return redirect('/todos')->with('status', '' . $validated =['name']   . ' has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo -> delete();

        return redirect('/todos')->with('status', 'Task  ' . $todo->name . ' has successfully deleted.');
    }
}
