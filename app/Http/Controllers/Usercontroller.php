<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function login(Request $req){
        $user=User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "uername or password does not match";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');   
        }
    }
    public function register(Request $req){
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();
        $req->session()->put('user',$user);
        return redirect('/');
    }

}
