<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Auth;
use Validator;
use Session;
use Redirect;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showuser(){
        $data['users']=Register::get();
        return view("showusers",$data);

    }

    public function register_user(Request $request){
      

        $validatedData=Validator::make($request->all(),[
            "name"=>"required",
            "mobile"=>"required|unique:register,phone|max:10|min:10",
            "email"=>"email|required|unique:register",
            "password"=>"required",
            "confirm_password"=>"required",
            "address"=>"required",
            "dob"=>"required",
            "profession"=>"required",
            "qualification"=>"required",
        ]);

        if($validatedData->fails())
        {
           
            return Redirect::back()->withErrors($validatedData);
        }
        else{
            
            $password=$request->password;
            $confirm_pass=$request->confirm_password;
            if($password==$confirm_pass)
            {
                $register=new Register;
                $register->username=$request->name;
                $register->phone=$request->mobile;
                $register->password=base64_encode($request->password);
                $register->confirm_password=base64_encode($request->confirm_password);
                $register->address=$request->address;
                $register->dob=$request->dob;
                $register->profession=$request->profession;
                $register->graduation=$request->qualification;
                $register->email=$request->email;
                $register->save();
                return Redirect::back()->with("success","Registration done");


            }
            else{
                return Redirect::back()->with("message","Both Password does not match");
            }


        }
        
    }


    public function edit_user(Request $request){
      
      

        $validatedData=Validator::make($request->all(),[
            "name"=>"required",
            "address"=>"required",
            "dob"=>"required",
            "profession"=>"required",
            "qualification"=>"required",
        ]);

        if($validatedData->fails())
        {
           
            return Redirect::back()->withErrors($validatedData);
        }
        else{
            
           
                $id=$request->id;
                $register=Register::find($id);
                $register->username=$request->name;
                $register->address=$request->address;
                $register->dob=$request->dob;
                $register->profession=$request->profession;
                $register->graduation=$request->qualification;  
                $register->save();
                return Redirect::back()->with("success","Data Update");

        }
        
    }

    public function delete_user($id){
        $register=Register::find($id);
        $register->delete();
        return Redirect::back()->with("success","User Deleted");
    }

    public function basicplan(Request $request){
        return view('basicplan');

    }

    public function loaplanner(){
        return view('loaplanner');
    }


}
