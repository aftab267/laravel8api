<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Validator;

class UserApiController extends Controller
{
    public function showuser($id=null){
        if($id==''){
            $users=User::get();
            return response()->json(['users'=>$users],200);
        }else{
            $users=User::find($id);
            return response()->json(['users'=>$users],200);

        }
    }
    public function adduser(Request $request){
        if($request->ismethod('post')){
            $data=$request->all();
            //return $data;
            $rules=[
                'name'=> 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required',
            ];
            $custommessage=[
                'name.required'=>'name is Required',
                'email.required'=>'email is Required',
                'email.email'=>'email must be a valid',
                'password.required'=>'password is Required',
            ];

            $validator=Validator::make($data,$rules,$custommessage);
            if ($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $user= new User();
            $user->name=$data['name'];
            $user->email=$data['email'];
            $user->password=$data['password'];
            $user->save();
            $message='user successfully Added';
            return response()->json(['message'=>$message],201);
        }

    }

    // Post api for multiple user
    public function addmultipleuser(Request $request){
        if($request->ismethod('post')){
            $data=$request->all();
            //return $data;
            $rules=[
                'users.*.name'=> 'required',
                'users.*.email'=> 'required|email|unique:users',
                'users.*.password'=> 'required',
            ];
            $custommessage=[
                'users.*.name.required'=>'name is Required',
                'users.*.email.required'=>'email is Required',
                'users.*.email.email'=>'email must be a valid',
                'users.*.password.required'=>'password is Required',
            ];

            $validator=Validator::make($data,$rules,$custommessage);
            if ($validator->fails()){
                return response()->json($validator->errors(),422);
            }

           foreach($data['users'] as $adduser){
            $user= new User();
            $user->name=$adduser['name'];
            $user->email=$adduser['email'];
            $user->password=$adduser['password'];
            $user->save();
            $message='user successfully Added';
            }
            return response()->json(['message'=>$message],201);

        }

    }

}
