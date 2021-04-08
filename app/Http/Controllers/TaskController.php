<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Employer;


use Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;
        if(Auth::user()->role->role === "ROLE_EMPLOYER"){
            $tasks = Task::where("employerEmail",$email)->get();
            return view("tasks.index", ["tasks" => $tasks]);
        }elseif (Auth::user()->role->role === "ROLE_STUDENT") {
            $tasks = Task::where("studentEmail")->get();
            return view("tasks.index", ["tasks" => $tasks]);
        }else {
            $tasks = Task::all();
            return view("tasks.index", ["tasks" => $tasks]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role->role != "ROLE_EMPLOYER") {
            return back()->with("error", "Access denied");
        }

        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->back()->with("error", "Access denied");
        }
        $email = Auth::user()->email;
        if(Auth::user()->role->role === "ROLE_EMPLOYER"){
            $task = new Task;
            $task->taskName = $request->taskName;
            $task->description = $request->description;
            $task->employerEmail = $email;
            $task->status = "Not proposed";
            $task->agreement = 0;
            $task->price = $request->price;
            
            $task->save();

            return redirect()->back()->with("success", "Task proposed success");
        }else {
            return back()->with("error", "Access denied");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where("id", $id)->first();
        return view("tasks.show", ["task"=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()) {
            return redirect()->back()->with("error", "Access denied");
        }

        if (!Task::where("id", $id)->first()) {
            return redirect()->back()->with("error", "Task not found");
        }

        $email = Auth::user()->email;
        $task = Task::where("id", $id)->first();

        return view("tasks.edit");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Task::where("id", $id)->first()) {
           return redirect()->back()->with("error", "Task not found"); 
        }

        $email = Auth::user()->email;
        $task = Task::where("id", $id)->first();

        if ($email === $task->employerEmail || Auth::user()->role->role ==="ROLE_ADMIN" ) {
            $task->delete();
            return redirect()->back()->with("success","Task deleted successfully");
        }else{
            return redirect()->back()->with("error", "Access denied");
        }
    }
}
