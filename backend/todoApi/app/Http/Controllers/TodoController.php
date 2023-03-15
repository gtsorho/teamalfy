<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function create(request $request){

        $fields = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'completed'=>'required|boolean'
        ]);

        $todo = Auth::user()->todos()->create([
            'title' => $fields['title'],
            'user_id' => Auth::id(),
            'description' => $fields['description'],
            'completed' => $fields['completed']
        ]);

        return response()->json($todo , 200);
    }

    public function index(request $request){
        $todos = Auth::user()->todos()->get();
        return response()->json($todos, 200);
    }

    public function show($id){
        $stock = Auth::user()->todos()->where('id', $id)->first();
        return response()->json($stock, 200);
    }


    public function update(Request $request, $id)
    {        
        $fields = $request->validate([
            'title'=>'string',
            'description'=>'string',
            'completed'=>'boolean'
        ]);

        $updated = Auth::user()->todos()->where('id', $id)->update($fields);  

        return response()->json($updated, 200);
    }

    public function delete($id)
    {
        Auth::user()->todos()->where('id', $id)->delete();
        return response()->json('deleted', 200);
    }
}
