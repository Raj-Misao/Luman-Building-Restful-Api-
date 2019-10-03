<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'username'=>'required|min:3|max:12',
            'email'=>'required|email|unique:users',
            'role'=>'required'
        ]);
        return User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'api_token' => app('hash')->make('sdfsfjsfwjjiioewnmnvvx99383kjkf')
        ]);
    }
    public function login()
    {
        return response()->json(['status'=>'loged In !....','statusCode'=>200]);
       // return "loged in successfully";
    }

    public function edit($id)
    {
        $user = User::find($id);
        $allows = false;
        if($user && Gate::allows('update-user',$user))
        {
            $allows = true;
        }
        else{
            $user = [];
        }
        return response()->json(['message'=>$user,'allows'=>$allows,'status'=>200]);
    }

    //
}
