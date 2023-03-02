<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function index()
    {
        // $todos = Todo::where('user_id','=',Auth::user()->id)->get();
        // return view("dashboard",[
        //     'tasks' => Todo::where('user_id','=',Auth::user()->id)->get()
        // ]);
        // dd($request);
        return view("dashboard");
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        // $input["user_id"] = Auth::user()->id;
        // $validator = Validator::make($input, [
        //     'task' => 'required|max:255',

        // ]);

        // if($validator->fails()){
        //     // return view("dashboard");
        // }
    //     $request->validate([
    //         'task' => 'required|max:255'
    //     ]);
    //     Todo::create($input);
    //     return redirect('dashboard')->with('success', "TODO created successfully!");
    }


    public function show(Todo $todo)
    {

        // $todo = Todo::find($todo->id);
        // if ($todo->completed){
        //     $todo->update(['completed' => false]);
        //     return redirect()->back()->with('success', "TODO marked as incomplete!");
        // }else {
        //     $todo->update(['completed' => true]);
        //     return redirect()->back()->with('success', "TODO marked as complete!");
        // }

    }


    public function edit($id)
    {
        $todo = Todo::find($id);
        $todo = Todo::where('id',$id)->where('user_id',auth()->user()->id)->get();
        // ddd($todo);
        if (isset($todo[0])) {
            // maybe a condition to check if completed
            return view('edit')->with(['id' => $id, 'task' => $todo[0]]);
        }
        else {
            abort(403);
        }

        if( $todo->where('user_id',auth()->user()->id)

        )
        dd($id);
        return view("edit");

    }


    public function update(Request $request, Todo $todo)
    {
        // $request->validate([
        //     'task' => 'required|max:255'
        // ]);
        // $updateTodo = Todo::find($request->id);
        // $updateTodo->update(['task' => $request->task]);
        // return redirect('dashboard')->with('success', "TODO updated successfully!");
    }


    public function destroy($id){
        // Todo::destroy($id);
        // // $todo->delete();
        // return redirect()->back()->with('success', "TODO deleted successfully!");
    }
}
