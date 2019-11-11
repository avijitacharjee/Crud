<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    //
    public function index()
    {
        return View('Welcome');
    }
    public function create ()
    {
        return View('create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
            ]
        );
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password; 
        $user->save();
        return redirect('/')->with('successMessage','Registered Successfully');
    }
    public function getEmails(Request $request)
    {
        $emails=array();
        $users=User::all();
        foreach ($users as $u) {
            array_push($emails,$u->email);
        }
        return response()->json($emails);
    }
   
}
