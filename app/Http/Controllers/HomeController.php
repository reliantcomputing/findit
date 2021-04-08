<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\Employer;
use App\User;
use App\Role;
use App\Category;
use Illuminate\Support\Facades\Hash;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $userInstance    = new User;
        $roleInstance    = new Role;

        $email = "admin@findit.com";
        $password = "password";
        $role = "ROLE_ADMIN";

        if (!User::where("email", $email)->first()) {
            $roleInstance->role = $role;
            $roleInstance->save();

            $userInstance->role_id = $roleInstance->id;
            $userInstance->email    = $email;
            $userInstance->active    = 0;
            $userInstance->token = Hash::make($password);
            $userInstance->password = Hash::make($password);

            $userInstance->save();
            if (Auth::check()) {
                Auth::logout();
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function students()
    {
        $students = Student::all();
        $categories = Category::all();
        $category = null;
        return view("students.students", ["students" => $students, "categories" => $categories, "category" => $category]);
    }
    

    public function notImplimented(){
        return "Not implimented";
    }

    public function studentsSorting(Request $request)
    {
        return redirect()->route("notImplimented");
    }
    public function index()
    {
        $users = User::all();
        return view('welcome', ['users' => $users]);
    }

    public function studentRegistration()
    {
        $categories = Category::all();
        return view("students.registration", ["categories" => $categories]);
    }

    public function saveStudent(Request $request){

        $student = new Student;
        $userInstance    = new User;
        
        if (!Role::where('role', 'ROLE_STUDENT')->first()) {
            $roleInstance = new Role;
            $roleInstance->role = "ROLE_STUDENT";
            $roleInstance->save();
            $userInstance->role_id = $roleInstance->id;
        }else {
            $role = Role::where('role','ROLE_STUDENT')->first();
            $userInstance->role_id = $role->id;
        }

        $this->validate($request, [
                "firstName" => "required",
                "lastName" => "required",
                "description" => "required",
                "studentNumber" => "required",
                "email" => "required|email",
                "password" => "required|confirmed|min:6"
        ]);

        $student->firstName     = $request->firstName;
        $student->lastName      = $request->firstName;
        $student->description   = $request->description;
        $student->studentNumber = $request->studentNumber;
        $student->category_id   = $request->category;
        $student->email         = $request->email;
        $student->verified      = 0;
        //save student
        $student->save();

        $userInstance->email    = $request->email;
        $userInstance->password = Hash::make($request->password);
        $userInstance->token    = Hash::make($request->password);
        $userInstance->active   = 0;

        $userInstance->save();

        $roleInstance = new Role;

        if (Auth::check()) {
            Auth::logout();
        }
        

        return redirect()->route("login")->with("login", "Registered successfully, you can now login.");
    }

    public function employerRegistration()
    {
        return view("employers.registration");
    }

    public function saveEmployer(Request $request)
    {
        $employer = new Employer;
        $userInstance    = new User;
        
        if (!Role::where('role', 'ROLE_EMPLOYER')->first()) {
            $roleInstance = new Role;
            $roleInstance->role = "ROLE_EMPLOYER";
            $roleInstance->save();
            $userInstance->role_id = $roleInstance->id;
        }else {
            $role = Role::where('role','ROLE_EMPLOYER')->first();
            $userInstance->role_id = $role->id;
        }

        $this->validate($request, [
            "firstName" => "required",
            "lastName" => "required",
            "country" => "required",
            "region" => "required",
            "street" => "required",
            "postalCode" => "required",
            "email" => "required|email",
            "password" => "required|confirmed|min:6"
        ]);

        $employer->firstName     = $request->firstName;
        $employer->lastName      = $request->lastName;
        $employer->country       = $request->country;
        $employer->region        = $request->region;
        $employer->street        = $request->street;
        $employer->postalCode    = $request->postalCode;
        $employer->email         = $request->email;
        $employer->verified      = 0;
        //save student
        $employer->save();

        $userInstance->email    = $request->email;
        $userInstance->password = Hash::make($request->password);
        $userInstance->token    = Hash::make($request->password);
        $userInstance->active   = 0;

        $userInstance->save();

        if (Auth::check()) {
            Auth::logout();
        }
        

        return redirect()->route("login")->with("success", "Registered successfully, you can now login.");
    }
}
