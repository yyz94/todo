<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo_list = Todo::where('user_id', auth()->user()->id)->get();
        return view('todo.index', compact('todo_list'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
            'deadline' => 'required'
        ]);
        $data['deadline'] = date('Y-m-d H:i:s', strtotime($data['deadline']));
        $data['user_id'] = auth()->user()->id;

        Todo::create($data);
        
        return back()->with('Successfully created !');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }

    public function getAllTodo()
    {
        $todo_list = Todo::all();
        return view('welcome', compact('todo_list'));
    }
}
