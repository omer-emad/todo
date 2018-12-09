<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
       // $todos    = Todo::find($user_id);
        $todos = Todo::where('user_id','=',$user_id)->get();
        return view('dashboard')->with('todos',$todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'due'   => 'required',
            'status' => 'required'
        ]);

        $todo = new Todo;
        $todo->title        = $request->input('title');
        $todo->body         = $request->input('descripation');
        $todo->due          = $request->input('due');
        $todo->status       = $request->input('status');
        $todo->user_id      = auth()->user()->id;
        $todo->save();
       
        return  redirect('/todo')->with('success', 'New task has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = todo::find($id);
        return view('todos.edit')->with('todo',$todo);
    }

    public function change($id)
    {
        $todo = todo::find($id);
        $todo->status       = 1;
        $todo->user_id      = auth()->user()->id;
        $todo->save();
        return redirect('/todo')->with('success', 'Status has been upated');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'title' => 'required'
        ]);
        //create todo
        $todo = todo::find($id);
        $todo->title        = $request->input('title');
        $todo->body         = $request->input('descripation');
        $todo->due          = $request->input('due');
        $todo->status       = $request->input('status');
        $todo->user_id      = auth()->user()->id;
        $todo->save();
        return redirect('/todo')->with('success', 'Todo has been upated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = todo::find($id);
        $todo->delete();
        return redirect('/todo')->with('success', 'Todo has been Removed');
    }
}
