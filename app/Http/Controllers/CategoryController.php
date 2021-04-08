<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Task;
use App\Student;
use App\Employer;
use Auth;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        if (Auth::check()) {
            if (!Auth::user()->role->role == "ROLE_ADMIN") {
                return redirect()->back()->with("error","Access denied");
            }
        }
    }

    public function dashboard()
    {
        $categories = Category::all();
        $employees = Employer::all();
        $tasks = Task::all();
        $students = Student::all();

        return view("categories.dashboard", 
        [
            "categories"=>$categories,
            "employees"=>$employees, 
            "tasks" => $tasks, 
            "students"=>$students
            ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view("categories.index", ["categories" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with("success","Category created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Category::where("id", $id)->first()) {
            return redirect()->back()->with("error","Category not found");
        }

        $category = Category::where("id", $id)->first();

        return view("categories.show", ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Category::where("id", $id)->first()) {
            return redirect()->back()->with("error","Category not found");
        }

        $category = Category::where("id", $id)->first();

        return view("categories.edit", ['category' => $category]);
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
        if (!Category::where("id", $id)->first()) {
            return redirect()->back()->with("error","Category not found");
        }

        $category = Category::where("id", $id)->first();

        $category->category = $request->category; 
        $category->update();

        return redirect()->back()->with("success","Category updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Category::where("id", $id)->first()) {
            return redirect()->back()->with("error","Category not found");
        }

        $category = Category::where("id", $id)->first();
        $category->delete();

        return redirect()->route("categories")->with("success","Category deleted successfully!");
    }
}
