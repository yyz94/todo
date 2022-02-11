<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoAllController extends Controller
{
    public function index(Request $request)
    {
        $todo_list = Todo::all();
        return view('welcome', compact('todo_list'));
    }
}
