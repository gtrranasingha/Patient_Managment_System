<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request){
        // dd($resquest->all());
        $this->validate($request,[
            'email'=>'required|max:100|min:5|email',
            'password'=>'required|max:191|min:2'
           
            ]
        );
         $email=$request->email;
         $password=$request->password;

        $data= DB::select('select id from users where email=? and password=?',[$email, $password]);
        
        // print_r($data);
        if(count($data)){
            $id=DB::table('users')->where('email',$email)->value('id');
            $user=User::find($id);
            $request->session()->put('user_name',$user['name']);
            $request->session()->put('user_email',$user['email']);
            $request->session()->put('userId',$id);
        
            
         return redirect('/welcome');
        }
        else{
            return redirect()->back()->with('error_message', 'Account is Incorrect!');
        }
    }
}
