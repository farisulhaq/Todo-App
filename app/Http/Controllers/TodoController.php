<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {       
        $data = Todo::all();
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
        $validasi = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        Todo::create($validasi);
        session()->flash('success', 'Todo Create Successfully');
        return redirect()->route('home');
    }

    public function edit(Todo $id)
    {
        return view('todos.edit')->with('todo', $id);
    }

    public function update(Request $request,Todo $id)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $id->update($validasi);
        session()->flash('success', 'Todo Update Successfully');
        return redirect()->route('home');
    }

    public function destroy(Todo $id)
    {
        $id->delete();
        session()->flash('success', 'Todo Delete Successfully');
        return redirect()->route('home');
    }

    public function complete(Todo $id)
    {
        $id->complete = true;
        $id->save();
        session()->flash('success', 'Todo Complete Successfully');
        return redirect()->route('home');
    }
}
