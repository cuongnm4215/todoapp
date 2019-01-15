<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo_list = Todo::all();

        return view('todo.list', compact('todo_list'));
    }

    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->text = $request->input('text');
        $todo->is_active = true;
        $todo->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $todo_id = $request->input('id');
        if ($todo_id) {
            $todo = Todo::where('id', $todo_id)->first();
            $todo->is_active = !$todo->is_active;
            $todo->save();
            return json_encode(['status' => 'true', 'message' => 'Success', 'data' => $todo]);
        }
        return json_encode(['status' => 'false', 'message' => 'Not found', 'data' => null]);
    }

    public function delete(Request $request)
    {
        $todo_id = $request->input('id');
        if ($todo_id) {
            $todo = Todo::where('id', $todo_id)->delete();
            return json_encode(['status' => 'true', 'message' => 'Success', 'data' => $todo]);
        }
        return json_encode(['status' => 'false', 'message' => 'Not found', 'data' => null]);
    }
}
