<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(request $request){ 

        $fields = $request->validate([          
            'username'=>'required|string|unique:users,username',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'username' => $fields['username'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('appToken')->plainTextToken;
        return response()->json([$user ,$token], 200);
    }

    public function login(request $request){
        $fields = $request->validate([
            'username'=> 'required|string',
            'password'=> 'required|string',
        ]);

        $user = User::where('username', $fields['username'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
                return response()->json(['message'=>'invalid Credintials'], 401);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        return response()->json($token, 200);
    }
}
