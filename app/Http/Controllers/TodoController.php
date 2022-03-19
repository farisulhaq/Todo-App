<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = Todo::where('user_id', Auth::user()->id)->get();
        return view('todos.index')->with('todos', $data);
    }

    public function show(Todo $id)
    {
        return view('todos.show')->with('todo', $id);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        Todo::create([
            'user_id' => Auth::user()->id,
            'name' => $request['name'],
            'description' => $request['description']

        ]);
        session()->flash('success', 'Todo Create Successfully');
        return redirect()->route('index');
    }

    public function edit(Todo $id)
    {
        return view('todos.edit')->with('todo', $id);
    }

    public function update(Request $request, Todo $id)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $id->update($validasi);
        session()->flash('success', 'Todo Update Successfully');
        return redirect()->route('index');
    }

    public function destroy(Todo $id)
    {
        $id->delete();
        session()->flash('success', 'Todo Delete Successfully');
        return redirect()->route('index');
    }

    public function complete(Todo $id)
    {
        $id->complete = true;
        $id->save();
        session()->flash('success', 'Todo Complete Successfully');
        return redirect()->route('index');
    }
}
