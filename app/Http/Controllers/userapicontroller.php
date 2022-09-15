<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class userapicontroller extends Controller
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
}
